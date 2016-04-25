<?php
namespace site\Repositories;
use site\Repositories\Repository;
use site\Db;
use site\Models\Notification;

class NotificationRepository extends Repository
{

	private static  $inst = null;

	public static function create()
	{
		if (self::$inst == null) {
			self::$inst = new self(Db::getInstance());
		}

		return self::$inst;
	}

	public function getAllWithUserId($id)
	{
		$query="SELECT notification_id FROM users_notifications WHERE user_id=?";
		$params = [$id];
		$this->db->query($query,$params);
		$notification_ids = $this->db->fetchAll();
		if (!$notification_ids) {
			echo "Error line 26 NR";
		}

		$notificationsCollection = [];
		foreach ($notification_ids as $key => $not_id) 
		{
			$query="SELECT notification FROM notifications WHERE id=?";
			$params = [$not_id['notification_id']];
			$this->db->query($query, $params);
			$result= $this->db->fetch();
			$notification = new Notification($result['notification'], $not_id['notification_id']);
			if (!$notification) {
				echo "Error line 35 NR";
			}

			$notificationsCollection[] = $notification;
		}
		return $notificationsCollection;
	}

	public function save(Notification $notification)
	{
		$query = "INSERT INTO notifications(notification) VALUES(?)";
		$params = [$notification->getNotification()];
		$this->db->query($query, $params);
		if ($this->db->rows() > 0) {
			$query = "SELECT LAST_INSERT_ID()";
			$params = [];
			$this->db->query($query, $params);
			$notificationId = $this->db->fetch();
			if (!$notificationId) {
				echo "Error line 53 NR";
				
			}

			$selectId = "SELECT id FROM users";
			$this->db->query($selectId, $params);
			$usersToNotifiy = $this->db->fetchAll();
			if (!$usersToNotifiy) {
				echo "Error line 62 NR";
			}
			foreach ($usersToNotifiy as $key => $userId) {
				$get="INSERT INTO users_notifications(notification_id, user_id) VALUES(?,?)";
				$params = [$notificationId[0], $userId['id']];
				$this->db->query($get, $params);
				if (!$this->db->rows()) {
					echo "Error line 71 NR";
					
				}
			}
		}
	}

} 
?>