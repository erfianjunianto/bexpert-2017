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
			<a href="<?=site_url('persediaan/add');?>" title="" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah</a>
		</div>
	</div>
	<?php 
		if($this->session->flashdata('pesan') == true){
			if($_SESSION['pesan'] == true){
				echo '<div class="alert alert-success" role="alert"> Data berhasil Ditambahkan</div>';
			}else{
				echo '<div class="alert alert-danger" role="alert"> Data gagal Ditambahkan</div>';
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
					<th>Jumlah Persediaan</th>
					<th>Tanggal</th>
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
						<td><?=number_format($value->jumlah_persediaan,0,'.',',');?></td>
						<td><?=$value->tanggal;?></td>
						<td>
							<a href="<?=site_url('persediaan/read/'.$value->idpersediaan);?>" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>
							<a href="<?=site_url('persediaan/edit/'.$value->idpersediaan);?>" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i></a>
							<a href="<?=site_url('persediaan/delete/'.$value->idpersediaan);?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>
						</td>
					</tr>

					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>