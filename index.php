<?php
	require_once 'define.php';
	error_reporting (E_ALL ^ E_NOTICE);
	
	spl_autoload_register(function ($className) {
		require_once LIBRARY_PATH . "{$className}.php";
	});

	Session::init();
	
	$bootstrap = new Bootstrap();
	$bootstrap->init();
?>