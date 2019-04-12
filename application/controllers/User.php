<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//load database
	public function __construct(){
        parent::__construct();
        $this->load->model('M_User');
    }

	//index
	public function index(){
		$daftar_user = $this->M_User->listing();
		$data = array(	'title' 	=> 'ADMIN',
						'daftar_user'	=> $daftar_user,
						'view'		=> 'user/list_user');
		$this->load->view('wrapper',$data);
	}

	//tambah
	public function tambah(){

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required',
							array('required' => 'Username Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Tambah Data User',
						'view'	=> 'user/tambah');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'username'		=> $i->post('username'),
								'password'		=> md5($i->post('password')),
								'level'			=> $i->post('level'),
							);
			$this->M_User->tambah($data);
			$this->session->set_flashdata('sukses', 'Data User Telah di Tambah');
			redirect(base_url('user'));
		}
		//end masuk
	}

	//delete
	public function delete($id_user){
		$data = array('id_user' => $id_user);
		$this->M_User->delete($data);
		$this->session->set_flashdata('sukses', 'Data User Telah di Hapus');
			redirect(base_url('user'));
	}

	//edit
	public function edit($id_user){
		$kategori = $this->M_User->detail($id_user);

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required',
							array('required' => 'Username Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Edit Data User',
						'kategori' => $kategori,
						'view'	=> 'user/edit');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'id_user'		=> $id_user,
								'username'		=> $i->post('username'),
								'password'		=> md5($i->post('password')),
								'level'			=> $i->post('level'),

							);
			$this->M_User->edit($data);
			$this->session->set_flashdata('sukses', 'Data User Telah di Edit');
			redirect(base_url('user'));
		}
		//end masuk
	}

}
