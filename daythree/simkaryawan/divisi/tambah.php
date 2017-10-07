<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
<body>
	<header>
		<h1>Tambah Divisi</h1>		
	</header><!-- /header -->	
	<nav>
		<?php include('../fragment/menu.php'); ?>
	</nav>
	<main>
		<h3></h3>
		<?php 
		if(isset($_POST['submit'])){
			$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			if(empty($kode)){
				echo "Kode divisi harus diisi";
			}else
			if(empty($nama)){
				echo "Nama Divisi harus diisi";
			}else{
				$con  	= connect_db();
				// cek apakah kode sudah ada, karena harus unik
				$query	= "SELECT divisiid FROM divisi WHERE kode='$kode'";
				$result = execute_query($con, $query);
				if(mysqli_num_rows($result) != 0){
					// kode sudah ada
					echo "<div>Kode $kode sudah terdaftar</div>";
				}else{
					$query = "INSERT INTO divisi (kode,nama) VALUES('$kode','$nama')";
					$result = execute_query($con, $query);
					if(mysqli_affected_rows($con) != 0 ){
						header("location:index.php");
					}else{
						echo "Error mang";
					}
				}
			}
		}
		?>
		<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah">
			<div>
				<label for="kode">Kode Divisi</label>
				<input type="text" name="kode" id="kode" size="3" required="required">
			</div>
			<div>
				<label for="nama">Nama Divisi</label>
				<input type="text" name="nama" id="nama" size="30" required="required">
			</div>
			<div>
				<input type="submit" name="submit" id="submit" value="Simpan">
			</div>
		</form>
	</main>
	<?php include('../fragment/footer.php'); ?>
</body>
</html>