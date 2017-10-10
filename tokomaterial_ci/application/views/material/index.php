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
			<a href="<?=site_url('material/add');?>" title="" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah</a>
		</div>
	</div>
	<?php
	
		if($this->session->flashdata('pesan') == true){
			echo '<div class="alert alert-success" role="alert"> Data berhasil Ditambahkan</div>';
		}
		if($this->session->flashdata('pesan_update') == true){
			if($_SESSION['pesan_update'] == 1){
				echo '<div class="alert alert-success" role="alert"> Ubah data berhasil</div>';
			}else{
				echo '<div class="alert alert-danger" role="alert"> Ubah data gagal</div>';
			}
			
		}

		if($this->session->flashdata('pesan_delete') == true){
			if($_SESSION['pesan_delete'] == 1){
				echo '<div class="alert alert-success" role="alert"> Hapus data berhasil</div>';
			}else{
				echo '<div class="alert alert-danger" role="alert"> Hapus data gagal</div>';
			}
			
		}
	
	?>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($show as $key => $value) {
					?>
					<tr>
						<td><?=$key+1;?></td>
						<td><?=$value->kode;?></td>
						<td><?=$value->nama;?></td>
						<td>Rp.<?=number_format($value->harga,0,'.',',');?></td>
						<td>
							<a href="<?=site_url('material/read/'.$value->idmaterial);?>" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>
							<a href="<?=site_url('material/edit/'.$value->idmaterial);?>" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i></a>
							<a href="<?=site_url('material/delete/'.$value->idmaterial);?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>
						</td>
					</tr>

					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>