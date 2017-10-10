<?php 

/**
* untuk koneksi ke database
*/
class DBConnection
{
	var $host;
	var $user;
	var $password;
	var $dbname;
	var $port;
	var $con;
	var $result;

	public function __construct($host = DBHOST, $user = DBUSER, $password = DBPASS, $dbname = DBNAME, $port='3306')
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->dbname = $dbname;
		$this->port = $port;
	}

	public function connect()
	{
		$this->con = mysqli_connect($this->host, $this->user, $this->password, $this->dbname, $this->port) or die (mysqli_connect_error());
	}

}