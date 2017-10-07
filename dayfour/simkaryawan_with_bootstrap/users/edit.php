<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
	cek_session();
	if(!is_admin()){
		header("location:../index.php");
	}
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
			$username = $_POST['username'];
			$password = $_POST['password'];
			$role = $_POST['role'];
			$karyawanid = $_POST['karyawanid'];
			$file_name = "";

			if(empty($username)){
				echo "Username harus diisi";
			}else{
				$con  	= connect_db();
				// cek apakah username sudah ada, karena harus unik
				$query	= "SELECT username FROM users WHERE username='$username' and karyawanid <> '$karyawanid'";
				$result = execute_query($con, $query);
				if(mysqli_num_rows($result) != 0){
					// kode sudah ada
					echo "<div>Username $username sudah terdaftar</div>";
				}else{
					$strgambar 	= "";
					$strpass	= "";
					if(isset($_FILES['gambar']['name'])){
						$errors = array();
						$file_name = trim($_FILES['gambar']['name']);
						$file_size = $_FILES['gambar']['size'];
						$file_tmp  = $_FILES['gambar']['tmp_name'];
						$file_type = $_FILES['gambar']['type'];
						$file_ext  = strtolower(end(explode(".", $file_name)));
						$extensions= array('jpeg', 'jpg', 'png');
						if(in_array($file_ext, $extensions) === false){
							echo "Harus image broooo..";
							$strgambar ="";
						}elseif($file_size > 2097152){
							echo "File lebih dari 2 MB";
							$strgambar ="";
						}else{
							move_uploaded_file($file_tmp, "../image/".$file_name);
							$strgambar =", gambar='$file_name'";
						}
					}

					if(empty($password)){
						$strpass = "";
					}else{
						$strpass = ", password=md5('$password')";
					}

					$query = "UPDATE users SET username='$username' ".$strpass." ".$strgambar.", role='$role' WHERE userid='$userid'";
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
		}elseif(isset($_GET['userid'])){
			$con  	= connect_db();
			$userid = $_GET['userid'];
			$query = "SELECT * FROM users WHERE userid='$userid'";
			$result = execute_query($con, $query);
			$data = mysqli_fetch_array($result);
		}
		?>
		<div class="col-sm-12">
			<form action="" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6" enctype="multipart/form-data">
				<input type="hidden" name="userid" value="<?=$_GET['userid'];?>">
				<input type="hidden" name="karyawanid" value="<?=$data['karyawanid'];?>">
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9">
						<input type="text" name="username" id="username" required="required" class="form-control" value="<?=$data['username'];?>">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9">
						<input type="password" name="password" id="password" class="form-control" value="">
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
								$selected = "";
								if($data['role'] == $value){
									$selected = 'selected="selected"';
								}
								echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
							}
							?>
						</select>
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