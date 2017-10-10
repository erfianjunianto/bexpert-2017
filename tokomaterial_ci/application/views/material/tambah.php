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
	<div class="col-sm-12">		
		<form action="<?=site_url('material/create');?>" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-6">
			<div class="form-group">
				<label for="kode" class="col-sm-3 control-label">Kode Material: </label>
				<div class="col-sm-9">
					<input type="text" name="kode" id="kode" required="required" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Nama Material: </label>
				<div class="col-sm-9">
					<input type="text" name="nama" id="nama" required="required" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Harga Material: </label>
				<div class="col-sm-9">
					<input type="number" name="harga" id="harga" required="required" class="form-control">
				</div>
			</div>
			<div class="bottom">
				<input type="button" name="batal" id="batal" value="Batal" class="btn btn-sm btn-default pull-left" onclick="history.go(-1)">
				<input type="submit" name="submit" id="submit" value="Simpan" class="btn btn-sm btn-primary pull-right">
			</div>
		</form>
	</div>
</div>
