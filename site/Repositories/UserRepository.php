<?php
namespace site\Repositories;
use site\Db;
use site\Models\User;
use site\Repositories\Repository;

class UserRepository extends Repository
{

		protected static $inst = null;

		public static function create(){
		if (self::$inst == null) {
			self::$inst = new self(Db::getInstance());
		}
		return self::$inst;
	}

	public function getOneByDetails($nick, $pass){
		$query ="SELECT id FROM users WHERE nickname=? AND password=?";
		$this->db->query($query, [$nick, md5($pass)]);
		$result = $this->db->fetch();
		if (empty($result)) {
			return false;
		}
		return $this->getOneById($result['id']);
	}

	public function save(User $user){
		$query = "INSERT INTO users(nickname, password, email, age, gender) VALUES(?,?,?,?,?)";
		$params =
		[
		$user->getNickname(),
		$user->getPassword(),
		$user->getEmail(),
		$user->getAge(),
		$user->getGender(),
		];
		$this->db->query($query,$params);
		$this->db->fetch();
		if ($this->db->rows() > 0) {
		$query = "SELECT LAST_INSERT_ID()";
		$params = [];
		$this->db->query($query, $params);
		$result =  $this->db->fetch()[0];
		return $result;
		}
		
	}

	public function getOneById($id){
		$query ="SELECT id, nickname, password, email, age, gender, points FROM users WHERE id=?";
		$this->db->query($query, [$id]);
		$usersResult = $this->db->fetch();
		if (empty($usersResult)) {
			return false;
		}
		$role = RoleRepository::create()->getOneByUserId($id);
		$notifications = [];
		$userToReturn = User::fullInitialise(
			$usersResult['id'],
			$usersResult['nickname'],
			$usersResult['password'],
			$usersResult['email'],
			$usersResult['age'],
			$usersResult['gender'],
			$role,
			$notifications,
			$usersResult['points']
		);
		return $userToReturn;
	}

}
?>