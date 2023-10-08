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