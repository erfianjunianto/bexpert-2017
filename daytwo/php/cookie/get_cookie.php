<?php
echo $_COOKIE['nama']."<br>";
if(isset($_COOKIE['data'])){
	echo $_COOKIE['data'];
}

//unset cookie
setcookie("nama", "Erfian Junianto", time()-60, "/","",0);
setcookie("data", "123456677", time()-60);