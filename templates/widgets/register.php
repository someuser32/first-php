<!DOCTYPE html>
<html>
	<body>
		<table class="RegisterContainer">
			<tbody>
				<tr class="Username">
					<td>Username:</td>
					<td><input name="username" type="text"></td>
				</tr>
				<tr class="Email">
					<td>Email:</td>
					<td><input name="email" type="email"></td>
				</tr>
				<tr class="Password">
					<td>Password:</td>
					<td><input name="password" type="password"></td>
				</tr>
				<tr class="Captcha">
					<td>Captcha:</td>
					<td><input name="captcha" type="text"></td>
				</tr>
				<tr class="Submit">
					<td></td>
					<td><button class="center" onclick="Register(document.getElementsByName('username')[0].value, document.getElementsByName('email')[0].value, document.getElementsByName('password')[0].value, document.getElementsByName('captcha')[0].value)">Register</button></td>
				</tr>
			</tbody>
		</table>
	</body>
</html>