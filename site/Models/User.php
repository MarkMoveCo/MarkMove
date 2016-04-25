<?php
namespace site\Models;
use site\Db;
use site\Repositories\UserRepository;

class User
{

	private $id;

	private $nickname;

	private $password;

	private $email;

	private $age;

	private $gender;

	private $role;

	private $points;

	private $notifications;

	private function __construct()
	{

	}

	public static function partialInitialise($nickname, $password, $email, $age, $gender)
	{
		$user = new self();

		$user->setNickname($nickname);
		$user->setPassword($password);
		$user->setEmail($email);
		$user->setAge($age);
		$user->setGender($gender);

		return $user;
	}

	public static function fullInitialise($id, $nickname, $password, $email, $age, $gender, $role, $notifications= [], $points)
	{
		$user = User::partialInitialise($nickname, $password, $email, $age, $gender);
		$user->setId($id);
		$user->setRole($role);
		$user->setNotifications($notifications);
		$user->setPoints($points);
		return $user;
	}

	public function save()
	{
		return UserRepository::create()->save($this);
	}

	public function setNotifications($notifications){
		$this->notifications = $notifications;
	}

	public function getNotifications()
	{
		return $this->notifications;
	}

	public function setPoints($points)
	{
		$this->points = $points;
	}

	public function getPoints()
	{
		return $this->points;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNickname($nickname)
	{
		$this->nickname = $nickname;
	}

	public function getNickname()
	{
		return $this->nickname;
	}

	public function setPassword($password)
	{
		$this->password = md5($password);
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setAge($age)
	{
		$this->age = $age;
	}

	public function getAge()
	{
		return $this->age;
	}

	public function setGender($gender)
	{
		$this->gender = $gender;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}

	public function getRole()
	{
		return $this->role;
	}
}
?>