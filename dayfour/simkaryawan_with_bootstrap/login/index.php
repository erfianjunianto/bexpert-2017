<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="style.css" media="screen" type="text/css">
</head>
<body>
	<?php 
	if(isset($_POST['submit'])){
		$username = $_POST['user'];
		$password = $_POST['pass'];
		if(empty($username) || empty($password)){
			echo "<center>Username dan password tidak boleh kosong</center>";
		}else{
			include '../konfigurasi/config.php';
			include '../konfigurasi/function.php';
			$con = connect_db();
			$query = "SELECT * FROM users WHERE username='$username' and password=md5('$password')";
			$result = execute_query($con, $query);
			$data = mysqli_fetch_array($result);
			if(mysqli_num_rows($result) !=0 ){
				$query_karyawan = "SELECT nama FROM karyawan WHERE karyawanid='$data[karyawanid]'";
				$result_karyawan = execute_query($con, $query_karyawan);
				$data_karyawan = mysqli_fetch_array($result_karyawan);
				session_start();
				$_SESSION['islogin'] = true;
				$_SESSION['role'] = $data['role'];
				$_SESSION['username'] = $username;
				$_SESSION['userid'] = $data['userid'];
				$_SESSION['karyawanid'] = $data['karyawanid'];
				$_SESSION['namanya'] = $data_karyawan['nama'];
				header("location:../index.php");
			}else{
				echo "<center>Username dan password salah</center>";
			}
		}
	}
	?>
	<div class="login-card">
		<h1><b>Log-in</b></h1><br>
		<form method="post" name="formlogin" id="formlogin" action="">
			<input type="text" name="user" value="" placeholder="Username">
			<input type="password" name="pass" value="" placeholder="Password">
			<input type="submit" name="submit" class="login login-submit" value="Login">
		</form>
		<div class="login-help">
			<a href="#">Register</a> &#124; <a href="#">Forgot Password</a>
		</div>
	</div>
</body>
</html>