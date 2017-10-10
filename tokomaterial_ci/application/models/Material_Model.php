<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Material_Model extends CI_Model
{
	
	public function create($data)
	{
		if($this->db->insert('material', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function read()
	{	
		$this->db->where('deleted_at is null', null);
		return $this->db->get('material');
	}

	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where('idmaterial', $id);
		if($this->db->update('material')){
			return true;
		}else{
			return false;
		}
	}

	public function delete($data, $id)
	{
		$this->db->set($data);
		$this->db->where('idmaterial', $id);
		if($this->db->update('material')){
			return true;
		}else{
			return false;
		}	
	}

	public function show($id)
	{
		$this->db->from('material');
		$this->db->where('idmaterial',$id);
		return $this->db->get();
	}
}