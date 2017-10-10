<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('divisi_model');
	}

	public function index(){
		$data = [
			'title' => 'Divisi',
			'sub_title' => 'Daftar',
			'content' => 'divisi/index',
			'pesan' => '',
			'show' => $this->divisi_model->show()->result()
		];
		$this->load->view('template/my_template',$data);
	}

	public function detail($id)
	{
		$data = [
			'title' => 'Divisi',
			'sub_title' => 'Detail',
			'content' => 'divisi/detail',
			'show' => $this->divisi_model->detail($id)->row()
		];
		$this->load->view('template/my_template',$data);
	}

	public function add()
	{
		$data = [
			'title' => 'Divisi',
			'sub_title' => 'Tambah',
			'content' => 'divisi/tambah'
		];
		$this->load->view('template/my_template', $data);
	}

	public function save()
	{
		$kode = strtoupper($this->input->post('kode'));
		$nama = strtoupper($this->input->post('nama'));
		$data = array('kode' => $kode, 'nama' => $nama);
		$insert = $this->divisi_model->save($data);

		if($insert){
			$data = [
				'title' => 'Divisi',
				'sub_title' => 'Daftar',
				'content' => 'divisi/index',
				'show' => $this->divisi_model->show()->result()
			];
			#$this->load->view('template/my_template', $data);
			$this->session->set_flashdata('pesan', 'berhasil');
			redirect('divisi');
		}else{
			$data = [
				'title' => 'Divisi',
				'sub_title' => 'Daftar',
				'content' => 'divisi/index',
				'pesan' => 'gagal',
				'show' => $this->divisi_model->show()->result()
			];
			redirect('divisi');
			#$this->load->view('template/my_template', $data);
		}

	}



}