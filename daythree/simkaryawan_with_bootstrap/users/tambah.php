<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">User</a></li>
	  <li class="active">Tambah</li>
	</ol>
	<main class="row">
		<h3></h3>
		<?php 
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$role = $_POST['role'];
			$karyawanid= $_POST['karyawanid'];
			$file_name = "";

			if(empty($username)){
				echo "Username harus diisi";
			}else
			if(empty($password)){
				echo "Password harus diisi";
			}else{
				$con  	= connect_db();
				// cek apakah username sudah ada, karena harus unik
				$query	= "SELECT username FROM users WHERE username='$username'";
				$result = execute_query($con, $query);
				if(mysqli_num_rows($result) != 0){
					// kode sudah ada
					echo "<div>Username $username sudah terdaftar</div>";
				}else{
					if(isset($_FILES['gambar'])){
						$errors = array();
						$file_name = trim($_FILES['gambar']['name']);
						$file_size = $_FILES['gambar']['size'];
						$file_tmp  = $_FILES['gambar']['tmp_name'];
						$file_type = $_FILES['gambar']['type'];
						$file_ext  = strtolower(end(explode(".", $file_name)));
						$extensions= array('jpeg', 'jpg', 'png');
						if(in_array($file_ext, $extensions) === false){
							echo "Harus image broooo..";
						}elseif($file_size > 2097152){
							echo "File lebih dari 2 MB";
						}else{
							move_uploaded_file($file_tmp, "../image/".$file_name);
						}
					}
					$query = "INSERT INTO users(username, password, gambar, role, karyawanid) VALUES ('$username','$password','$file_name','$role','$karyawanid')";
					$result = execute_query($con, $query);
					if(mysqli_affected_rows($con) !=0){
						header("location:index.php");
					}else{
						echo "Error mang";
					}
				}
			}
		}
		?>
		<div class="col-sm-12">
			<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9">
						<input type="text" name="username" id="username" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9">
						<input type="password" name="password" id="password" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="gambar" class="col-sm-3 control-label">Foto</label>
					<div class="col-sm-9">
						<input type="file" name="gambar" id="gambar" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="role" class="col-sm-3 control-label">Role</label>
					<div class="col-sm-9">
						<select name="role" size="1" class="form-control">
							<?php 
							foreach ($role as $key => $value) {
								echo '<option value="'.$key.'">'.$value.'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="karyawanid" class="col-sm-3 control-label">Nama Karyawan</label>
					<div class="col-sm-9">
						<?php
						$con  	= connect_db(); 
						$query = "SELECT * FROM karyawan WHERE karyawanid NOT IN (SELECT karyawanid FROM users)";
						$result = execute_query($con, $query);
						?>
						<select name="karyawanid" id="karyawanid" size="1" class="form-control">
							<?php
							while($data = mysqli_fetch_array($result)){
								?>
								<option value="<?=$data['karyawanid'];?>"><?=$data['nama'];?></option>
								<?php
							}
							?>
						</select>
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