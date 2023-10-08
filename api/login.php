<?php
	require("internal/config.php");

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

		if (count(array_intersect_key(array_flip($default_params), $params)) != count($default_params)) {
			echo json_encode(array(
				"result" => LoginResults::BadRequest,
				"message" => "Invalid arguments! Expected: ".join(", ", $default_params),
			));
			return null;
		};

		$user = login($params["username"], $params["password"]);

		if (is_null($user)) {
			echo json_encode(array(
				"result" => LoginResults::NotExists,
				"message" => "User ".$params["username"]." does not exists!",
			));
			return false;
		} else if (is_bool($user) && $user == false) {
			echo json_encode(array(
				"result" => LoginResults::IncorrectPassword,
				"message" => "Incorrect password!",
			));
			return false;
		};

		echo json_encode(array(
			"result" => LoginResults::Success,
			"message" => "Logged in!",
		));
		return true;
	};

	function do_registration($params) {
		$default_params = array("username", "email", "password", "captcha");

		if (count(array_intersect_key(array_flip($default_params), $params)) != count($default_params)) {
			echo json_encode(array(
				"result" => RegistrationResults::BadRequest,
				"message" => "Invalid arguments! Expected: ".join(", ", $default_params),
			));
			return null;
		};

		if (strtolower($_SESSION["captcha_registration_answer"]) != strtolower($params["captcha"])) {
			echo json_encode(array(
				"result" => RegistrationResults::IncorrectCaptcha,
				"message" => "Incorrect captcha!".$_SESSION["captcha_registration_answer"],
			));
			return null;
		};
	};

	session_start();

	if (array_key_exists("is_registration", $_POST) && $_POST["is_registration"] == 1) {
		do_registration($_POST);
	} else {
		do_login($_POST);
	};
?>