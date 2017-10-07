<?php 

$hari = 2;
switch ($hari) {
	case '1':
		echo "Hari Minggu";
		break;
	case '2':
		echo "Hari Senin";
		break;
	case '3':
		echo "Hari Selasa";
		break;
	case '4':
		echo "Hari Rabu";
		break;
	case '5':
		echo "Hari Kamis";
		break;
	case '6':
		echo "Hari Jumat";
		break;
	case '7':
		echo "Hari Sabtu";
		break;
	
	default:
		echo "Tiada hari tanpamu";
		break;
}