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

// cara akses array multidimensi

echo "Marks for Budi in physics : ".$nilai['Budi']['physics']."<br>";
echo "Marks for Budi in maths : ".$nilai['Budi']['maths']."<br>";
echo "Marks for Budi in chemistry : ".$nilai['Budi']['chemistry']."<br>";
echo "Marks for Ani in physics : ".$nilai['Ani']['physics']."<br>";
echo "Marks for Ani in maths : ".$nilai['Ani']['maths']."<br>";
echo "Marks for Ani in chemistry : ".$nilai['Ani']['chemistry']."<br>";
echo "Marks for Zara in physics : ".$nilai['Zara']['physics']."<br>";
echo "Marks for Zara in maths : ".$nilai['Zara']['maths']."<br>";
echo "Marks for Zara in chemistry : ".$nilai['Zara']['chemistry']."<br>";