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
						'view'		=> 'ruangan/list_ruangan_manajer');
		$this->load->view('wrapper_manajer',$data);
	}

	//tambah
	

}