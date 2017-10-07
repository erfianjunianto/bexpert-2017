<?php 
	include('../konfigurasi/config.php'); 
	include('../fragment/header.php');
	include('../konfigurasi/function.php'); 
	cek_session();
	$active_karyawan='class="active"';
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
			<?php 
			if(is_admin()){
				echo '<a href="tambah.php" class="btn btn-sm btn-primary pull-right col-sm-12">Tambah</a>';
			}
			?>	
		</div>
	</div>
	
	<main>
		<h3></h3>
		<table class="table table-hover" border="1" bordercolor="#ddd">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Tgl Lahir</th>
					<th>Email</th>
					<th>Telpon</th>
					<th>Jabatan</th>
					<th>Jenis Kelamin</th>
					<th>Divisi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php 
				$limit = 5;
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}else{
					$page = 1;
				}
				$start_from = ($page - 1) * $limit;
				$con 	= connect_db();
				$query 	= "SELECT k.*, d.nama as namadivisi FROM karyawan k INNER JOIN divisi d ON d.divisiid = k.divisiid LIMIT $start_from, $limit";
				$result = execute_query($con, $query);
			?>
			<tbody>
				<?php 
					while ($data = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><?=$data['nama'];?></td>
					<td><?=date('d-m-Y', strtotime($data['tgllahir']));?></td>
					<td><?=$data['email'];?></td>
					<td><?=$data['telpon'];?></td>
					<td><?=$data['jabatan'];?></td>
					<td><?=$data['jeniskelamin']=='L'?'Laki-Laki':'Perempuan';?></td>
					<td><?=$data['namadivisi'];?></td>
					<td>
						<?php 
						if(is_admin()){		
							?>
							<a href="detail.php?karyawanid=<?=$data['karyawanid'];?>" class="btn btn-xs btn-success"> Detail </a>
							<a href="edit.php?karyawanid=<?=$data['karyawanid'];?>" class="btn btn-xs btn-warning"> Edit </a>
							<a href="hapus.php?karyawanid=<?=$data['karyawanid'];?>" class="btn btn-xs btn-danger"> Hapus </a>
							<?php
						}else{
							?>
							<a href="detail.php?karyawanid=<?=$data['karyawanid'];?>" class="btn btn-xs btn-success"> Detail </a>
							<?php
						}
						?>
					</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
		<?php 
			// hitung total record
			$query_total 	= "SELECT * FROM karyawan";
			$result_total 	= execute_query($con, $query_total);
			$total_row 		= mysqli_num_rows($result_total);
			$total_page 	= ceil($total_row / $limit);
		?>
		<nav aria-label="Page navigation">
		  <ul class="pagination">
		    
		    <?php
	    	if($page > 1){
	    		echo '
	    			<li>
				      <a href="index.php?page='.($page-1).'" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
	    		';
	    	}
		    for ($i=1; $i <= $total_page; $i++) {
		    	if($page == $i){
					echo "<li class='active'><a href='index.php?page=".$i."'>".$i."</a></li>";
		    	}else{
		    		echo "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
		    	} 

			}
			if($page < $total_page){
	    		echo '
	    			<li>
				      <a href="index.php?page='.($page+1).'" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
	    		';
	    	}
		    ?>
		  </ul>
		</nav>
	</main>
	<?php include('../fragment/footer.php'); ?>
