<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Material extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Material_Model');
	}

	public function index()
	{
		$data = [
			'title' => 'Material',
			'sub_title' => 'Daftar',
			'content' => 'material/index',
			'show' => $this->Material_Model->read()->result()
		];
		$this->load->view('template/my_template',$data);
	}

	public function add()
	{
		$data = [
			'title' => 'Material',
			'sub_title' => 'Tambah',
			'content' => 'material/tambah'
		];
		$this->load->view('template/my_template',$data);
	}

	public function create()
	{
		$kode = strtoupper($this->input->post('kode'));
		$nama = ucwords($this->input->post('nama'));
		$harga = $this->input->post('harga');
		$data = array('kode' => $kode, 'nama' => $nama, 'harga' => $harga);
		$insert = $this->Material_Model->create($data);
		if($insert){
			$this->session->set_flashdata('pesan', true);
			redirect('material');
		}else{
			$this->session->set_flashdata('pesan', false);
			redirect('material');
		}
	}

	public function read($id) // show detail
	{
		# code...
	}

	public function edit($id) // show edit value
	{
		$data = [
			'title' => 'Material',
			'sub_title' => 'Daftar',
			'content' => 'material/edit',
			'show' => $this->Material_Model->show($id)->row()
		];
		$this->load->view('template/my_template',$data);
	}

	public function update($id)
	{
		$id = $this->input->post('id');
		$nama = ucwords($this->input->post('nama'));
		$harga = $this->input->post('harga');
		$data = array('nama' => $nama, 'harga' => $harga);
		$update = $this->Material_Model->update($data, $id);
		if($update){
			$this->session->set_flashdata('pesan_update', true);
			redirect('material');
		}else{
			$this->session->set_flashdata('pesan_update', false);
			redirect('material');
		}
	}

	public function delete($id)
	{
		$date = date('Y-m-d H:i:s');
		$data = array('deleted_at' => $date);
		$delete = $this->Material_Model->update($data, $id);
		if($delete){
			$this->session->set_flashdata('pesan_delete', true);
			redirect('material');
		}else{
			$this->session->set_flashdata('pesan_delete', false);
			redirect('material');
		}
	}


}