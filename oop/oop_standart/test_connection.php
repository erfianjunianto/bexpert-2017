<?php 
require_once('DBConnection.php');
$koneksi = new DBConnection();
$koneksi->connect();
$query = "SELECT * FROM divisi";
$koneksi->execute_query($query);
$koneksi->show_result();