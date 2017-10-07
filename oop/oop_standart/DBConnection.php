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

	public function __construct($host = 'localhost', $user = 'root', $password = 'password', $dbname = 'db_karyawan', $port='3306')
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

	public function execute_query($query)
	{
		$this->result = mysqli_query($this->con, $query) or die (mysqli_error($this->con));
		return $this->result;
	}

	public function show_result()
	{
		while ($row = mysqli_fetch_assoc($this->result)) {
			foreach ($row as $field => $value) {
				echo $field . " : ". $value . "<br>";
			}
			echo "<hr>";
		}
	}
}