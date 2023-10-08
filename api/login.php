<?php
	require("config.php");

	function login($username, $password) {
		$client = new MongoDB\Client(MONGODB_CONNECTION);
		$users = $client->firstphp->users;

		$user = $users->findOne(["username" => $username]);

		if (is_null($user)) {
			return null;
		};

		$password = hash("sha256", $password."+".$user["password_salt"]);

		if ($password != $user["password"]) {
			return false;
		};

		return $user;
	};

	function do_login($params) {
		$default_params = array("username", "password");

		if (count(array_intersect_key(array_flip($default_params), $_POST)) != count($default_params)) {
			echo "bad request!";
			return null;
		};

		$user = login($_POST["username"], $_POST["password"]);

		if (is_null($user)) {
			echo "username does not exists";
			return false;
		} else if (is_bool($user) && $user == false) {
			echo "incorrect password!";
			return false;
		};

		echo "logged in!";
		return true;
	};


	if (array_key_exists("is_registration", $_POST) && $_POST["is_registration"] == 1) {
		echo "not implemented yet!";
		return;
	};

	do_login($_POST);
?>