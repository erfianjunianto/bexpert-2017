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
			  <li><a href="#">Karyawan</a></li>
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
					<th>Nama</th>
					<th>Email</th>
					<th>Telpon</th>
					<th>Jabatan</th>
					<th>Jenis Kelamin</th>
					<th>Divisi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php 
				$con 	= connect_db();
				$query 	= "SELECT k.*, d.nama as namadivisi FROM karyawan k INNER JOIN divisi d ON d.divisiid = k.divisiid";
				$result = execute_query($con, $query);
			?>
			<tbody>
				<?php 
					while ($data = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><?=$data['nama'];?></td>
					<td><?=$data['email'];?></td>
					<td><?=$data['telpon'];?></td>
					<td><?=$data['jabatan'];?></td>
					<td><?=$data['jeniskelamin']=='L'?'Laki-Laki':'Perempuan';?></td>
					<td><?=$data['namadivisi'];?></td>
					<td>
						<a href="detail.php?karyawanid=<?=$data['karyawanid'];?>" class="btn btn-xs btn-success"> Detail </a>
						<a href="edit.php?karyawanid=<?=$data['karyawanid'];?>" class="btn btn-xs btn-warning"> Edit </a>
						<a href="hapus.php?karyawanid=<?=$data['karyawanid'];?>" class="btn btn-xs btn-danger"> Hapus </a>
					</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
	</main>
	<?php include('../fragment/footer.php'); ?>
