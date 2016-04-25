<?php
namespace site\Repositories;
use site\Repositories\Repository;
use site\Models\Photo;
use site\Db;

class PhotoRepository extends Repository
{
	private static  $inst = null;
	public static $nextPhotoId = null;

	public static function create()
	{
		if (self::$inst == null) {
			self::$inst = new self(Db::getInstance());
			self::$nextPhotoId = 1;
		}

		return self::$inst;
	}

	public function save(Photo $photo)
	{
		$query = "INSERT INTO photos(user_id, photo_path) VALUES(?,?)";
		$params = [$photo->getUserId(),$photo->getPath()];
		$this->db->query($query,$params);
		if ($this->db->rows() > 0)
		{
			$photo->setId(self::$nextPhotoId);
			self::$nextPhotoId++;
			return true;
		}
		else
		{
			return false;
		}

	}
} 
?>