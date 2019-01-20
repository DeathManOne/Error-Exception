<?php
namespace DeathManOne;

class Flash extends \Exception
{
	const P_SUCCESS	=	5;
	const P_WARNING	=	6;
	const P_ERROR	=	7;
	
	static private $_flash;
	
	public static function getFlash() { return self::$_flash; }
	public function __construct($message, $code = NULL, $file = NULL, $line = NULL) { $this->_setFlash($message, $code, $file, $line); }
	private function _setFlash($message, $code, $file, $line)
	{
		if ( empty($message) ) { return; }
		$class			=	__CLASS__ . '\Message';
		$exception		=	[
								'FILE'		=>	( empty($file) ) ? $this->getFile() : $file,
								'LINE'		=>	( empty($line) ) ? $this->getLine() : $line,
								'MESSAGE'	=>	$message,
								'CODE'		=>	$code,
							];
		self::$_flash[]	=	new $class($exception);
	}
}