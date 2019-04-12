<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komponen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Komponen_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'komponen/komponen_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Komponen_model->json();
    }

    public function read($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_komponen' => $row->id_komponen,
		'nama_komponen' => $row->nama_komponen,
		'nama_ng' => $row->nama_ng,
        'view'      => 'komponen/komponen_read',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('komponen/create_action'),
	    'id_komponen' => set_value('id_komponen'),
	    'nama_komponen' => set_value('nama_komponen'),
	    'nama_ng' => set_value('nama_ng'),
        'view'      => 'komponen/komponen_form',
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
		'nama_komponen' => $this->input->post('nama_komponen',TRUE),
		'nama_ng' => $this->input->post('nama_ng',TRUE),
	    );

            $this->Komponen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('komponen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('komponen/update_action'),
		'id_komponen' => set_value('id_komponen', $row->id_komponen),
		'nama_komponen' => set_value('nama_komponen', $row->nama_komponen),
		'nama_ng' => set_value('nama_ng', $row->nama_ng),
        'view'      => 'komponen/komponen_form',

	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_komponen', TRUE));
        } else {
            $data = array(
		'nama_komponen' => $this->input->post('nama_komponen',TRUE),
		'nama_ng' => $this->input->post('nama_ng',TRUE),
	    );

            $this->Komponen_model->update($this->input->post('id_komponen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('komponen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);

        if ($row) {
            $this->Komponen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('komponen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_komponen', 'nama komponen', 'trim|required');
	$this->form_validation->set_rules('nama_ng', 'nama ng', 'trim|required');

	$this->form_validation->set_rules('id_komponen', 'id_komponen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "komponen.xls";
        $judul = "komponen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ng");

	foreach ($this->Komponen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_komponen);
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
        header("Content-Disposition: attachment;Filename=komponen.doc");

        $data = array(
            'komponen_data' => $this->Komponen_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('komponen/komponen_doc',$data);
    }

}