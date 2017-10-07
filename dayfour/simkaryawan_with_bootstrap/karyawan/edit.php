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
	<li class="active">Edit</li>

</ol>		

<main class="row">
	<h3></h3>
	<?php  
	$con = connect_db();
	if(isset($_POST['submit'])){
		$karyawanid = $_POST['karyawanid'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telpon = $_POST['telpon'];
		$jabatan = $_POST['jabatan'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$divisiid = $_POST['divisiid'];
		$tgllahir = $_POST['tgllahir'];
		if(empty($nama)){
			echo "Nama harus diisi";
		}elseif (empty($email)) {
			echo "Email harus diisi";
		}elseif (empty($telpon)) {
			echo "Telpon harus diisi";
		}else{
			$query = "UPDATE karyawan SET nama='$nama', email='$email', telpon='$telpon', jabatan='$jabatan', jeniskelamin='$jeniskelamin', divisiid='$divisiid', tgllahir='$tgllahir' WHERE karyawanid='$karyawanid'";
			$result = execute_query($con, $query);
			if(mysqli_affected_rows($con) != 0){
				header("location:index.php");
			}else{
				echo "Error mang";
			}
		}
	}elseif(isset($_GET['karyawanid'])){
		$karyawanid = $_GET['karyawanid'];
		$query = "SELECT * FROM karyawan WHERE karyawanid='$karyawanid'";
		$result = execute_query($con, $query);
		$data = mysqli_fetch_array($result);
	}
	?>	
	
		<div class="col-sm-12">
			<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6">
				<input type="hidden" name="karyawanid" value="<?=$karyawanid;?>">
				<div class="form-group">
					<label for="nama" class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-9">
						<input type="text" name="nama" required="required" class="form-control" value="<?=$data['nama'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="tgllahir" class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-9">
						<input type="text" name="tgllahir" id="tgllahir" class="form-control datepicker" value="<?=$data['tgllahir'];?>" data-default-today="true" data-date-format="DD-MM-YYYY" required="required">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-9">
						<input type="text" name="email" placeholder="" class="form-control" value="<?=$data['email'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="telpon" class="col-sm-3 control-label">Telpon</label>
					<div class="col-sm-9">
						<input type="text" name="telpon" placeholder="" class="form-control" value="<?=$data['telpon'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
					<div class="col-sm-9">
						<select name="jabatan" size="1" class="form-control">
							<?php 
							foreach ($jabatan as $key => $value) {
								$selected = "";
								if($key == $data['jabatan']){
									$selected = "selected";
								}
								?>
								<option value="<?=$key;?>" <?=$selected;?> ><?=$value;?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="jeniskelamin" class="col-sm-3 control-label">jeniskelamin</label>
					<div class="col-sm-9">
						<?php 
							$checked_l = "";
							$checked_p = "";
							if($data['jeniskelamin'] == 'L'){
								$checked_l = "checked";
							}else{
								$checked_p = "checked";
							}
						?>
						<input type="radio" name="jeniskelamin" value="L" id="L" <?=$checked_l;?> > Laki-Laki
						<input type="radio" name="jeniskelamin" value="P" id="P" <?=$checked_p;?> > Perempuan
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
								$selected = "";
								if($key == $data['divisiid']){
									$selected = "selected";
								}
								?>
								<option value="<?=$divisi['divisiid'];?>" <?=$selected;?> ><?=$divisi['nama'];?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="bottom">
					<input type="button" name="batal" value="Batal" class="btn btn-default pull-left" onclick="history.go(-1);">
					<input type="submit" name="submit" value="Ubah" class="btn btn-primary pull-right" id="submit">
				</div>
			</form>
		</div>
	
</main>
<?php include('../fragment/footer.php'); ?>
