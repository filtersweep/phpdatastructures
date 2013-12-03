<?php

spl_autoload_register(function ($classname) {
	$path = str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.class.php';
	require_once($path);
});

?>