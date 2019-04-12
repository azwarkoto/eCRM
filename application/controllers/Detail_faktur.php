<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_faktur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_faktur_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'detail_faktur/detail_faktur_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Detail_faktur_model->json();
    }

    public function read($id) 
    {
        $row = $this->Detail_faktur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detailfaktur' => $row->id_detailfaktur,
		'id_faktur' => $row->id_faktur,
		'no_mo' => $row->no_mo,
		'qty' => $row->qty,
        'view'      => 'detail_faktur/detail_faktur_read',
	    );
            $this->load->view('detail_faktur/detail_faktur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_faktur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_faktur/create_action'),
	    'id_detailfaktur' => set_value('id_detailfaktur'),
	    'id_faktur' => set_value('id_faktur'),
	    'no_mo' => set_value('no_mo'),
	    'qty' => set_value('qty'),
        'view'      => 'detail_faktur/detail_faktur_form',
	);
        $this->load->view('detail_faktur/detail_faktur_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_faktur' => $this->input->post('id_faktur',TRUE),
		'no_mo' => $this->input->post('no_mo',TRUE),
		'qty' => $this->input->post('qty',TRUE),
	    );

            $this->Detail_faktur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_faktur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_faktur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_faktur/update_action'),
		'id_detailfaktur' => set_value('id_detailfaktur', $row->id_detailfaktur),
		'id_faktur' => set_value('id_faktur', $row->id_faktur),
		'no_mo' => set_value('no_mo', $row->no_mo),
		'qty' => set_value('qty', $row->qty),
         'view'      => 'detail_faktur/detail_faktur_form',

	    );
            $this->load->view('detail_faktur/detail_faktur_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_faktur'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detailfaktur', TRUE));
        } else {
            $data = array(
		'id_faktur' => $this->input->post('id_faktur',TRUE),
		'no_mo' => $this->input->post('no_mo',TRUE),
		'qty' => $this->input->post('qty',TRUE),
	    );

            $this->Detail_faktur_model->update($this->input->post('id_detailfaktur', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_faktur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_faktur_model->get_by_id($id);

        if ($row) {
            $this->Detail_faktur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_faktur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_faktur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_faktur', 'id faktur', 'trim|required');
	$this->form_validation->set_rules('no_mo', 'no mo', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');

	$this->form_validation->set_rules('id_detailfaktur', 'id_detailfaktur', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_faktur.xls";
        $judul = "detail_faktur";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Faktur");
	xlsWriteLabel($tablehead, $kolomhead++, "No Mo");
	xlsWriteLabel($tablehead, $kolomhead++, "Qty");

	foreach ($this->Detail_faktur_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_faktur);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_mo);
	    xlsWriteNumber($tablebody, $kolombody++, $data->qty);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detail_faktur.doc");

        $data = array(
            'detail_faktur_data' => $this->Detail_faktur_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detail_faktur/detail_faktur_doc',$data);
    }

}