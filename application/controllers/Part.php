<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Part extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Part_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'part/part_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Part_model->json();
    }

    public function read($id) 
    {
        $row = $this->Part_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_part' => $row->id_part,
		'nama_part' => $row->nama_part,
		'jenis_part' => $row->jenis_part,
		'cycle_time' => $row->cycle_time,
		'nama_ng' => $row->nama_ng,
		'id_material' => $row->id_material,
	    );
            $this->load->view('part/part_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('part'));
        }
    }

    public function create() 
    {

        $material = $this->Part_model->allmaterial();

        $data = array(
            'button' => 'Create',
            'action' => site_url('part/create_action'),
	    'id_part' => set_value('id_part'),
	    'nama_part' => set_value('nama_part'),
	    'jenis_part' => set_value('jenis_part'),
	    'cycle_time' => set_value('cycle_time'),
	    'nama_ng' => set_value('nama_ng'),
	    'id_material' => set_value('id_material'),
        'material' => $material,
        'view'      => 'part/part_form',
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
        'id_part' => $this->input->post('id_part',TRUE),
		'nama_part' => $this->input->post('nama_part',TRUE),
		'jenis_part' => $this->input->post('jenis_part',TRUE),
		'cycle_time' => $this->input->post('cycle_time',TRUE),
		'nama_ng' => $this->input->post('nama_ng',TRUE),
		'id_material' => $this->input->post('id_material',TRUE),
	    );
print_r($data);
die();
            $this->Part_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('part'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Part_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('part/update_action'),
		'id_part' => set_value('id_part', $row->id_part),
		'nama_part' => set_value('nama_part', $row->nama_part),
		'jenis_part' => set_value('jenis_part', $row->jenis_part),
		'cycle_time' => set_value('cycle_time', $row->cycle_time),
		'nama_ng' => set_value('nama_ng', $row->nama_ng),
		'id_material' => set_value('id_material', $row->id_material),
        'view'      => 'part/part_form'
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('part'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_part', TRUE));
        } else {
            $data = array(
		'nama_part' => $this->input->post('nama_part',TRUE),
		'jenis_part' => $this->input->post('jenis_part',TRUE),
		'cycle_time' => $this->input->post('cycle_time',TRUE),
		'nama_ng' => $this->input->post('nama_ng',TRUE),
		'id_material' => $this->input->post('id_material',TRUE),
	    );

            $this->Part_model->update($this->input->post('id_part', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('part'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Part_model->get_by_id($id);

        if ($row) {
            $this->Part_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('part'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('part'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_part', 'nama part', 'trim|required');
	$this->form_validation->set_rules('jenis_part', 'jenis part', 'trim|required');
	$this->form_validation->set_rules('cycle_time', 'cycle time', 'trim|required');
	$this->form_validation->set_rules('nama_ng', 'nama ng', 'trim|required');
	$this->form_validation->set_rules('id_material', 'id material', 'trim|required');

	$this->form_validation->set_rules('id_part', 'id_part', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "part.xls";
        $judul = "part";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Part");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Part");
	xlsWriteLabel($tablehead, $kolomhead++, "Cycle Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ng");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Material");

	foreach ($this->Part_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_part);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_part);
	    xlsWriteNumber($tablebody, $kolombody++, $data->cycle_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ng);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_material);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=part.doc");

        $data = array(
            'part_data' => $this->Part_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('part/part_doc',$data);
    }

}
