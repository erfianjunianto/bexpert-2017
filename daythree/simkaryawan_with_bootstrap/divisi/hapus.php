<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Divisi</a></li>
	  <li class="active">Hapus</li>
	</ol>	
	<main class="row">
		<h3></h3>
		<?php 
			if(isset($_GET['divisiid'])){

				$con 	= connect_db();
				$divisiid= $_GET['divisiid'];
				$query 	= "DELETE FROM divisi where divisiid='$divisiid'";
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