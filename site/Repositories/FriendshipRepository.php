<?php
namespace site\Repositories;

use site\Repositories\Repository;
use site\Db;

class FriendshipRepository extends Repository
{
	
	const PENDING = 0;
	const ACCEPTED = 1;
	const DECLINED = 2;
	const BLOCKED = 3;

	private static $inst = null;
	private $user_one_id;
	private $user_two_id;

	public static function create()
	{
		if (self::$inst == null) {
			self::$inst = new self(Db::getInstance());
		}

		return self::$inst;
	}

	private function setUsers($user1, $user2)
	{
		if ($user1 > $user2) 
		{
			$this->user_one_id = $user2;
			$this->user_two_id = $user1;
		}
		else
		{
			$this->user_one_id = $user1;
			$this->user_two_id = $user2;
		}
	}

	public function sendRequest($requesterId, $accepterId)
	{
		$this->setUsers($requesterId,$accepterId);
		$query = "INSERT INTO friendships(user_one_id,user_two_id,status,action_user_id) VALUES(?,?,?,?)";
		$params = [$this->user_one_id,$this->user_two_id,self::PENDING,$requesterId];
		$this->db->query($query,$params);
		return $this->db->rows() > 0;

	}

	public function cancelRequest($requesterId, $accepterId)
	{
		$this->setUsers($requesterId, $accepterId);
		$query = "DELETE FROM friendships WHERE user_one_id = ? AND user_two_id = ?";
		$params = [$this->user_one_id,$this->user_two_id];
		$this->db->query($query, $params);
		return $this->db->rows() > 0;
	}

	public function acceptRequest($accepterUserId, $otherUserId)
	{
		$this->takeActionOnRequest($accepterUserId, $otherUserId, self::ACCEPTED);
	}

	public function declineRequest($declinerUserId, $otherUserId)
	{
		$this->takeActionOnRequest($declinerUserId, $otherUserId, self::DECLINED);
	}

	public function blockRequest($blockingUserId, $otherUserId)
	{
		$this->takeActionOnRequest($blockingUserId, $otherUserId, self::BLOCKED);
	}

	public function blockFriendship($blockingUserId, $otherUserId)
	{
		$this->takeActionOnRequest($blockingUserId, $otherUserId, self::BLOCKED);
	}

	public function getFriends($userId)
	{
		$friendships = $this->getFriendshipsOfUserWithStatus($userId,self::ACCEPTED);
		$friendsCollection = [];
		foreach($friendships as $friendship)
		{
			if ($friendship['user_one_id'] != $userId) 
			{
				$friendsCollection [] = UserRepository::create()->getOneById($friendship['user_one_id']);
			}
			else
			{
				$friendsCollection [] = UserRepository::create()->getOneById($friendship['user_two_id']);
			}
		}

		return $friendsCollection;
	}

	private function getFriendshipsOfUserWithStatus($userId, $status = null)
	{
		$query = "SELECT * FROM friendships WHERE(user_one_id = ? OR user_two_id = ?)";
		$params = [$userId, $userId];
		if ($status != null) 
		{
			$query.=" AND status = ?";
			$params[] = $status;
		}
		
		$this->db->query($query, $params);
		return $this->db->fetchAll();
	}

	private function takeActionOnRequest($actingUserId,$otherUserId,$status)
	{
		$this->setUsers($actingUserId,$otherUserId);
		$query = "UPDATE friendships SET status = ?, action_user_id = ? WHERE user_one_id = ? AND user_two_id = ?";
		$params = [$status, $actingUserId, $this->user_one_id,$this->user_two_id];
		$this->db->query($query, $params);
		return $this->db->rows() > 0;
	}
}
?>