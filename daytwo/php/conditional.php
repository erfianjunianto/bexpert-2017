<?php 

$x = 1;
$y = 1;
$hasil = $x == $y ? "x sama dengan y": "x tidak sama dengan y";
echo $hasil;
echo "<br>";

$nama1 = "Budi";
$nama2 = "budi";
$result1 = $nama1 == $nama2 ? "nama sama": "nama tidak sama";
$result2 = strtolower($nama1) == strtolower($nama2)?"nama sama":"nama tidak sama";

echo $result1;
echo "<br>";
echo $result2;
