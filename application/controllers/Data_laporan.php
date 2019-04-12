<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_laporan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
         $data = array('view'      => 'data_laporan/data_laporan_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_laporan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Data_laporan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_laporan' => $row->id_laporan,
		'id_karyawan' => $row->id_karyawan,
		'id_part' => $row->id_part,
		'tanggal' => $row->tanggal,
		'total' => $row->total,
		'no_mo' => $row->no_mo,
	    );
            $this->load->view('data_laporan/data_laporan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_laporan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_laporan/create_action'),
	    'id_laporan' => set_value('id_laporan'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'id_part' => set_value('id_part'),
	    'tanggal' => set_value('tanggal'),
	    'total' => set_value('total'),
	    'no_mo' => set_value('no_mo'),
        'view'      => 'data_laporan/data_laporan_form'
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
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'id_part' => $this->input->post('id_part',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'total' => $this->input->post('total',TRUE),
		'no_mo' => $this->input->post('no_mo',TRUE),
	    );

            $this->Data_laporan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_laporan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_laporan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_laporan/update_action'),
		'id_laporan' => set_value('id_laporan', $row->id_laporan),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'id_part' => set_value('id_part', $row->id_part),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'total' => set_value('total', $row->total),
		'no_mo' => set_value('no_mo', $row->no_mo),
        'view'      => 'data_laporan/data_laporan_form',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_laporan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_laporan', TRUE));
        } else {
            $data = array(
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'id_part' => $this->input->post('id_part',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'total' => $this->input->post('total',TRUE),
		'no_mo' => $this->input->post('no_mo',TRUE),
	    );

            $this->Data_laporan_model->update($this->input->post('id_laporan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_laporan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_laporan_model->get_by_id($id);

        if ($row) {
            $this->Data_laporan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_laporan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_laporan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
	$this->form_validation->set_rules('id_part', 'id part', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('no_mo', 'no mo', 'trim|required');

	$this->form_validation->set_rules('id_laporan', 'id_laporan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_laporan.xls";
        $judul = "data_laporan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Part");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");
	xlsWriteLabel($tablehead, $kolomhead++, "No Mo");

	foreach ($this->Data_laporan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_part);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_mo);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_laporan.doc");

        $data = array(
            'data_laporan_data' => $this->Data_laporan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('data_laporan/data_laporan_doc',$data);
    }

}