<div class="container-fluid">
	<div class="container">
		<div class="col-sm-12">
			
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Material</h3>
					</div>
					<form action="<?=site_url('home/create');?>" method="post">
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-gorup">
									<label for="pilihmeterial" class="col-sm-2 control-label">Pilih Material</label>
									<div class="col-sm-10">
										<select name="idmaterial" id="idmaterial" size="1" class="form-control">
											<option value="-" selected="selected" disabled="disabled"></option>
											<?php 
											foreach ($show as $key => $value) {
												?>
												<option value="<?=$value->idmaterial;?>" data-nama="<?=$value->nama;?>"> <?=$value->kode;?> - <?=$value->nama;?> </option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
							</form>
						</div>

					</form>
				</div>
			
		</div>
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Pesanan</h3>
				</div>
				<div class="panel-body">
					<table id="tabel" class="table table-hover">
						<thead>
							<tr>
								<th>Nama Barang</th>
								<th>Qty</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
						<tfoot>
							<tr><td colspan="3"> <input type="submit" name="submit" value="Bayar" id="submit" class="btn btn-primary pull-right"> </td></tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>