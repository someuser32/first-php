<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/styles.css" type="text/css">
		<link rel="stylesheet" href="css/login/index.css" type="text/css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link rel="icon" type="image/x-icon" href="https://google.com/favicon.ico">
		<script src="scripts/lib/jquery.js"></script>
		<script src="scripts/login/index.js"></script>
		<title>Login - Not a Google</title>
	</head>
	<body>
		<?php
			include("templates/header.php");
		?>
		<div id="Body">
			<div class="Container">
				<div class="Row">
					<table class="LoginContainer">
						<tbody>
							<tr class="Username">
								<td>Username:</td>
								<td><input name="username" type="text"></td>
							</tr>
							<tr class="Password">
								<td>Password:</td>
								<td><input name="password" type="password"></td>
							</tr>
							<tr class="Submit">
								<td></td>
								<td>
									<label><input name="save" type="checkbox">Save password?</label>
									<button class="right" onclick="Login(document.getElementsByName('username')[0].value, document.getElementsByName('password')[0].value)">Login</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php
			include("templates/footer.php");
		?>
	</body>
</html>