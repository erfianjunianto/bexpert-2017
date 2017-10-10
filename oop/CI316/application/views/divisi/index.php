<div class="container">
	<div class="row">
		<div class="col-sm-10">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#"><?=$title;?></a></li>
				<li class="active"><?=$sub_title;?></li>
			</ol>		
		</div>
		<div class="col-sm-2">
			<a href="<?=site_url('divisi/add');?>" title="" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah</a>
		</div>
	</div>
	<?php 
		if($this->session->flashdata('pesan')== true){
			echo '<div class="alert alert-success" role="alert"> Tambah Data Berhasil</div>';
		}
	?>
	<table class="table table-hover" border="1" bordercolor="#ddd">
		<thead>
			<tr>
				<th>Kode Divisi</th>
				<th>Nama Divisi</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($show as $value) {
					echo "<tr>";
					echo "<td>".$value->kode."</td>";
					echo "<td>".$value->nama."</td>";
					echo "<td>";
					?>
							<a href="<?=site_url('divisi/detail/'.$value->divisiid);?>" class="btn btn-xs btn-success"> Detail </a>
							<a href="<?=site_url('divisi/edit/'.$value->divisiid);?>" class="btn btn-xs btn-warning"> Edit </a>
							<form method="post" action="<?=site_url('divisi/delete');?>" style="float: right;">
								<input type="hidden" name="divisiid" value="<?=$value->divisiid;?>">
								<button type="submit" name="submit" class="btn btn-xs btn-danger"> Hapus</button>
							</form>
							
					<?php
					echo "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>

</div>