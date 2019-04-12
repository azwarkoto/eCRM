<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

	//load database
	public function __construct(){
        parent::__construct();
        $this->load->model('M_Ruangan');
    }

	//index
	public function index(){
		$daftar_ruangan = $this->M_Ruangan->listing();
		$data = array(	'title' 	=> 'ADMIN',
						'daftar_ruangan'	=> $daftar_ruangan,
						'view'		=> 'ruangan/list_ruangan');
		$this->load->view('wrapper',$data);
	}

	//tambah
	public function tambah(){

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('kode_ruangan','Kode_Ruangan','required',
							array('required' => 'Kode Ruangan Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Tambah Data Ruangan',
						'view'	=> 'ruangan/tambah');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'kode_ruangan'		=> $i->post('kode_ruangan'),
								'nama_ruangan'		=> $i->post('nama_ruangan'),
							);
			$this->M_Ruangan->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Ruangan Telah di Tambah');
			redirect(base_url('ruangan'));
		}
		//end masuk
	}

	//delete
	public function delete($id_ruangan){
		$data = array('id_ruangan' => $id_ruangan);
		$this->M_Ruangan->delete($data);
		$this->session->set_flashdata('sukses', 'Data Ruangan Telah di Hapus');
			redirect(base_url('ruangan'));
	}

	//edit
	public function edit($id_ruangan){
		$kategori = $this->M_Ruangan->detail($id_ruangan);

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('kode_ruangan','Kode_Ruangan','required',
							array('required' => 'Kode Ruangan Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Edit Data Ruangan',
						'kategori' => $kategori,
						'view'	=> 'ruangan/edit');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'id_ruangan'		=> $id_ruangan,
								'kode_ruangan'		=> $i->post('kode_ruangan'),
								'nama_ruangan'		=> $i->post('nama_ruangan'),
								
							);
			$this->M_Ruangan->edit($data);
			$this->session->set_flashdata('sukses', 'Data Ruangan Telah di Edit');
			redirect(base_url('ruangan'));
		}
		//end masuk
	}

}