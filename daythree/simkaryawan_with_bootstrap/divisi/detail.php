<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<ol class="breadcrumb">
	  <li><a href="#">Home</a></li>
	  <li><a href="#">Divisi</a></li>
	  <li class="active">Detail</li>
	</ol>
	<main class="row">
		<?php 
			if(isset($_GET['divisiid'])){

				$con 	= connect_db();
				$divisiid= $_GET['divisiid'];
				$query 	= "SELECT * FROM divisi where divisiid='$divisiid'";
				$result = execute_query($con, $query);
				$data = mysqli_fetch_array($result);
		?>
		<div class="panel panel-primary">
		<!-- Default panel contents -->
			<div class="panel-heading">Detail Divisi</div>
			<div class="panel-body"></div>
			<!-- List group -->
			<ul class="list-group">
				<li class="list-group-item">Kode Divisi : <i><b><?=$data['kode'];?></b></i> </li>
				<li class="list-group-item">Nama Divisi : <i><b><?=$data['nama'];?></b></i> </li>
			</ul>
		</div>
		<?php 
			}else{
				header("location:index.php");
			}
		?>
	</main>
	<?php include('../fragment/footer.php'); ?>

