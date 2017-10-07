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
		<table class="table table-hover" border="1" bordercolor="#ddd">
			<thead>
				<tr>
					<th>Username</th>
					<th>Nama</th>
					<th>Role</th>
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
				$query 	= "SELECT u.*, k.nama FROM users u LEFT JOIN karyawan k ON u.karyawanid = k.karyawanid LIMIT $start_from,$limit";
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
		<?php 
			// hitung total record
			$query_total 	= "SELECT * FROM users";
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
