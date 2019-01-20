<?php
namespace DeathManOne\Flash;

use \DeathManOne\Flash as Flash;

class Message
{
	private $_code, $_message, $_file, $_line, $_bgColor;
	
	public function __construct(array $exception)
	{
		foreach ( $exception as $key => $value )
			if ( method_exists(__CLASS__, ($method = '_set' . ucfirst(strtolower($key)))) )
				$this->$method($value);
	}
	
	public final function getLine() { return $this->_line; }
	public final function getFile() { return $this->_file; }
	public final function getCode() { return $this->_code; }
	public final function getBgColor() { return $this->_bgColor; }
	public final function getMessage() { return $this->_message; }
	
	private final function _setLine($line) { $this->_line = (int) $line; }
	private final function _setFile($file) { $this->_file = (string) strtolower($file); }
	private final function _setMessage($message) { $this->_message = (string) $message; }
	private final function _setBgColor($color)	{ $this->_bgColor = (string) strtolower($color); }
	private final function _setCode($code)
	{
		$code	=	strtolower($code);
		switch($code)
		{
			case Flash::P_SUCCESS:
				$bgColor	=	'.bgGreen';
				break;
			case Flash::P_WARNING:
				$bgColor	=	'.bgOrange';
				break;
			case Flash::P_ERROR:
				$bgColor	=	'.bgRed';
				break;
			case E_NOTICE :
			case E_WARNING :
			case E_USER_NOTICE :
			case E_USER_WARNING :
				$bgColor	=	'.bgOrange';
				$code		=	'warning';
				break;
			case E_USER_ERROR :
				$bgColor	=	'.bgRed';
				$code		=	'error';
				break;
			default :
				$bgColor	=	'.bgRed';
				$code		=	'unknow';
				break;
		}
		$this->_code = (string) strtolower($code);
		$this->_setBgColor($bgColor);
	}
}