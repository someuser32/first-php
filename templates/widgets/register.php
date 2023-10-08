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
					<td>
						<a>Captcha:</a>
						<img src="<?php
							require("internal/config.php");

							use Gregwar\Captcha\CaptchaBuilder;
							$builder = new CaptchaBuilder;
							$builder->build(100, 25);

							session_start();
							$_SESSION["captcha_registration_answer"] = $builder->getPhrase();

							echo $builder->inline();
						?>" alt="captcha">
					</td>
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