$(function(){
	$("#nama").on('keyup', function(){
		var nama = $("#nama").val();
		var data = new FormData();
		data.append('submit','submit');
		data.append('nama', nama);

		$.ajax({
			type: 'POST',
			url: 'karyawan/cari_karyawan.php',
			data: data,
			success: function(res){
				$("#search").html(res);
			},
			error: function(res){
				$("#search").html(res);
			},
			processData: false,
			contentType: false
		});
		return false;
	});
});