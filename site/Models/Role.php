<?php
namespace site\Models;
use site\Repositories\RoleRepository;

class Role
{
	
	private $id;

	private $role;

	private $userId;

	private $userNickname;

	public function __construct($role, $userId, $id = null){
		$this->setId($id);
		$this->setRole($role);
		$this->setUserId($userId);
	}

	public function save(){
		return RoleRepository::create()->save($this);
	}

	public function setUserNickname($userNickname)
	{
		$this->userNickname = $userNickname;
	}

	public function getUserNickname()
	{
		return $this->userNickname;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setRole($role){
		$this->role = $role;
	}

	public function getRole(){
		return $this->role;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getuserId(){
		return $this->userId;
	}
}
?>