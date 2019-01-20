<?php
set_error_handler(function ($code, $message, $file, $line)		{ new \DeathManOne\Flash($message, $code, $file, $line); });
set_exception_handler(function ($code, $message, $file, $line)	{ new \DeathManOne\Flash($message, $code, $file, $line); });

if ( \DeathManOne\Flash::$flash !== NULL )
{
    foreach ( \DeathManOne\Flash::$flash as $error ):
	    $code = $error->getCode():
	    $line = $error->getLine();
	    $file = $error->getFile();
	    $mess = $error->getMessage();
	    $colo = $error->getBgColor();
    endforeach;
}