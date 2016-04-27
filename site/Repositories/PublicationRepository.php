<?php
namespace site\Repositories;
use site\Models\Publication;
use site\Repositories\Repository;
use site\Db;

class PublicationRepository extends Repository
{
	private static  $inst = null;

	public static function create()
	{
		if (self::$inst == null) {
			self::$inst = new self(Db::getInstance());
		}

		return self::$inst;
	}

	public function save(Publication $publication)
	{
		$query="INSERT INTO publications(title,body) VALUES(?,?)";
		$params = [$publication->getTitle(),$publication->getBody()];
		$this->db->query($query, $params);
		$result = $this->db->rows() > 0;
		return $result;
	}

	public function getAll()
	{
		$query="SELECT * FROM publications";
		$params = [];
		$this->db->query($query, $params);
		$result = $this->db->fetchAll();
		$publicationsCollection = [];
		foreach($result as $resultPublicaiton)
		{
			$publication = new Publication($resultPublicaiton['title'],$resultPublicaiton['body']);
			$publication->setId($resultPublicaiton['id']);
			$publicationsCollection[] = $publication;
		}

		return $publicationsCollection;
	}

	public function getByTitle($title)
	{
		$query="SELECT id, body FROM publications WHERE title=?";
		$params = [$title];
		$this->db->query($query, $params);
		$result = $this->db->fetch();
		$publication = new Publication($title, $result['body']);
		$publication->setId($result['id']);
		return $publication;
	}

	public function getById($id)
	{
		$query="SELECT title, body FROM publications WHERE id=?";
		$params = [$id];
		$this->db->query($query, $params);
		$result = $this->db->fetch();
		$publication = new Publication($result['title'], $result['body']);
		$publication->setId($id);
		return $publication;
	}
}
?>