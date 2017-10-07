<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
?>
	<?php include('../fragment/menu.php'); ?>
	<div class="row">
		<div class="col-sm-10">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li><a href="#">User</a></li>
			  <li class="active">Daftar</li>
			  
			</ol>		
		</div>
		<div class="col-sm-2">
			<a href="tambah.php" class="btn btn-sm btn-primary pull-right col-sm-12">Tambah</a>
		</div>
	</div>
	
	<main>
		<h3></h3>
		<table class="table table-Striped">
			<thead>
				<tr>
					<th>Username</th>
					<th>Nama</th>
					<th>Role</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php 
				$con 	= connect_db();
				$query 	= "SELECT u.*, k.nama FROM users u LEFT JOIN karyawan k ON u.karyawanid = k.karyawanid";
				$result = execute_query($con, $query);
			?>
			<tbody>
				<?php 
					while ($data = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><i><?=$data['username'];?></i></td>
					<td><?=$data['nama'];?></td>
					<td><?=$data['role'];?></td>
					<td>
						<a href="detail.php?userid=<?=$data['userid'];?>" class="btn btn-xs btn-success"> Detail </a>
						<a href="edit.php?userid=<?=$data['userid'];?>" class="btn btn-xs btn-warning"> Edit </a>
						<a href="hapus.php?userid=<?=$data['userid'];?>" class="btn btn-xs btn-danger"> Hapus </a>
					</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
	</main>
	<?php include('../fragment/footer.php'); ?>
