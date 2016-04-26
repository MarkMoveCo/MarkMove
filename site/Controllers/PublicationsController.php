<?php
namespace site\Controllers;
use site\Controllers\Controller;
use site\Repositories\RoleRepository;
use site\Repositories\UserRepository;
use site\Models\Role;
use site\Exceptions\UnauthorizedException;
use site\Exceptions\UserNotFoundException;

class PublicationsController extends Controller
{

	public function create($publication = "article")
	{
		if ($publication =="article")
		{
			
		}
	}

	public function manage()
	{
		if (isset($_SESSION['userid'])) 
		{
			try
			{
				$user = $this->getUser($_SESSION['userid']);
				$this->view->user = $user;
			}
			catch(UserNotFoundException $exception)
			{
				$this->redirect(null,"logout");
			}

			if ($this->view->user->getRole()->getRole() == "Publisher") 
			{
				//throw new UnauthorizedException();
				$this->redirect(); // ERROR
			}

		}
		else
		{
			//throw new UnauthorizedException();
			$this->redirect(); //ERROR
		}
	}

}
?>