<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Perawatan extends CI_Controller {

	//load database
	public function __construct(){
        parent::__construct();
        $this->load->model('M_Perawatan');
    }

	//index
	public function index(){
		$perawatans = $this->M_Perawatan->listing();
		$data = array(	'title' 	=> 'ADMIN',
						'perawatans'	=> $perawatans,
						'view'		=> 'perawatan/list_perawatan_manajer');
		$this->load->view('wrapper_manajer',$data);
	}

}
