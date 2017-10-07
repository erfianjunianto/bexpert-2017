<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="../../../dayone/css/style.css" media="screen" type="text/css">
</head>
<body>
	<div class="login-card">
		<h1><b>Log-in</b></h1><br>
		<form method="POST" >
			<input type="text" name="user" value="" placeholder="Username">
			<input type="password" name="pass" value="" placeholder="Password">
			<input type="submit" name="login" class="login login-submit" value="Login">
		</form>
		<div class="login-help">
			<a href="#">Register</a> &#124; <a href="#">Forgot Password</a>
		</div>
	</div>

	<?php 
	if(isset($_POST['login'])){
		echo "Username ".$_POST['user'] ."<br>";
		echo "Password ".$_POST['pass'] ."<br>";
	}
	?>
</body>
</html>