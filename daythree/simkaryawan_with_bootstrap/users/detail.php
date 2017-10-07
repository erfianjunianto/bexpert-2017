<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Users</a></li>
	  <li class="active">Detail</li>
	</ol>
	<main class="row">
		<?php 
			if(isset($_GET['userid'])){

				$con 	= connect_db();
				$userid= $_GET['userid'];
				$query 	= "SELECT u.*, k.nama FROM users u, karyawan k where u.userid='$userid' and u.karyawanid = k.karyawanid";
				$result = execute_query($con, $query);
				$data = mysqli_fetch_array($result);
		?>
		<div class="col-sm-12">
			
		
		<div class="panel panel-primary">
		<!-- Default panel contents -->
			<div class="panel-heading">Detail Users</div>
			<div class="panel-body"></div>
			<!-- List group -->
			<ul class="list-group">
				<li class="list-group-item">Username : <i><b><?=$data['username'];?></b></i> </li>
				<li class="list-group-item">Nama User : <i><b><?=$data['nama'];?></b></i> </li>
				<li class="list-group-item">Role : <i><b><?=$data['role'];?></b></i> </li>
				<li class="list-group-item">Foto : <img src="../image/<?=$data['gambar'];?>" width="30%" height="30%" class="thumbnail"> </li>
			</ul>
		</div>
		<?php 
			}else{
				header("location:index.php");
			}
		?>
		</div>
	</main>
	<?php include('../fragment/footer.php'); ?>

