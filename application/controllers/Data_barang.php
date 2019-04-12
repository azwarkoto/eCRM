<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_barang_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->load->library('session');

    }

    // public function index()
    // {
    //     $this->load->library('session');
    //     $this->load->view('data_barang/data_barang_list');
    // } 
    public function index(){
        // $daftar_ruangan = $this->M_Ruangan->listing();
        $data = array('view'      => 'data_barang/data_barang_list');
        $this->load->view('wrapper',$data);
    }

    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_barang_model->json();
    }

    public function read($id) 
    {
        $row = $this->Data_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'nama_barang' => $row->nama_barang,
		'jenis_barang' => $row->jenis_barang,
		'nama_ng' => $row->nama_ng,
        'view'  => 'data_barang/data_barang_read'
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'nama_barang' => set_value('nama_barang'),
	    'jenis_barang' => set_value('jenis_barang'),
	    'nama_ng' => set_value('nama_ng'),
        'id_karyawan' => $this->session->userdata('id_karyawan'),
        'view'  => 'data_barang/data_barang_form'
	);
        $this->load->view('wrapper', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'jenis_barang' => $this->input->post('jenis_barang',TRUE),
		'nama_ng' => $this->input->post('nama_ng',TRUE),
	    );

            $this->Data_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
		'nama_ng' => set_value('nama_ng', $row->nama_ng),
          'view'  => 'data_barang/data_barang_form'
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'jenis_barang' => $this->input->post('jenis_barang',TRUE),
		'nama_ng' => $this->input->post('nama_ng',TRUE),
	    );

            $this->Data_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_barang_model->get_by_id($id);

        if ($row) {
            $this->Data_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('jenis_barang', 'jenis barang', 'trim|required');
	$this->form_validation->set_rules('nama_ng', 'nama ng', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_barang.xls";
        $judul = "data_barang";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ng");

	foreach ($this->Data_barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ng);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_barang.doc");

        $data = array(
            'data_barang_data' => $this->Data_barang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('data_barang/data_barang_doc',$data);
    }
    public function report()
    {
        $this->load->library('pdf');
        $this->load->model('Data_barang_model');
        $data['Data_barang']=$this->Data_barang_model->listing();
        $this->load->view('fasilitas_ruangan/makepdf', $data);

    }

}