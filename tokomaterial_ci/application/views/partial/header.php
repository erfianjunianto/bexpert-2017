<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Sistem Toko Material</title>
	

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/image-picker/image-picker.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/printjs/print.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script type="text/javascript" src="<?=base_url();?>assets/scripts/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/image-picker/image-picker.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/printjs/print.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/bootstrap-select/bootstrap-select.js"></script>

    <script type="text/javascript">
        var idx = 0;

        function hapus(idx){
            $("#tr_"+idx).remove();
        }

        function add_content(idx, nama){
            var content = '<tr id="tr_'+ idx +'">';

            content += '<input type="hidden" name="idmaterial[]" id="idmaterial['+ idx +']" value="'+ idx +'">';

            content += '<td>';
            //content += '<input type="text" name="barang[]" id="barang['+ idx +']" value="'+ nama +'">';
            content += '<label for="namabarang">'+ nama +'</label>';
            content += '</td>';

            content += '<td>';
            content += '<input type="text" name="jumlah[]" id="jumlah['+ idx +']" class="form-control">';
            content += '</td>';

            content += '<td>';
            content += '<a href="#" onclick=\"hapus('+ idx +')\" class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash\"></i></a>';
            content += '</td>';

            content += '</tr>';

            $("#tabel tbody").append(content);
        }

        $(function(){
            //add_content();
            //idx++;
            $("#idmaterial").change(function(){
                var idmaterial = $("#idmaterial").val();
                var namamaterial = $("#idmaterial option:selected").data('nama');
                console.log(namamaterial);
                add_content(idmaterial, namamaterial);
                idx++;
            });
        });
    </script>
</head>
<body>