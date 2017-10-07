<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
	cek_session();
	if(!is_admin()){
		header("location:../index.php");
	}
	$active_karyawan='class="active"';
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Karyawan</a></li>
	  <li class="active">Hapus</li>
	</ol>	
	<main>
		<h3></h3>
		<?php 
			if(isset($_GET['karyawanid'])){

				$con 	= connect_db();
				$karyawanid= $_GET['karyawanid'];
				$query 	= "DELETE FROM karyawan where karyawanid='$karyawanid'";
				$result = execute_query($con, $query);
				if(mysqli_affected_rows($con) != 0){
					echo "<p>Data berhasil dihapus</p> <br>";
					echo "<a href='index.php' class='btn btn-primary btn-sm'>Kembali</a>";
				}else{
					echo "<p>Data GAGAL dihapus</p> <br>";
					echo "<a href='index.php' class='btn btn-primary btn-sm'>Kembali</a>";
				}
			}else{
				header("location:index.php");
			}
		?>
	</main>
	<?php include('../fragment/footer.php'); ?>