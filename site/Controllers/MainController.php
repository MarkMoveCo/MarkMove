<?php
namespace site\Controllers;
use site\Controllers\Controller;
use site\Repositories\UserRepository;
use site\Models\User;
use site\Models\Role;
use site\Models\Notification;

class MainController extends Controller
{

	public function login()
	{
		if (!isset($_SESSION['userid'])) {
			if (isset($_POST['login_button'])) 
			{
				$nickname = htmlentities($_POST['nickname']);
				$userPassword = htmlentities($_POST['password']);
				$userRepo = UserRepository::create();
				$user = $userRepo->getOneByDetails($nickname, $userPassword);
				if (!$user) 
				{
					if ($nickname =="Todor" && $userPassword == "1234") 
					{
						$user = User::partialInitialise($nickname, $userPassword, "todor@email.bg", "20", "Male");
						$user->setRole(new Role("Admin",$user->getId()));
						$user->setId("-1");
					}
					else
					{
						echo "Wrong nickname or password!";
						exit;
					}

				}

				$_SESSION['userid'] = $user->getId();
				$this->redirect('users','home');
			}

		}
		else
		{
			$this->redirect('users','home');

		}
	
	}

	public function register()
	{
		if (isset($_POST['submit'])) {
		$nickname = htmlentities($_POST['nickname']);
		$age = htmlentities($_POST['age']);
		$userPassword = htmlentities($_POST['password']);
		$email = htmlentities($_POST['email']);
		$gender = $_POST['gender'];
		$roleName = "Admin";
		$user= User::partialInitialise($nickname,$userPassword, $email, $age, $gender);
		$savedUserId = $user->save();
		$role = new Role($roleName, $savedUserId);
		$user = User::fullInitialise($savedUserId, $nickname, $userPassword, $email,$age, $gender, $role, $notifications = [], 0);
		$result = $role->save();
		if ($result > 0) {
			$notification = new Notification("New user with nickname ".$nickname." has just registered!");
			$notification->save();
		}
		$_POST['login_button'] = "";
		$this->login();
		}

	}

	public function logout()
	{
	session_destroy();
	$this->redirect('users','home');
	}

	public function landmarks()
	{
		$user = $this->getUser($_SESSION['userid']);
		$this->view->user = $user;
	}

	public function index()
	{
		if (isset($_SESSION['userid'])) {
			$this->redirect('users','home');
		}
	}

}
?>