<?php
	if (array_key_exists("is_registration", $_POST) && $_POST["is_registration"] == 1) {
		echo "not implemented yet!";
		return;
	};

	$login_params = array("username", "password");

	if (count(array_intersect_key(array_flip($login_params), $_POST)) != count($login_params)) {
		echo "bad request!";
		return;
	};

	require("config.php");

	$client = new MongoDB\Client(MONGODB_CONNECTION);

	$users = $client->firstphp->users;

	$user = $users->findOne(["username" => $_POST["username"]]);

	if (is_null($user)) {
		echo "username not exists";
		return;
	};

	$password = hash("sha256", $_POST["password"]."+".$user["password_salt"]);

	if ($password != $user["password"]) {
		echo "password is incorrect!";
		return;
	};

	echo "logged in!";
?>