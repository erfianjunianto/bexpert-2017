<div class="container">
	<div class="jumbotron text-center">
		<h1>Selamat datang di Dashboard</h1>
		<p>sdr. </p> 
	</div>
	
	<div class="row">
		<div class="col-sm-4 text-center">
			<h3 style="color: #3498db;"><i class="fa fa-users fa-5x"></i></h3>
			<h3>Informasi Karyawan</h3>
			<a href="<?=BASEPATH;?>/karyawan" title="" class="btn btn-info btn-sm">Selengkapnya</a>
		</div>
		<div class="col-sm-4 text-center">
			<h3 style="color: #3498db;"><i class="fa fa-building fa-5x"></i></h3>
			<h3>Informasi Divisi</h3>
			<a href="<?=BASEPATH;?>/divisi" title="" class="btn btn-info btn-sm">Selengkapnya</a>
		</div>
		<div class="col-sm-4 text-center">
			<h3 style="color: #3498db;"><i class="fa fa-user-md fa-5x"></i></h3>
			<h3>Informasi User</h3>
			<a href="<?=BASEPATH;?>/users" title="" class="btn btn-info btn-sm">Selengkapnya</a>
		</div>
	</div>
	<div class="row"><p><br></p></div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<!-- Default panel contents -->
				<div class="panel-heading">Detail Karyawan</div>
				<div class="panel-body">
					<form method="post" class="inline-form" autocomplete="off">
						<div class="form-group">
							<label for="carikaryawan" class="col-sm-2 control-label">Cari Data Karyawan</label>
							<div class="col-sm-6">
								<input type="text" name="nama" id="nama" class="form-control">
							</div>
						</div>
					</form>
				</div>
				<!-- List group -->
				<ul class="list-group">
					<div id="search"></div>
				</ul>
			</div>
		</div>
	</div>
</div>