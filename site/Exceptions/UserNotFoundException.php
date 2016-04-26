<?php
namespace site\Exceptions;
use \Exception;
class UserNotFoundException extends \Exception
{
	const DEFAULT_MESSAGE = "User was not found in the database with the given values";
	public function __contstruct($message = DEFAULT_MESSAGE, $code = 0, \Exception $previousException = null)
	{
		parent::__contstruct($message, $code,$previousException);
	}
}
?>