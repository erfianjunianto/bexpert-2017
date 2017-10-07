<?php 
include('../konfigurasi/config.php'); 
include('../fragment/header.php');
include('../konfigurasi/function.php'); 
?>
<?php include('../fragment/menu.php'); ?>

<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Karyawan</a></li>
	<li class="active">Tambah</li>

</ol>		

<main class="row">
	<h3></h3>
	<?php  
	$con = connect_db();
	if(isset($_POST['submit'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telpon = $_POST['telpon'];
		$jabatan = $_POST['jabatan'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$divisiid = $_POST['divisiid'];
		if(empty($nama)){
			echo "Nama harus diisi";
		}elseif (empty($email)) {
			echo "Email harus diisi";
		}elseif (empty($telpon)) {
			echo "Telpon harus diisi";
		}else{
			$query = "INSERT INTO karyawan (nama, email, telpon, jabatan, jeniskelamin, divisiid) VALUES ('$nama', '$email','$telpon','$jabatan','$jeniskelamin','$divisiid')";
			$result = execute_query($con, $query);
			if(mysqli_affected_rows($con) != 0){
				header("location:index.php");
			}else{
				echo "Error mang";
			}
		}
	}
	?>	
	

		<div class="col-sm-12">
			<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6">
				<div class="form-group">
					<label for="nama" class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-9">
						<input type="text" name="nama" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-9">
						<input type="text" name="email" value="" placeholder="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="telpon" class="col-sm-3 control-label">Telpon</label>
					<div class="col-sm-9">
						<input type="text" name="telpon" value="" placeholder="" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
					<div class="col-sm-9">
						<select name="jabatan" size="1" class="form-control">
							<?php 
							foreach ($jabatan as $key => $value) {
								?>
								<option value="<?=$key;?>"><?=$value;?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="jeniskelamin" class="col-sm-3 control-label">jeniskelamin</label>
					<div class="col-sm-9">
						<input type="radio" name="jeniskelamin" value="L" id="L"> Laki-Laki
						<input type="radio" name="jeniskelamin" value="P" id="P"> Perempuan
					</div>
				</div>
				<div class="form-group">
					<label for="divisiid" class="col-sm-3 control-label">divisiid</label>
					<div class="col-sm-9">
						<select name="divisiid" size="1" class="form-control">
							<?php 
							$query = "SELECT * FROM divisi";
							$result = execute_query($con, $query);
							while ($divisi = mysqli_fetch_array($result)) {
								?>
								<option value="<?=$divisi['divisiid'];?>"><?=$divisi['nama'];?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="bottom">
					<input type="button" name="batal" value="Batal" class="btn btn-default pull-left" onclick="history.go(-1);">
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary pull-right" id="submit">
				</div>
			</form>
		</div>
	
</main>
<?php include('../fragment/footer.php'); ?>
