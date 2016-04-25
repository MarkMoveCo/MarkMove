<?php
namespace site\Controllers;

use site\Controllers\Controller;
use site\Db;
use site\Models\User;
use site\Models\Role;
use site\Repositories\UserRepository;
use site\Repositories\RoleRepository;
use site\Models\Notification;
use site\Repositories\NotificationRepository;
use site\Models\Photo;

class UsersController extends Controller{
	
	private function uploadPicture($photoName,$path = null)
	{
			$target_dir = $path;
			
			$extension  = explode(".", basename($_FILES["fileToUpload"]["name"]))[1];
			$target_file = $target_dir . $photoName.".".$extension;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		       // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }

			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
			    {
			        return $target_file; //echo "The file ". $target_file . " has been uploaded.";
			    } 
			    else 
			    {
			         return false;//echo "Sorry, there was an error uploading your file.";
			    }
			}
	}

	public function article()
	{

	}

	public function profile(){
		if (!isset($_SESSION['userid'])) {
			$this->redirect('users','login');
			exit;
		}

		$user = UserRepository::create()->getOneById($_SESSION['userid']);
		if (!$user && $_SESSION['userid'] == "-1") {
			$user = User::partialInitialise("Todor","1234","todor@email.bg","20","Male");
			$user->setRole(new Role("Admin",$user->getId()));
			$this->view->user = $user;
		}
		else
		{
			$user->setNotifications(NotificationRepository::create()->getAllWithUserId($user->getId()));	
			$this->view->user = $user;
		}

		if (isset($_POST['upload_profile_picture'])) 
		{
			$path = $this->uploadPicture($user->getNickname(),"images/profile/");
			if (!$path)
			{
				echo "File not uploaded" ;
			}
			else
			{
				$profilePhoto = new Photo($user->getId(), $path);
				$result = $profilePhoto->save();
				if (!$result) 
				{
					echo "Couldn\'t create photo in the database";
				}
			}

		}

		if (isset($_POST['upload_picture'])) {
			$this->uploadPicture();
		}

	}

	private function changeRoles()
	{
		$rolesToUpdate = $_POST['rolesToUpdate'];
		foreach($rolesToUpdate as $roleToUpdate)
		{
			$userId = $roleToUpdate['userId'];
			$userRole = $roleToUpdate['role'];
			$role = new Role($userRole,$userId);
			$result = RoleRepository::create()->updateRole($role);
			return $result;
		}
	}

	public function permissions()
	{
		if (isset($_SESSION['userid'])) {
			$userRole = RoleRepository::create()->getOneByUserId($_SESSION['userid']);
			if (!$userRole && $_SESSION['userid'] == -1) 
			{
				$userRole = new Role("Admin",-1);
			}

			$rolesCollection = ['Admin','Moderator','Publisher'];
			$this->view->rolesCollection = $rolesCollection;
			$usersCollection = [];
			if ($userRole->getRole() == "Admin") 
			{
				foreach($rolesCollection as $role)
				{
					$users = RoleRepository::create()->getAllWithRole($role);
					$usersCollection [] = $users;
				}

				$this->view->usersCollection = $usersCollection;
				$user = UserRepository::create()->getOneById($_SESSION['userid']);
				if ($user) 
				{
					$user->setNotifications(NotificationRepository::create()->getAllWithUserId($user->getId()));
				}
				else
				{
					$user = $user = User::partialInitialise("Todor","1234","todor@email.bg","20","Male");
					$user->setRole(new Role("Admin",$user->getId()));
				}
				
				$this->view->user = $user;
				if (isset($_POST['rolesToUpdate'])) 
				{
					$this->changeRoles();
				}
			}
			else
			{
				$this->redirect(); //NOT FOUND SHOULD BE;
			}
		}
		else
		{
			$this->redirect(); //NOT FOUND SHOULD BE;
		}
	}

	public function home()
	{
		if (isset($_SESSION['userid'])) {	
			$user = UserRepository::create()->getOneById($_SESSION['userid']);
			if ($user) {
			$user->setNotifications(NotificationRepository::create()->getAllWithUserId($user->getId()));
			$this->view->user = $user;
			}
			else if($_SESSION['userid'] == "-1"){
				$user = User::partialInitialise("Todor","1234","todor@email.bg","20","Male");
				$user->setRole(new Role("Admin",$user->getId()));
				$this->view->user = $user;
			}
		}
		else
		{
			$this->redirect();
		}


	}
}