<?php 

if(isset($_POST['login'])){
	if(empty($_POST['user']) or empty($_POST['pass'])){
		echo "Username dan password harus diisi <br>";
		echo "<a href='login_2.html>back</a>";
	}else{
		echo "Username ".$_POST['user'] ."<br>";
		echo "Password ".$_POST['pass'] ."<br>";
	}
}else{
	echo "<h1>Access not allowed</h1>";
}