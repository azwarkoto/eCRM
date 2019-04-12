<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	//load database
	public function __construct(){
        parent::__construct();
        $this->load->model('M_Barang');
    }

	//index
	public function index(){
		$daftar_barang = $this->M_Barang->listing();
		$data = array(	'title' 	=> 'ADMIN',
						'daftar_barang'	=> $daftar_barang,
						'view'		=> 'barang/list_barang');
		$this->load->view('wrapper',$data);
	}

	//tambah
	public function tambah(){

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('kode_barang','Kode_Barang','required',
							array('required' => 'Kode Barang Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Tambah Data Barang',
						'view'	=> 'barang/tambah');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'kode_barang'		=> $i->post('kode_barang'),
								'nama_barang'		=> $i->post('nama_barang'),
							);
			$this->M_Barang->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Barang Telah di Tambah');
			redirect(base_url('barang'));
		}
		//end masuk
	}

	//delete
	public function delete($id_barang){
		$data = array('id_barang' => $id_barang);
		$this->M_Barang->delete($data);
		$this->session->set_flashdata('sukses', 'Data Barang Telah di Hapus');
			redirect(base_url('barang'));
	}

	//edit
	public function edit($id_barang){
		$kategori = $this->M_Barang->detail($id_barang);

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('kode_barang','Kode_Barang','required',
							array('required' => 'Kode Barang Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Edit Data Barang',
						'kategori' => $kategori,
						'view'	=> 'barang/edit');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'id_barang'		=> $id_barang,
								'kode_barang'		=> $i->post('kode_barang'),
								'nama_barang'		=> $i->post('nama_barang'),

							);
			$this->M_Barang->edit($data);
			$this->session->set_flashdata('sukses', 'Data Barang Telah di Edit');
			redirect(base_url('barang'));
		}
		//end masuk
	}

}
