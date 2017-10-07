<?php 

$nilai = 80;
if($nilai >=91 and $nilai <=100){
	echo "A";
}elseif ($nilai >=81 and $nilai <=90) {
	echo "B";
}elseif ($nilai >=71 and $nilai <=80) {
	echo "C";
}elseif ($nilai >=61 and $nilai <= 70) {
	echo "D";
}else{
	echo "E";
}