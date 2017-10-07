<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
<body>
	<header>
		<h1>Daftar Divisi</h1>		
	</header><!-- /header -->	
	<nav>
		<?php include('../fragment/menu.php'); ?>
	</nav>
	<main>
		<h3><a href="tambah.php">Tambah</a></h3>
		<table border="1" cellpadding="1" cellspacing="0">
			<thead>
				<tr>
					<th>Kode Divisi</th>
					<th>Nama Divisi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php 
				$con 	= connect_db();
				$query 	= "SELECT * FROM divisi";
				$result = execute_query($con, $query);
			?>
			<tbody>
				<?php 
					while ($data = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><?=$data['kode'];?></td>
					<td><?=$data['nama'];?></td>
					<td>
						<a href="detail.php?divisiid=<?=$data['divisiid'];?>"> Detail </a> | 
						<a href="edit.php?divisiid=<?=$data['divisiid'];?>"> Edit </a> |
						<a href="hapus.php?divisiid=<?=$data['divisiid'];?>"> Hapus </a>
					</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
	</main>
	<?php include('../fragment/footer.php'); ?>
</body>
</html>