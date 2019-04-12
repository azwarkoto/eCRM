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
						'view'		=> 'perawatan/list_perawatan');
		$this->load->view('wrapper',$data);
	}

	
	public function tambah(){

		$this->load->library('upload');
		$perawatan = $this->M_Perawatan->read();
		$perawatanaset = $this->M_Perawatan->read_aset();

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('ruangan','Nama_Ruangan','required',
							array('required' => 'Nama Ruangan Harus Diisi!'));

		$nm_file = "foto_".time(); //nama file + fungsi time
        $config['upload_path'] = './upload/img/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3672';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);


		if($valid->run()===FALSE){

		//end validasi

		$data = array(	'title' => 'Tambah Data',
						'perawatan' => $perawatan,
						'perawatanaset' => $perawatanaset,
						'ruangan' => $this->M_Perawatan->get_ruangan(),
						'barang' => $this->M_Perawatan->get_barang(),
						'identifikasi' => $this->M_Perawatan->get_identifikasi(),
						'ruangan_selected' => '',
						'barang_selected' => '',
						'identifikasi_selected' => '',
						'view'	=> 'perawatan/tambah');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{
		if(isset($_FILES['foto']['name'])){
            if ($this->upload->do_upload('foto')) {
                    $data_upload = $this->upload->data();
			$i = $this->input;

			 // $this->image_lib->resize();
			$data = array 	('id_ruangan'		=> $i->post('ruangan'),
								'id_barang'		=> $i->post('barang'),
								'no_identifikasi'		=> $i->post('no_identifikasi'),
								'keterangan'		=> $i->post('keterangan'),
								'tgl_diperbaiki'		=> $i->post('tgl_diperbaiki'),
								'tgl_selesai'		=> $i->post('tgl_selesai'),
								'foto' => $data_upload['file_name'],
							);

			}else{
                    $data = array('id_ruangan'		=> $i->post('ruangan'),
								'id_barang'		=> $i->post('barang'),
								'no_identifikasi'		=> $i->post('no_identifikasi'),
								'keterangan'		=> $i->post('keterangan'),
								'tgl_diperbaiki'		=> $i->post('tgl_diperbaiki'),
								'tgl_selesai'		=> $i->post('tgl_selesai'),
							);
                }


			$this->M_Perawatan->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Perawatan Telah di Tambah');
			redirect(base_url('C_Perawatan'));
			
				}
		}
	}


	//delete
	public function delete($id_perawatan){
		$data = array('id_perawatan' => $id_perawatan);
		$this->M_Perawatan->delete($data);
		$this->session->set_flashdata('sukses', 'Data Perawatan Telah di Hapus');
			redirect(base_url('C_Perawatan'));
	}

	//edit
	public function edit($id_perawatan){
		
		$this->load->library('upload');

		$kategori = $this->M_Perawatan->detail($id_perawatan);
		$reada = $this->M_Perawatan->read();
		$readb = $this->M_Perawatan->read_aset();
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_ruangan','Nama_Ruangan','required',
							array('required' => 'Perawatan Harus Diisi!'));
		$nm_file = "foto_".time(); //nama file + fungsi time
        $config['upload_path'] = './upload/img/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3672';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);

		if($valid->run()===FALSE){
		//end validasi

		$data = array(	'title' => 'Edit Data Perawatan',
						'kategori' => $kategori,
						'reada' => $reada,
						'readb' => $readb,
						'ruangan' => $this->M_Perawatan->get_ruangan(),
						'barang' => $this->M_Perawatan->get_barang(),
						'identifikasi' => $this->M_Perawatan->get_identifikasi(),
						'ruangan_selected' => '',
						'barang_selected' => '',
						'identifikasi_selected' => '',
						'view'	=> 'perawatan/edit');
		$this->load->view('wrapper',$data);

		//masuk database
		}else{

			if(isset($_FILES['foto']['name'])){
            if ($this->upload->do_upload('foto')) {
                    $data_upload = $this->upload->data();

			$i = $this->input;
			$data = array 	(	'id_perawatan'		=> $id_perawatan,
								'id_ruangan'		=> $i->post('nama_ruangan'),
								'id_barang'		=> $i->post('nama_aset'),
								'no_identifikasi'		=> $i->post('no_identifikasi'),
								'keterangan'		=> $i->post('keterangan'),
								'tgl_diperbaiki'		=> $i->post('tgl_diperbaiki'),
								'tgl_selesai'		=> $i->post('tgl_selesai'),
								'foto' => $data_upload['file_name'],

							);
				}else{
			$i = $this->input;
			$data = array 	(	'id_perawatan'		=> $id_perawatan,
								'id_ruangan'		=> $i->post('nama_ruangan'),
								'id_barang'		=> $i->post('nama_aset'),
								'no_identifikasi'		=> $i->post('no_identifikasi'),
								'keterangan'		=> $i->post('keterangan'),
								'tgl_diperbaiki'		=> $i->post('tgl_diperbaiki'),
								'tgl_selesai'		=> $i->post('tgl_selesai'),

							);

			}
			$this->M_Perawatan->edit($data);
			$this->session->set_flashdata('sukses', 'Data Perawatan Telah di Edit');
			redirect(base_url('C_Perawatan'));
		}
	}
		//end masuk
	}

	public function chain()
    {
        $data = array(
            'read' => $this->M_Perawatan->read(),
            'read_aset' => $this->M_Perawatan->read_aset(),
            'read_selected' => '',
            'readaset_selected' => '',
        );
        $this->load->view('chain', $data);
    }

}
