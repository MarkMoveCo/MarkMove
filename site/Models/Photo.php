<?php
namespace site\Models;
use site\Repositories\PhotoRepository;

class Photo
{

	private $id;
	private $userId;
	private $path;

	public function __construct($userId, $path)
	{
		$this->setUserId($userId);
		$this->setPath($path);
	}

	public function save()
	{
		return PhotoRepository::create()->save($this);
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function setPath($path)
	{
		$this->path = $path;
	}
}
?>