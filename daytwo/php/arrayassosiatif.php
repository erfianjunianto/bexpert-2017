<?php 

$salaries = array("Budi" => 2000, "Ani" => 1000, "Zara" => 500);
echo "Salary of Budi is ". $salaries['Budi']."<br>";
echo "Salary of Ani is ". $salaries['Ani']."<br>";
echo "Salary of Zara is ". $salaries['Zara']."<br>";

// cara kedua
$salaries['Budi'] = "high";
$salaries['Ani'] = "medium";
$salaries['Zara'] = "low";
echo "Salary of Budi is ". $salaries['Budi']."<br>";
echo "Salary of Ani is ". $salaries['Ani']."<br>";
echo "Salary of Zara is ". $salaries['Zara']."<br>";