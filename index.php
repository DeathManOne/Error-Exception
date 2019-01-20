<?php
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