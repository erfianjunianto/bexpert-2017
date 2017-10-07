<?php 

$numbers = array(1,2,3,4,5);
foreach ($numbers as $value) {
	echo $value;
}

$numbers[0] = "one";
$numbers[1] = "two";
$numbers[2] = "tree";
$numbers[3] = "four";
$numbers[4] = "five";
echo "<br>";
foreach ($numbers as $value) {
	echo $value. "<br>";
}