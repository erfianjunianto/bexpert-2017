<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
	cek_session();
	if(!is_admin()){
		header("location:../index.php");
	}
	$active_divisi='class="active"';
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Divisi</a></li>
	  <li class="active">Edit</li>
	</ol>
	<main>
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
		<div class="col-sm-12">
			<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6">
				<input type="hidden" name="divisiid" value="<?=$data['divisiid'];?>" id="divisiid">
				<div class="form-group">
					<label for="kode" class="col-sm-3 control-label">Kode Divisi <span style="color: red; font-weight: bold;">*</span></label>
					<div class="col-sm-9">
						<input type="text" name="kode" id="kode" size="3" required="required" value="<?=$data['kode'];?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-3 control-label">Nama Divisi <span style="color: red; font-weight: bold;">*</span></label>
					<div class="col-sm-9">
						<input type="text" name="nama" id="nama" size="30" required="required" value="<?=$data['nama'];?>" class="form-control">
					</div>
				</div>
				<div class="bottom">
					<input type="button" name="batal" id="batal" value="Batal" class="btn btn-default btn-sm pull-left" onclick="history.go(-1);">
					<input type="submit" name="submit" id="submit" value="Ubah" class="btn btn-primary btn-sm pull-right">
				</div>
			</form>
		</div>
	</main>
	<?php include('../fragment/footer.php'); ?>
