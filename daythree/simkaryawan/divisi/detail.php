<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
<body>
	<header>
		<h1>Detail Divisi</h1>		
	</header><!-- /header -->	
	<nav>
		<?php include('../fragment/menu.php'); ?>
	</nav>
	<main>
		<h3></h3>
		<?php 
			if(isset($_GET['divisiid'])){

				$con 	= connect_db();
				$divisiid= $_GET['divisiid'];
				$query 	= "SELECT * FROM divisi where divisiid='$divisiid'";
				$result = execute_query($con, $query);
				$data = mysqli_fetch_array($result);
		?>
		<table border="1" cellpadding="1" cellspacing="2">
			<tr>
				<th>Kode Divisi: </th>
				<td><?=$data['kode'];?></td>
			</tr>
			<tr>
				<th>Nama Divisi: </th>
				<td><?=$data['nama'];?></td>
			</tr>
		</table>
		<?php 
			}else{
				header("location:index.php");
			}
		?>
	</main>
	<?php include('../fragment/footer.php'); ?>
</body>
</html>