<?php 

if(isset($_POST['submit'])){
	$faktur = $_POST['faktur'];
	$petugas= $_POST['petugas'];

	// array barang

	echo "Nomor Faktur : $faktur<br> Petugas : $petugas <br>";
	echo "Detail Barang: <br>";
	for($i=0; $i<count($_POST['barang']); $i++){
		echo "#".($i+1).". Barang : ".$_POST['barang'][$i]." Jumlah : ".$_POST['Jumlah'][$i]." Satuan : ".$_POST['satuan'][$i]." Total : ".$_POST['total'][$i]."<br>";
	}

}