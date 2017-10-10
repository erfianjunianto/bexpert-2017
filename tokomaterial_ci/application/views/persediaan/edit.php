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
		<form action="<?=site_url('persediaan/update');?>" method="post" accept-charset="utf-8" name="formtambah" id="formtambah" class="form-horizontal col-sm-8">
			<input type="hidden" name="id" value="<?=$show_persediaan->idpersediaan;?>">
			<div class="form-group">
				<label for="kode" class="col-sm-3 control-label">Material: </label>
				<div class="col-sm-9">
					<select name="idmaterial" size="1" class="form-control disabled=" disabled="disabled">
						<?php 
							foreach ($show as $key => $value) {
								$str = "";
								if($value->idmaterial == $show_persediaan->idpersediaan){
									$str = 'selected="selected"';
								}
								?>
								<option value="<?=$value->idmaterial;?>" <?=$str;?> > <?=$value->kode;?> - <?=$value->nama;?></option>
								<?php
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="nama" class="col-sm-3 control-label">Jumlah Persediaan: </label>
				<div class="col-sm-9">
					<input type="number" name="jumlah_persediaan" id="jumlah_persediaan" required="required" class="form-control" value="<?=$show_persediaan->jumlah_persediaan;?>">
				</div>
			</div>
			<div class="bottom">
				<input type="button" name="batal" id="batal" value="Batal" class="btn btn-sm btn-default pull-left" onclick="history.go(-1)">
				<input type="submit" name="submit" id="submit" value="Update" class="btn btn-sm btn-primary pull-right">
			</div>
		</form>
	</div>
</div>
