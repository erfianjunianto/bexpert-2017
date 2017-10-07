<?php 
if(isset($_POST['submit'])){
	include('../konfigurasi/config.php');
	include('../konfigurasi/function.php');
	$nama = $_POST['nama'];
	$con = connect_db();
	$query = "SELECT * FROM karyawan WHERE nama like '%$nama%'";
	$result = execute_query($con, $query);
	$str = "";
	while ( $data = mysqli_fetch_array($result)) {
		$str .= "<li class='list-group-item'>Nama : $data[nama]</li>";
	}
	if(empty($nama)){
		echo "<li class='list-group-item'>Nothing can be found</li>";
	}else{
		echo $str;
	}
}
?>