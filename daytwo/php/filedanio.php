<?php 

$file = "file.txt";
$open = fopen($file, 'w') or die ('Cannot open file: '.$file); // mode write

// write file
$data = 'file data';
fwrite($open, $data);

// append
$append = fopen($file, 'a'); // append
$new_data = "\n".'data di baris ke dua';
fwrite($append, $new_data);

//read
$read = fopen($file, 'r'); // read
$data = fread($read, filesize($file));
echo $data;

//close
fclose($read);