<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Divisi_Model extends CI_Model
{
	
	public function show()
	{
		return $this->db->get('divisi');
	}

	public function detail($id)
	{
		$this->db->from('divisi');
		$this->db->where('divisiid',$id);
		return $this->db->get();
	}

	public function save($data){
		$this->db->insert('divisi', $data);
		return true;
	}
}