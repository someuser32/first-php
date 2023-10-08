<?php
	require_once(dirname(dirname(__DIR__)) . "/vendor/autoload.php");
	require("enums.php");

	use Dotenv\Dotenv;

	$dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
	$dotenv->safeLoad();

	define("MONGODB_CONNECTION", $_ENV["MONGODB_CONNECTION"]);
?>