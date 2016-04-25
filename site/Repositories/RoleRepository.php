<?php
namespace site\Repositories;
use site\Models\Role;
use site\Db;
use site\Repositories\Repository;
class RoleRepository extends Repository{

	protected static $inst = null;

	public static function create(){
		if (self::$inst == null) {
			self::$inst = new self(Db::getInstance());
		}

		return self::$inst;
	}

	public function save(Role $role){
		$query = "INSERT INTO roles(id, role, role_userId) VALUES (?, ?, ?)";
		$params = [$role->getId(),$role->getRole(), $role->getUserId()];
		$this->db->query($query, $params);
		if ($this->db->rows() > 0) {
			$query = "SELECT LAST_INSERT_ID()";
			$params = [];
			$this->db->query($query, $params);
			$result = $this->db->fetch();
			return $result;
		}
		else
		{
			return false;
		}
	}

	public function updateRole(Role $role)
	{
		$query="UPDATE roles SET role=? WHERE role_userId=?";
		$params = [$role->getRole(),$role->getUserId()];
		$this->db->query($query,$params);
		if ($this->db->rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getOneById($id){
		$query = "SELECT id, role, role_userId FROM roles WHERE id=?";
		$params= [$id];
		$this->db->query($query, $params);
		$result = $this->db->fetch();
		if (!$result) {
			return false;
		}

		$role = new Role
		(
			$result['role'],
			$result['role_userId'],
			$result['id']
		);

		return $role;
	}

	public function getOneByUserId($userId){
		$query = "SELECT id, role, role_userId FROM roles WHERE role_userId=?";
		$params = [$userId];
		$this->db->query($query, $params);
		$result = $this->db->fetch();
		if (!$result) {
			return false;
		}

		$role = new Role
		(
			$result['role'],
			$result['role_userId'],
			$result['id']
		);

		return $role;
	}

	public function getAllWithRole($role)
	{
		$query = "SELECT id, role, role_userId FROM roles WHERE role=?";
		$params = [$role];
		$this->db->query($query, $params);
		$result = $this->db->fetchAll();
		if (!$result) {
			return false;
		}
		$rolesCollection = [];
		foreach ($result as $roleResult) 
		{
			$query = "SELECT nickname FROM users WHERE id=?";
			$params = [$roleResult['role_userId']];
			$this->db->query($query,$params);
			$nickname = $this->db->fetch();
			if (!$nickname) 
			{
				return false;
			}

			$role = new Role
		(
			$roleResult['role'],
			$roleResult['role_userId'],
			$roleResult['id']
		);

		$role->setUserNickname($nickname['nickname']);

		$rolesCollection[] = $role;
		}

		return $rolesCollection;
	}
} 
?>