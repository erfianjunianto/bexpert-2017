<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Persediaan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Persediaan_Model');
	}

	public function index()
	{
		$data = [
			'title' => 'Persediaan',
			'sub_title' => 'Daftar',
			'content' => 'persediaan/index',
			'show' => $this->Persediaan_Model->read()->result()
		];
		$this->load->view('template/my_template',$data);
	}

	public function add()
	{
		$this->load->model('Material_Model');
		$data = [
			'title' => 'Persediaan',
			'sub_title' => 'Tambah',
			'content' => 'persediaan/tambah',
			'show' => $this->Material_Model->read()->result()
		];
		$this->load->view('template/my_template',$data);
	}

	public function create()
	{
		$date = date('Y-m-d', time());
		$idmaterial = $this->input->post('idmaterial');
		$jumlah = $this->input->post('jumlah_persediaan');
		$data = array('idmaterial' => $idmaterial, 'jumlah_persediaan' => $jumlah, 'tanggal' => $date);
		$insert = $this->Persediaan_Model->create($data);
		if($insert){
			$this->session->set_flashdata('pesan', true);
			redirect('persediaan');
		}else{
			$this->session->set_flashdata('pesan', false);
			redirect('persediaan');
		}
	}

	public function read($id) // show detail
	{
		# code...
	}

	public function edit($id) // show edit value
	{
		$this->load->model('Material_Model');
	
		$data = [
			'title' => 'Persediaan',
			'sub_title' => 'Daftar',
			'content' => 'persediaan/edit',
			'show' => $this->Material_Model->read()->result(),
			'show_persediaan' => $this->Persediaan_Model->show($id)->row()
		];
		$this->load->view('template/my_template',$data);
	}

	public function update($id)
	{
		$id = $this->input->post('id');
		$jumlah = $this->input->post('jumlah_persediaan');
		$data = array('jumlah_persediaan' => $jumlah);
		$update = $this->Persediaan_Model->update($data, $id);
		if($update){
			$this->session->set_flashdata('pesan_update', true);
			redirect('persediaan');
		}else{
			$this->session->set_flashdata('pesan_update', false);
			redirect('persediaan');
		}
	}

	public function delete($id)
	{
		$date = date('Y-m-d H:i:s');
		$data = array('deleted_at' => $date);
		$delete = $this->Persediaan_Model->update($data, $id);
		if($delete){
			$this->session->set_flashdata('pesan_delete', true);
			redirect('persediaan');
		}else{
			$this->session->set_flashdata('pesan_delete', false);
			redirect('persediaan');
		}
	}
}