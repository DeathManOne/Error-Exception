<?php
set_error_handler(function ($code, $message, $file, $line)		{ new \DeathManOne\Flash($message, $code, $file, $line); });
set_exception_handler(function ($code, $message, $file, $line)	{ new \DeathManOne\Flash($message, $code, $file, $line); });