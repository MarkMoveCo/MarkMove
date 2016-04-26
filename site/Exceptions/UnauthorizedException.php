<?php
namespace site\Exceptions;
use \Exception;

class UnauthorizedException extends \Exception
{
	const DEFAULT_MESSAGE = "User has not rights to access the content";

	public function __contrsuct($message = DEFAULT_MESSAGE, $code = 0, Exception $previousException = null)
	{
		parent::__contrsuct($message,$code,$previousException);
	}


}
?>