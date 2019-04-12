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
						'view'		=> 'fasilitas_ruangan/list_fasilitas_ruangan');
		$this->load->view('wrapper',$data);
	}

	//tambah
	public function tambah(){

		$ruangan = $this->M_Fasilitas_Ruangan->read();
		$barang = $this->M_Fasilitas_Ruangan->readbarang();

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('ruangan','Ruangan','required',
							array('required' => 'Ruangan Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Tambah Data',
						'ruangan' => $ruangan,
						'barang' => $barang,
						'view'	=> 'fasilitas_ruangan/tambah');

		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'id_ruangan'	=> $i->post('ruangan'),
								// 'kode_aset'		=> $i->post('kode_aset'),
								'id_barang'		=> $i->post('nama_aset'),
								'jumlah'		=> $i->post('jumlah'),
								'tgl_masuk'		=> $i->post('tgl_masuk'),
							);
			$this->M_Fasilitas_Ruangan->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Fasilitas Ruangan Telah di Tambah');
			redirect(base_url('fasilitas_ruangan'));
		}
		//end masuk
	}
	public function report()
	{
		$this->load->library('pdf');
		$this->load->model('M_Fasilitas_Ruangan');
		$data['Fasilitas_Ruangan']=$this->M_Fasilitas_Ruangan->listing();
		$this->load->view('fasilitas_ruangan/makepdf', $data);

	}

	//delete
	public function delete($id){
		$this->M_Fasilitas_Ruangan->delete($id);
        redirect('fasilitas_ruangan');

	}

	//edit
	public function edit($id_fasilitas_ruangan){
		$kategori = $this->M_Fasilitas_Ruangan->detail($id_fasilitas_ruangan);
		$ruangankat = $this->M_Fasilitas_Ruangan->read();
		$barang = $this->M_Fasilitas_Ruangan->readbarang();
		$year = $this->M_Fasilitas_Ruangan->years_lengkap($id_fasilitas_ruangan);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('ruangan','Ruangan','required',
							array('required' => 'Ruangan Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Edit Data Fasilitas Ruangan',
						'kategori' => $kategori,
						'ruangankat' => $ruangankat,
						'barang'	=> $barang,
						'year'		=> $year,
						'view'	=> 'fasilitas_ruangan/edit');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array 	(	'id_fasilitas_ruangan'		=> $id_fasilitas_ruangan,
								'id_ruangan'		=> $i->post('ruangan'),
								'id_barang'		=> $i->post('nama_aset'),
								'jumlah'		=> $i->post('jumlah_data'),
								'tgl_masuk'		=> $i->post('tgl_masuk'),
								// 'no_identifikasi'		=> $i->post('no_identifikasi'),

							);

			$this->M_Fasilitas_Ruangan->edit($data);
			$this->session->set_flashdata('sukses', 'Data Fasilitas Ruangan Telah di Edit');
			redirect(base_url('fasilitas_ruangan'));
		}
		//end masuk
	}

	public function edits($id_fasilitas_ruangan){
		$kategori = $this->M_Fasilitas_Ruangan->detail($id_fasilitas_ruangan);
		$ruangankat = $this->M_Fasilitas_Ruangan->read();
		$barang = $this->M_Fasilitas_Ruangan->readbarang();
		$year = $this->M_Fasilitas_Ruangan->years_lengkap($id_fasilitas_ruangan);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('ruangan','Ruangan','required',
							array('required' => 'Ruangan Harus Diisi!'));
		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' 		=> 'Edit Data Fasilitas Ruangan',
						'kategori' 		=> $kategori,
						'ruangankat' 	=> $ruangankat,
						'barang'		=> $barang,
						'year'			=> $year,
						'view'			=> 'fasilitas_ruangan/edit');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
			$i = $this->input;
			$data = array(
            'id_fasilitas_ruangan'		=> $id_fasilitas_ruangan,
			'id_ruangan'				=> $i->post('ruangan'),
			'id_barang'					=> $i->post('nama_aset'),
			'jumlah'					=> $i->post('jumlah_data'),
			'tgl_masuk'					=> $i->post('tgl_masuk'),
        );
        	$this->M_Fasilitas_Ruangan->edit($data);
			$this->session->set_flashdata('sukses', 'Data Fasilitas Ruangan Telah di Edit');
			redirect(base_url('fasilitas_ruangan'));
		}
	}


	//detail
	public function detail($id_ruangan, $id_barang){
		$kategoriku = $this->M_Fasilitas_Ruangan->detaillengkap($id_ruangan, $id_barang);
		$abc = $this->M_Fasilitas_Ruangan->year($id_ruangan, $id_barang);
		// $ruangan = $this->M_Fasilitas_Ruangan->read();
		$data = array(	'title' 	=> 'ADMIN',
						'kategoriku'	=> $kategoriku,
						'abc'		=> $abc,
						// 'ruangan'	=> $ruangan,
						'view'		=> 'fasilitas_ruangan/detail');
		$this->load->view('wrapper',$data);


	}

	public function details($id_ruangan, $id_barang){
		$data = array(
			'title' => 'ADMIN',
			'datalist' => $this->M_Fasilitas_Ruangan->details($id_ruangan, $id_barang),
			'view' => 'fasilitas_ruangan/details'
		);
		$this->load->view('wrapper', $data);
	}

	public function details_lengkap($id){
		$data = array(
			'title' => 'ADMIN',
			'list' => $this->M_Fasilitas_Ruangan->details_lengkap($id),
			'noden' => $this->M_Fasilitas_Ruangan->years_lengkap($id),
			'view' => 'fasilitas_ruangan/details_lengkap'
		);
		$this->load->view('wrapper', $data);
	}

	public function detail_lengkap($id_fasilitas_ruangan){
		$kategoriku = $this->M_Fasilitas_Ruangan->detail_lengkap($id);
		$abc = $this->M_Fasilitas_Ruangan->years_lengkap($id_fasilitas_ruangan);
		// $ruangan = $this->M_Fasilitas_Ruangan->read();
		$data = array(	'title' 	=> 'ADMIN',
						'kategoriku'	=> $kategoriku,
						'abc'		=> $abc,
						// 'ruangan'	=> $ruangan,
						'view'		=> 'fasilitas_ruangan/detail_lengkap');
		$this->load->view('wrapper',$data);


	}
}
