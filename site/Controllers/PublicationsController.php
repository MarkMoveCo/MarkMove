<?php
namespace site\Controllers;
use site\Controllers\Controller;
use site\Repositories\RoleRepository;
use site\Repositories\UserRepository;
use site\Models\Role;
use site\Exceptions\UnauthorizedException;
use site\Exceptions\UserNotFoundException;
use site\Models\Publication;
use site\Repositories\PublicationRepository;

class PublicationsController extends Controller
{

	public function create($publication = "article")
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
				$this->redirect(null,'logout');
			}

			if ($this->view->user->getRole()->getRole() == "Publisher") 
			{
				$this->redirect();
			}

			if (isset($_POST['create'])) 
			{
				$this->createContent();
			}
		}
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
			else
			{
				$publicationsCollection = PublicationRepository::create()->getAll();
				if (!$publicationsCollection) 
				{
					echo "Error<br><br><br><br>";
					die;
				}
				else
				{
					$this->view->publicationsCollection = $publicationsCollection;
				}
			}

		}
		else
		{
			//throw new UnauthorizedException();
			$this->redirect(); //ERROR
		}
	}

	public function publication($params)
	{
		if (count($params) == 2) 
		{	
			$type = $params[0];
			$identifier = $params[1];
			if ($type == "id") 
			{
				$publication = PublicationRepository::create()->getById($identifier);
				if (!$publication) 
				{
					echo "Error<br><br><br><br>";
					die;
				}
				else
				{
					$this->view->publication = $publication;
				}
			}
			
		}
		else
		{
			echo"ERROR <br><br><br><br>";
			die;
		}

	}

	private function createContent()
	{
		$publicationToCreate = new Publication($_POST['title'],$_POST['raw-HTML']);
		$result = $publicationToCreate->save();
		if (!$result) 
		{
			echo"ERROR";
			die;
		}
	}
}
?>