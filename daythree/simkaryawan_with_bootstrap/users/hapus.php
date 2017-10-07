<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">User</a></li>
	  <li class="active">Hapus</li>
	</ol>	
	<main class="row">
		<div class="col-sm-12">
		<h3></h3>
		<?php 
			if(isset($_GET['userid'])){

				$con 	= connect_db();
				$userid= $_GET['userid'];
				$query 	= "DELETE FROM users where userid='$userid'";
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
		</div>
	</main>
	<?php include('../fragment/footer.php'); ?>