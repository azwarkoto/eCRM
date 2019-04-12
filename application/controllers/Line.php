<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Line extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Line_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'line/line_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Line_model->json();
    }

    public function read($id) 
    {
        $row = $this->Line_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_line' => $row->id_line,
		'nama_line' => $row->nama_line,
		'time' => $row->time,
		'stopline' => $row->stopline,
		'id_part' => $row->id_part,
        'view'      => 'line/line_read'
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('line'));
        }
    }

    public function create() 
    {

        $part = $this->Line_model->allpart();

        $data = array(
            'button' => 'Create',
            'action' => site_url('line/create_action'),
	    'id_line' => set_value('id_line'),
	    'nama_line' => set_value('nama_line'),
	    'time' => set_value('time'),
	    'stopline' => set_value('stopline'),
	    'id_part' => set_value('id_part'),
        'part'  => $part,
        'view'      => 'line/line_form',
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
		'nama_line' => $this->input->post('nama_line',TRUE),
		'time' => $this->input->post('time',TRUE),
		'stopline' => $this->input->post('stopline',TRUE),
		'id_part' => $this->input->post('id_part',TRUE),
	    );

            $this->Line_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('line'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Line_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('line/update_action'),
		'id_line' => set_value('id_line', $row->id_line),
		'nama_line' => set_value('nama_line', $row->nama_line),
		'time' => set_value('time', $row->time),
		'stopline' => set_value('stopline', $row->stopline),
		'id_part' => set_value('id_part', $row->id_part),
        'view'      => 'line/line_form',

	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('line'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_line', TRUE));
        } else {
            $data = array(
		'nama_line' => $this->input->post('nama_line',TRUE),
		'time' => $this->input->post('time',TRUE),
		'stopline' => $this->input->post('stopline',TRUE),
		'id_part' => $this->input->post('id_part',TRUE),
	    );

            $this->Line_model->update($this->input->post('id_line', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('line'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Line_model->get_by_id($id);

        if ($row) {
            $this->Line_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('line'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('line'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_line', 'nama line', 'trim|required');
	$this->form_validation->set_rules('time', 'time', 'trim|required');
	$this->form_validation->set_rules('stopline', 'stopline', 'trim|required');
	$this->form_validation->set_rules('id_part', 'id part', 'trim|required');

	$this->form_validation->set_rules('id_line', 'id_line', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "line.xls";
        $judul = "line";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Line");
	xlsWriteLabel($tablehead, $kolomhead++, "Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Stopline");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Part");

	foreach ($this->Line_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_line);
	    xlsWriteLabel($tablebody, $kolombody++, $data->time);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stopline);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_part);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=line.doc");

        $data = array(
            'line_data' => $this->Line_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('line/line_doc',$data);
    }

}