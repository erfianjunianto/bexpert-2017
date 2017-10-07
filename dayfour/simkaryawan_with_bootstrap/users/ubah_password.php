<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
	cek_session();
	$active_user='class="active"';
	
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">User</a></li>
	  <li class="active">Edit</li>
	</ol>
	<main class="row">
		<h3></h3>
		<?php 
		if(isset($_POST['submit'])){
			$userid = $_POST['userid'];
			$karyawanid = $_POST['karyawanid'];
			$password_lama = $_POST['password_lama'];
			$password_baru = $_POST['password_baru'];
			$password_baru_konfirmasi = $_POST['password_baru_konfirmasi'];

			if(empty($password_lama)){
				echo "Password lama harus diisi";
			}else
			if(empty($password_baru)){
				echo "Password baru harus diisi";
			}else
			if(empty($password_baru_konfirmasi)){
				echo "Password baru konfirmasi harus diisi";
			}else
			if($password_baru != $password_baru_konfirmasi){
				echo "Password baru dan password baru konfirmasi tidak sama";
			}else{
				$con  	= connect_db();
				// cek apakah username sudah ada, karena harus unik
				$query	= "SELECT password FROM users WHERE password=md5('$password_lama') and karyawanid = '$karyawanid' and userid='$userid'";
				$result = execute_query($con, $query);
				if(mysqli_num_rows($result) == 0){
					// kode sudah ada
					echo "<div>Password lama anda tidak ditemukan</div>";
				}else{
					

					$query = "UPDATE users SET password=md5('$password_baru_konfirmasi') WHERE userid='$userid'";
					$result = execute_query($con, $query);
					if($result){
						header("location:index.php");
						#echo $query;
					}else{
						#echo $query;
						echo "Error mang";
					}
				}
			}
		}
		?>
		<div class="col-sm-12">
			<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6" enctype="multipart/form-data">
				<input type="hidden" name="userid" value="<?=$_SESSION['userid'];?>">
				<input type="hidden" name="karyawanid" value="<?=$_SESSION['karyawanid'];?>">
				
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password Lama</label>
					<div class="col-sm-9">
						<input type="password" name="password_lama" id="password_lama" class="form-control" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password Baru</label>
					<div class="col-sm-9">
						<input type="password" name="password_baru" id="password_baru" class="form-control" value="">
					</div>
				</div>
				
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Konfirmasi Password Baru</label>
					<div class="col-sm-9">
						<input type="password" name="password_baru_konfirmasi" id="password_baru_konfirmasi" class="form-control" value="">
					</div>
				</div>

				<div class="bottom">
					<input type="button" name="batal" id="batal" value="Batal" class="btn btn-sm btn-default pull-left">
					<input type="submit" name="submit" id="submit" value="Update" class="btn btn-sm btn-primary pull-right">
				</div>
			</form>
		</div>
	</main>
	<?php include('../fragment/footer.php'); ?>