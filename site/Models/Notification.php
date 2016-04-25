<?php
namespace site\Models;
use site\Repositories\NotificationRepository;

class Notification{

	private $id;

	private $notification;

	public function __construct($notification, $id = null){
		$this->setNotification($notification);
		$this->setId($id);
	}

	public function save(){
		NotificationRepository::create()->save($this);
	}

	public function setNotification($notification){
		$this->notification = $notification;
	}

	public function getNotification(){
		return $this->notification;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

}
?>