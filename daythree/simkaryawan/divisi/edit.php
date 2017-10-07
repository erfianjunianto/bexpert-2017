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
			$divisiid = $_POST['divisiid'];
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
				$query	= "SELECT divisiid FROM divisi WHERE kode='$kode' AND divisiid<>'$divisiid'";
				$result = execute_query($con, $query);
				$data = mysqli_fetch_array($result);
				if(mysqli_num_rows($result) != 0){
					// kode sudah ada
					echo "<div>Kode $kode sudah terdaftar untuk $data[nama]</div>";
				}else{
					$query = "UPDATE divisi SET kode='$kode', nama='$nama' WHERE divisiid='$divisiid'";
					$result = execute_query($con, $query);
					if($result){
						header("location:index.php");
					}else{
						echo "Error mang";
					}
				}
			}
		}elseif (isset($_GET['divisiid'])) {
			# tampilkan data di form
			$con  	= connect_db();
			$divisiid = $_GET['divisiid'];
			// cek apakah kode sudah ada, karena harus unik
			$query	= "SELECT * FROM divisi WHERE divisiid='$divisiid'";
			$result = execute_query($con, $query);
			$data = mysqli_fetch_array($result);
		}
		?>
		<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah">
			<input type="hidden" name="divisiid" value="<?=$data['divisiid'];?>" id="divisiid">
			<div>
				<label for="kode">Kode Divisi</label>
				<input type="text" name="kode" id="kode" size="3" required="required" value="<?=$data['kode'];?>">
			</div>
			<div>
				<label for="nama">Nama Divisi</label>
				<input type="text" name="nama" id="nama" size="30" required="required" value="<?=$data['nama'];?>">
			</div>
			<div>
				<input type="submit" name="submit" id="submit" value="Ubah">
			</div>
		</form>
	</main>
	<?php include('../fragment/footer.php'); ?>
</body>
</html>