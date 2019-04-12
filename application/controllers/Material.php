<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Material extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Material_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $data = array('view'      => 'material/material_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Material_model->json();
    }

    public function read($id) 
    {
        $row = $this->Material_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_material' => $row->id_material,
		'nama_material' => $row->nama_material,
		'satuan_material' => $row->satuan_material,
		'stock_material' => $row->stock_material,
        'view'      => 'material/material_read',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('material'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('material/create_action'),
	    'id_material' => set_value('id_material'),
	    'nama_material' => set_value('nama_material'),
	    'satuan_material' => set_value('satuan_material'),
	    'stock_material' => set_value('stock_material'),
         'view'      => 'material/material_form',
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
		'nama_material' => $this->input->post('nama_material',TRUE),
		'satuan_material' => $this->input->post('satuan_material',TRUE),
		'stock_material' => $this->input->post('stock_material',TRUE),
	    );

            $this->Material_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('material'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Material_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('material/update_action'),
		'id_material' => set_value('id_material', $row->id_material),
		'nama_material' => set_value('nama_material', $row->nama_material),
		'satuan_material' => set_value('satuan_material', $row->satuan_material),
		'stock_material' => set_value('stock_material', $row->stock_material),
        'view'      => 'material/material_form',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('material'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_material', TRUE));
        } else {
            $data = array(
		'nama_material' => $this->input->post('nama_material',TRUE),
		'satuan_material' => $this->input->post('satuan_material',TRUE),
		'stock_material' => $this->input->post('stock_material',TRUE),
	    );

            $this->Material_model->update($this->input->post('id_material', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('material'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Material_model->get_by_id($id);

        if ($row) {
            $this->Material_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('material'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('material'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_material', 'nama material', 'trim|required');
	$this->form_validation->set_rules('satuan_material', 'satuan material', 'trim|required');
	$this->form_validation->set_rules('stock_material', 'stock material', 'trim|required');

	$this->form_validation->set_rules('id_material', 'id_material', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "material.xls";
        $judul = "material";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Material");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan Material");
	xlsWriteLabel($tablehead, $kolomhead++, "Stock Material");

	foreach ($this->Material_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_material);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satuan_material);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stock_material);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=material.doc");

        $data = array(
            'material_data' => $this->Material_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('material/material_doc',$data);
    }

}
