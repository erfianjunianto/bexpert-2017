<?php 

function say_hello(){
	echo "Hello world";
}

function tambah($a, $b){
	$hasil = $a + $b;
	return $hasil;
}

function rata_rata($nilai = array()){
	$total = 0;
	foreach ($nilai as $value) {
		$total += $value;
	}
	$rata_rata = $total / count($nilai);
	return $rata_rata;
}

// panggil function

say_hello();
echo "<hr>";
$hasil = tambah(1,1);
echo $hasil;
echo "<hr>";
$nilai = [10,20,30,40,50];
$rata = rata_rata($nilai);
echo $rata;