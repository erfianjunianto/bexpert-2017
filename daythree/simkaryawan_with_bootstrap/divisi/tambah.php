<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Divisi</a></li>
	  <li class="active">Tambah</li>
	</ol>
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
		<div class="col-sm-12">		
			<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6">
				<div class="form-group">
					<label for="kode" class="col-sm-3 control-label">Kode Divisi</label>
					<div class="col-sm-9">
						<input type="text" name="kode" id="kode" size="3" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-3 control-label">Nama Divisi</label>
					<div class="col-sm-9">
						<input type="text" name="nama" id="nama" size="30" required="required" class="form-control">
					</div>
				</div>
				<div class="bottom">
					<input type="button" name="batal" id="batal" value="Batal" class="btn btn-sm btn-default pull-left">
					<input type="submit" name="submit" id="submit" value="Simpan" class="btn btn-sm btn-primary pull-right">
				</div>
			</form>
		</div>
	</main>
	<?php include('../fragment/footer.php'); ?>