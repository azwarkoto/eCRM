	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_Ruangan extends CI_Controller {

	//load database
	public function __construct(){
        parent::__construct();
        $this->load->model('M_Fasilitas_Ruangan');
    }

	//index
	public function index(){
		$fasilitas_ruangan = $this->M_Fasilitas_Ruangan->listing();
		// $ruangan = $this->M_Fasilitas_Ruangan->read();
		$data = array(	'title' 	=> 'ADMIN',
						'fasilitas_ruangan'	=> $fasilitas_ruangan,
						// 'ruangan'	=> $ruangan,
						'view'		=> 'fasilitas_ruangan/list_fasilitas_ruangan_manajer');
		$this->load->view('wrapper_manajer',$data);
	}

	
}
