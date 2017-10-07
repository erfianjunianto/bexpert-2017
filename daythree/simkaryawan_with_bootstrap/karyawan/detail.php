<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Karyawan</a></li>
	  <li class="active">Detail</li>
	</ol>
	<main class="row">
		<?php 
			if(isset($_GET['karyawanid'])){

				$con 	= connect_db();
				$karyawanid= $_GET['karyawanid'];
				$query 	= "SELECT k.*, d.nama as namadivisi FROM karyawan k INNER JOIN divisi d ON d.divisiid=k.divisiid";
				$result = execute_query($con, $query);
				$data = mysqli_fetch_array($result);
		?>
		<div class="panel panel-primary">
		<!-- Default panel contents -->
			<div class="panel-heading">Detail Karyawan</div>
			<div class="panel-body"></div>
			<!-- List group -->
			<ul class="list-group">
				<li class="list-group-item">Nama Karyawan : <i><b> <?=$data['nama'];?></b></i> </li>
				<li class="list-group-item">Email Karyawan : <i><b> <?=$data['email'];?></b></i> </li>
				<li class="list-group-item">Telepon Karyawan : <i><b> <?=$data['telpon'];?></b></i> </li>
				<li class="list-group-item">Jabatan Karyawan : <i><b> <?=$data['jabatan'];?></b></i> </li>
				<li class="list-group-item">Jenis Kelamin Karyawan : <i><b> <?=$data['jeniskelamin']=='L'?'Laki-Laki':'Perempuan';?></b></i> </li>
				<li class="list-group-item">Divisi : <i><b> <?=$data['namadivisi'];?></b></i> </li>
			</ul>
		</div>
		<?php 
			}else{
				header("location:index.php");
			}
		?>
	</main>
	<?php include('../fragment/footer.php'); ?>

