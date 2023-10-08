<?php
	enum BaseResults: int {
		case Success = 0;
		case BadRequest = 1;
		case NotImplemented = 2;
	};

	enum LoginResults: int {
		case Success = 0;
		case BadRequest = 1;
		case NotExists = 2;
		case IncorrectPassword = 3;
	};

	enum RegistrationResults: int {
		case Success = 0;
		case BadRequest = 1;
		case UsernameExists = 2;
		case IncorrectUsername = 3;
		case IncorrectCaptcha = 4;
	};
?>