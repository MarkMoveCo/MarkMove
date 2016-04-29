<?php 
namespace site\Models;

use site\Repositories\PostRepository;
use site\Models\User;

class Post
{
	private $userNickname;

	private $userId;

	private $postContent;

	private $postDateTime;

	public function __construct($userId, $postContent, $postDateTime)
	{
		$this->setUserId($userId);
		$this->setPostContent($postContent);
		$this->setPostDateTime($postDateTime);
	}

	public function save()
	{
		return PostRepository::create()->save($this);
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function setUserNickname($userNickname)
	{
		$this->userNickname = $userNickname;
	}

	public function getUserNickname()
	{
		return $this->userNickname;
	}

	public function setPostContent($postContent)
	{
		$this->postContent = $postContent;
	}

	public function getPostContent()
	{
		return $this->postContent;
	}

	public function setPostDateTime($postDateTime)
	{
		$this->postDateTime = $postDateTime;
	}

	public function getPostDateTime()
	{
		return $this->postDateTime;
	}
}
?>