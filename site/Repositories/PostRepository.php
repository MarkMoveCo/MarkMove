<?php
namespace site\Repositories;
use site\Repositories\Repository;
use site\Db;
use site\Models\Post;
use site\Repositories\FrendshipRepository;

class PostRepository extends Repository
{
		private static $inst = null;

	public static function create()
	{
		if (self::$inst == null) 
		{
			self::$inst = new self(Db::getInstance());
		}

		return self::$inst;
	}

	public function save(Post $post)
	{
		$query = "INSERT INTO posts(post_user_id,post_content, post_date) VALUES(?,?,?)";
		$params = [$post->getUserId(), $post->getPostContent(),$post->getPostDateTime()];
		$this->db->query($query, $params);
		return $this->db->rows() > 0;
	}

	public function getLatestPostsForUser($userId)
	{
		$query = "SELECT users.nickname, posts.post_content, posts.post_date
		FROM friendships
		JOIN users
		ON users.id = friendships.user_one_id OR users.id = friendships.user_two_id
		JOIN posts
		ON users.id = posts.post_user_id
		WHERE(user_one_id = ? OR user_two_id = ?)
		ORDER BY posts.post_date DESC";
		$params = [$userId, $userId];
		$this->db->query($query, $params);
		$result = $this->db->fetchAll();
		$latestPostsCollection = [];
		foreach($result as $resultPost)
		{
			$post = new Post($resultPost['nickname'], $resultPost['post_content'], $resultPost['post_date']);
			$latestPostsCollection [] = $post;
		}

		return $latestPostsCollection;
	}
}
?>