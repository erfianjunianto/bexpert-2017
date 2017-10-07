$(function(){
	function previewImage() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("foto").files[0]);

		oFReader.onload = function(oFREvent){
			document.getElementById("fotopreview").src = oFREvent.target.result;
		};
	};
	$("#formdaftar").submit(function(){
		var nama = $("#nama").val();
		var telepon = $("#telpon").val();
		var email = $("#email").val();
		var alamat = $("#alamat").val();
		var jsnkelamin = $("input[name='jnskelamin']:checked").val();
		var foto = $("#foto").val();
		var program = [];
		$.each($("input[name='program']:checked"), function(){
			program.push($(this).val());
		});

		var pengalaman = $("#pengalaman").val();
		// karena belum ada server.php buat return = false
		var output = "Nama = " + nama + "<br>";
		output += "Telepon = " + telpon + "<br>";
		output += "Email = "+ email +"<br>";
		output += "Alamat = "+ alamat +"<br>";
		output += "Jenis Kelamin = "+ jsnkelamin + "<br>";
		output += "Foto = <img width='100' height='100' id='fotopreview'><br>";
		output += "Program = "+ program +"<br>";
		output += "pengalaman = "+ pengalaman +"<br>";

		$("#formdaftar").after(output);
		previewImage();
		return false;
		
	});
});
