<?php 

session_start();
if(isset($_SESSION['islogin'])){
	echo "Hello ". $_SESSION['username'];
}else{
	echo "Belum login";
}