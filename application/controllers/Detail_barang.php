<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_barang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'detail_barang/detail_barang_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Detail_barang_model->json();
    }

    public function read($id) 
    {
        $row = $this->Detail_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detailbarang' => $row->id_detailbarang,
		'id_barang' => $row->id_barang,
		'id_komponen' => $row->id_komponen,
		'qty' => $row->qty,
		'satuan' => $row->satuan,
        'view'      => 'detail_barang/detail_barang_read'
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_barang/create_action'),
	    'id_detailbarang' => set_value('id_detailbarang'),
	    'id_barang' => set_value('id_barang'),
	    'id_komponen' => set_value('id_komponen'),
	    'qty' => set_value('qty'),
	    'satuan' => set_value('satuan'),
        'view'      => 'detail_barang/detail_barang_form'
	);
        $this->load->view('detail_barang/detail_barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'id_komponen' => $this->input->post('id_komponen',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Detail_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_barang/update_action'),
		'id_detailbarang' => set_value('id_detailbarang', $row->id_detailbarang),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'id_komponen' => set_value('id_komponen', $row->id_komponen),
		'qty' => set_value('qty', $row->qty),
		'satuan' => set_value('satuan', $row->satuan),
        'view'      => 'detail_barang/detail_barang_form'
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detailbarang', TRUE));
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'id_komponen' => $this->input->post('id_komponen',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Detail_barang_model->update($this->input->post('id_detailbarang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_barang_model->get_by_id($id);

        if ($row) {
            $this->Detail_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('id_komponen', 'id komponen', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');

	$this->form_validation->set_rules('id_detailbarang', 'id_detailbarang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_barang.xls";
        $judul = "detail_barang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Qty");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");

	foreach ($this->Detail_barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_komponen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->qty);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satuan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detail_barang.doc");

        $data = array(
            'detail_barang_data' => $this->Detail_barang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detail_barang/detail_barang_doc',$data);
    }

}