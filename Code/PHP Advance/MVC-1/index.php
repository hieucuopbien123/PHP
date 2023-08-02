<?php 
	// # MVC
	include_once("controller/Controller.php");

	// Gọi invoke của controller
	$controller = new Controller();
	$controller->invoke();
?>