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
						'view'		=> 'barang/list_barang_manajer');
		$this->load->view('wrapper_manajer',$data);
	}

	
}
