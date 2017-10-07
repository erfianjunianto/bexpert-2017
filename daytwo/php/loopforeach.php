<?php 
$nilai = array(
		"Budi" => array(
			"physics" => 35,
			"maths" => 30,
			"chemistry" => 39,
		),
		"Ani" => array(
			"physics" => 30,
			"maths" => 32,
			"chemistry" => 29,
		),
		"Zara" => array(
			"physics" => 31,
			"maths" => 22,
			"chemistry" => 39,
		),
);

foreach ($nilai as $idx => $siswa) {
	echo "Nilai $idx <br>";
	foreach ($siswa as $key => $value) {
		echo "$key = $value <br>";
	}
	echo "<hr>";
}