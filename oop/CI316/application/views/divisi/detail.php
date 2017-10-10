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
			
		</div>
	</div>

	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">Detail Divisi</div>
		<div class="panel-body"></div>
		<!-- List group -->
		<ul class="list-group">
			<li class="list-group-item">Kode Divisi : <i><b><?=$show->kode;?></b></i> </li>
			<li class="list-group-item">Nama Divisi : <i><b><?=$show->nama;?></b></i> </li>
		</ul>
	</div>
</div>
