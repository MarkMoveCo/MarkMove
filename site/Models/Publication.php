<?php
namespace site\Models;
use site\Repositories\PublicationRepository;

class Publication
{
	private $id;

	private $title;

	private $body;

	public function __construct($title, $body)
	{
		$this->setTitle($title);
		$this->setBody($body);
	}

	public function save()
	{
		return PublicationRepository::create()->save($this);
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setBody($body)
	{
		$this->body = $body;
	}

	public function getBody()
	{
		return $this->body;
	}
}
?>