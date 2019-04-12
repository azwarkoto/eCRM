<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_karyawan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    $this->load->library('session'); 
    }

    public function index()
    {
        $data = array('view'      => 'data_karyawan/data_karyawan_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_karyawan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Data_karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_karyawan' => $row->id_karyawan,
		'password' => $row->password,
		'nama_karyawan' => $row->nama_karyawan,
		'jabatan_karyawan' => $row->jabatan_karyawan,
		'shift' => $row->shift,
		'id_line' => $row->id_line,
        'view'      => 'data_karyawan/data_karyawan_read',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_karyawan/create_action'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'password' => set_value('password'),
	    'nama_karyawan' => set_value('nama_karyawan'),
	    'jabatan_karyawan' => set_value('jabatan_karyawan'),
	    'shift' => set_value('shift'),
	    'id_line' => set_value('id_line'),
        'view'      => 'data_karyawan/data_karyawan_form'
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
		'password' => $this->input->post('password',TRUE),
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'jabatan_karyawan' => $this->input->post('jabatan_karyawan',TRUE),
		'shift' => $this->input->post('shift',TRUE),
		'id_line' => $this->input->post('id_line',TRUE),
	    );

            $this->Data_karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_karyawan/update_action'),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'password' => set_value('password', $row->password),
		'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
		'jabatan_karyawan' => set_value('jabatan_karyawan', $row->jabatan_karyawan),
		'shift' => set_value('shift', $row->shift),
		'id_line' => set_value('id_line', $row->id_line),
        'view'      => 'data_karyawan/data_karyawan_form',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_karyawan', TRUE));
        } else {
            $data = array(
		'password' => $this->input->post('password',TRUE),
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'jabatan_karyawan' => $this->input->post('jabatan_karyawan',TRUE),
		'shift' => $this->input->post('shift',TRUE),
		'id_line' => $this->input->post('id_line',TRUE),
	    );

            $this->Data_karyawan_model->update($this->input->post('id_karyawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_karyawan_model->get_by_id($id);

        if ($row) {
            $this->Data_karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
	$this->form_validation->set_rules('jabatan_karyawan', 'jabatan karyawan', 'trim|required');
	$this->form_validation->set_rules('shift', 'shift', 'trim|required');
	$this->form_validation->set_rules('id_line', 'id line', 'trim|required');

	$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_karyawan.xls";
        $judul = "data_karyawan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Shift");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Line");

	foreach ($this->Data_karyawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan_karyawan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->shift);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_line);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_karyawan.doc");

        $data = array(
            'data_karyawan_data' => $this->Data_karyawan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('data_karyawan/data_karyawan_doc',$data);
    }

}