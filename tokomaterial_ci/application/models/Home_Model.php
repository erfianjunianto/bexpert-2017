<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Home_Model extends CI_Model
{

	public function read()
	{	
		$this->db->where('deleted_at is null', null);
		return $this->db->get('material');
	}
}
	