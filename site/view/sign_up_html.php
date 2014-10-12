<html>
<head>
	<title>Sign Up to Captain's Log</title>
</head>
<body>
	<h1>Sign up to Captain's Log</h1>

	<?php echo $extra_html; ?> <!-- displays appropriate error msg if error -->

	<form action="catch_sign_up.php" method="post">
		Name: <input type="text" name="name" value=""/><br>
		Email: <input type="text" name="email" value=""/><br>
		Password: <input type="password" name="password1" value=""/><br>
		Re-type password: <input type="password" name="password2" value=""/><br>
		<input type="submit" value="Sign up"/>
	</form>

</body>
</html>