<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Persediaan_Model extends CI_Model
{
	
	public function create($data)
	{
		if($this->db->insert('persediaan', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function read()
	{	
		$this->db->select('*');
		$this->db->from('material');
		$this->db->join('persediaan', 'material.idmaterial = persediaan.idmaterial');
		$this->db->order_by('persediaan.idpersediaan');
		return $this->db->get();
	}

	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where('idpersediaan', $id);
		if($this->db->update('persediaan')){
			return true;
		}else{
			return false;
		}
	}

	public function delete($data, $id)
	{
		$this->db->set($data);
		$this->db->where('idpersediaan', $id);
		if($this->db->update('persediaan')){
			return true;
		}else{
			return false;
		}	
	}

	public function show($id)
	{
		$this->db->from('persediaan');
		$this->db->where('idpersediaan',$id);
		return $this->db->get();
	}
}