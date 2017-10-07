$(document).ready(function(){
	$("#submit").click(function(){
		var nama = $("#nama").val();
		var telpon = $("#telpon").val();
		var email = $("#email").val();
		var alamat = $("#alamat").val();
		var jnskelamin = $("input[name='jnskelamin']:checked").val();
		var pengalaman = $("#pengalaman").val();
		var values = $("input[name='program']:checked").map(function(){
			return this.value;
		}).get();
		//var foto = $("#foto").val();

		// karena belum ada server.php buat return = false
		var data = new FormData();
		data.append('submit','submit');
		data.append('nama', nama);
		data.append('telpon', telpon);
		data.append('email', email);
		data.append('alamat', alamat);
		data.append('jnskelamin', jnskelamin);
		data.append('program[]', values);
		data.append('pengalaman', pengalaman);
		data.append('foto', $("#foto").get(0).files[0]);
		$.ajax({
			type: 'POST',
			url: 'proses_ajax.php',
			data: data,
			success: function(response){
				$("#formdaftar").append(json_decode(response));
			},
			error: function(response){
				alert(response);
			},
			processData: false,
			contentType: false
		});
		return false;
	});
});
