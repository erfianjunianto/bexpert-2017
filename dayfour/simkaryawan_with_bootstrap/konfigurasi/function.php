<?php

function connect_db(){
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die (mysqli_connect_error());
	return $con;
}

function execute_query($con, $query){
	$result = mysqli_query($con, $query) or die (mysqli_error($con));
	return $result;
}

function close($conn){
	mysqli_close($conn);
}

function cek_session(){
	session_start();
	if(!isset($_SESSION['islogin'])){
		header("location:login/");
		echo "Harus login brooo..";
		exit;
	}
}

function is_admin(){
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] == 'ADMIN'){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}