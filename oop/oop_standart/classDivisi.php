<?php 

require 'DBConnection.php';

/**
* inheritance kepada DBConnection
*/
class Divisi extends DBConnection
{
	
	var $divisiid;
	var $kode;
	var $nama;

	function __construct($divisiid = 0, $kode = '', $nama = '')
	{
		parent::__construct();
		$this->divisiid = $divisiid;
		$this->kode = $kode;
		$this->nama = $nama;
	}

	public function save($value='')
	{
		
	}

	public function FunctionName($value='')
	{
		# code...
	}
}