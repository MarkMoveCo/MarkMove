<?php 
namespace site\Models;

use site\Repositories\PostRepository;
use site\Models\User;

class Post
{
	private $userNickname;

	private $postContent;

	private $postDateTime;

	public function __construct($userNickname, $postContent, $postDateTime)
	{
		$this->setUserNickname($userNickname);
		$this->setPostContent($postContent);
		$this->setPostDateTime($postDateTime);
	}

	public function save()
	{
		return PostRepository::create()->save($this);
	}

	public function setUserNickname($userNickname)
	{
		$this->userNickname = $userNickname;
	}

	public function getUser()
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