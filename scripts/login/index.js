/**
 * @param {string} username
 * @param {string} password
 * @returns {void}
 */
function Login(username, password) {
	$.post("/api/login.php", {
		"username": username,
		"password": password,
	}, function (data, textStatus, jqXHR) {
		if (data["message"] != undefined) {
			alert(data["message"]);
		};
	}, "json");
};

/**
 * @param {string} username
 * @param {string} email
 * @param {string} password
 * @param {string} captcha
 * @returns {void}
 */
function Register(username, email, password, captcha) {
	$.post("/api/login.php", {
		"username": username,
		"email": email,
		"password": password,
		"captcha": captcha,
		"is_registration": 1,
	}, function (data, textStatus, jqXHR) {
		console.log(data)
		if (data["message"] != undefined) {
			alert(data["message"]);
		};
	}, "json");
};