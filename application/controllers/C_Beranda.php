<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Beranda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->load->model('Data_barang_model');
        $this->load->model('Data_customer_model');
        $this->load->model('Data_karyawan_model');
       $this->load->model('Faktur_penjualan_model');
	}
	 public function index(){
	 	$data = array(	'title' 	=> 'ADMIN',
	 					'jumlahbarang'	=> $this->Data_barang_model->count(),
	 					'jumlahcustomer'	=> $this->Data_customer_model->count(),
	 					'jumlahkaryawan'	=> $this->Data_karyawan_model->count(),
	 					'jumlahfaktur'	=> $this->Faktur_penjualan_model->count(),
	 					'view'		=> 'beranda/list_beranda');
	 	
	 	$this->load->view('wrapper',$data);
	 }
 }
