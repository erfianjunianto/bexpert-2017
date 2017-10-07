<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
<body>
	<header>
		<h1>Hapus Divisi</h1>		
	</header><!-- /header -->	
	<nav>
		<?php include('../fragment/menu.php'); ?>
	</nav>
	<main>
		<h3></h3>
		<?php 
			if(isset($_GET['divisiid'])){

				$con 	= connect_db();
				$divisiid= $_GET['divisiid'];
				$query 	= "DELETE FROM divisi where divisiid='$divisiid'";
				$result = execute_query($con, $query);
				if(mysqli_affected_rows($con) != 0){
					echo "Data berhasil dihapus <br>";
					echo "<a href='index.php'>Kembali</a>";
				}else{
					echo "Data GAGAL dihapus <br>";
					echo "<a href='index.php'>Kembali</a>";
				}
			}else{
				header("location:index.php");
			}
		?>
	</main>
	<?php include('../fragment/footer.php'); ?>
</body>
</html>