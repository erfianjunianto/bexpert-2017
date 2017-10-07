<?php 

if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$telpon = $_POST['telpon'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$gender = !empty($_POST['jnskelamin'])?$_POST['jnskelamin']:"L";
	$program = !empty($_POST['program'])?$_POST['program']:array();
	$pengalaman = $_POST['pengalaman'];

	if(empty($nama)){
		echo "Nama harus diisi <br>";
		echo "<a href='form.html'>back</a>";
	}else
	if(empty($telpon)){
		echo "Telepon harus diisi <br>";
		echo "<a href='form.html'>back</a>";
	}else
	if(empty($email)){
		echo "Email harus diisi <br>";
		echo "<a href='form.html'>back</a>";
	}else
	if(empty($alamat)){
		echo "Alamat harus diisi <br>";
		echo "<a href='form.html'>back</a>";
	}else
	if(empty($gender)){
		echo "Gender harus diisi <br>";
		echo "<a href='form.html'>back</a>";
	}else
	if(empty($program)){
		echo "Program harus diisi <br>";
		echo "<a href='form.html'>back</a>";
	}else{
		$strprogram = "";
		foreach ($program as $idx => $value) {
			$strprogram .= "$value ";
		}

		echo "Data Form: <br>";

		echo " nama  = ". $nama."<br>";
		echo " telpon  = ". $telpon."<br>";
		echo " email  = ". $email."<br>";
		echo " alamat  = ". $alamat."<br>";
		echo " gender  = ". $gender."<br>";
		echo " program  = ". $strprogram."<br>";
		echo " pengalaman  = ". $pengalaman."<br>";

		if(isset($_FILES['foto'])){
			$errors = array();
			$file_name = $_FILES['foto']['name'];
			$file_size = $_FILES['foto']['size'];
			$file_tmp  = $_FILES['foto']['tmp_name'];
			$file_type = $_FILES['foto']['type'];
			$file_ext  = strtolower(end(explode('.', $file_name)));
			$expressions= array("jpeg", "jpg", "png");

			if(in_array($file_ext, $expressions) === false){
				$errors[] = "Please choose an image note another file.";
			}

			if($file_size > 2097152){
				$errors[] = "Max file size 2 MB.";	
			}

			if(empty($errors) == true){
				move_uploaded_file($file_tmp, "images/".$file_name);
				echo "<img src='images/$file_name' widht='100' height='100'>";
			}else{
				print_r($errors);
			}

		}
	}

}