<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manufacturing_order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Manufacturing_order_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'manufacturing_order/manufacturing_order_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Manufacturing_order_model->json();
    }

    public function read($id) 
    {
        $row = $this->Manufacturing_order_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_mo' => $row->no_mo,
		'id_customer' => $row->id_customer,
		'id_line' => $row->id_line,
		'tanggal_mo' => $row->tanggal_mo,
		'total' => $row->total,
        'view'      => 'manufacturing_order/manufacturing_order_read',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manufacturing_order'));
        }
    }

    public function create() 
    {

        $line = $this->Manufacturing_order_model->allline();
        $customer = $this->Manufacturing_order_model->allcustomer();

        $data = array(
            'button' => 'Create',
            'action' => site_url('manufacturing_order/create_action'),
	    'no_mo' => set_value('no_mo'),
	    'id_customer' => set_value('id_customer'),
	    'id_line' => set_value('id_line'),
	    'tanggal_mo' => set_value('tanggal_mo'),
	    'total' => set_value('total'),
        'line'  => $line,
        'customer'  => $customer,
        'view'      => 'manufacturing_order/manufacturing_order_form',
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
		'id_customer' => $this->input->post('id_customer',TRUE),
		'id_line' => $this->input->post('id_line',TRUE),
		'tanggal_mo' => $this->input->post('tanggal_mo',TRUE),
		'total' => $this->input->post('total',TRUE),
	    );

            $this->Manufacturing_order_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('manufacturing_order'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Manufacturing_order_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('manufacturing_order/update_action'),
		'no_mo' => set_value('no_mo', $row->no_mo),
		'id_customer' => set_value('id_customer', $row->id_customer),
		'id_line' => set_value('id_line', $row->id_line),
		'tanggal_mo' => set_value('tanggal_mo', $row->tanggal_mo),
        'view'      => 'manufacturing_order/manufacturing_order_form',

	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manufacturing_order'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_mo', TRUE));
        } else {
            $data = array(
		'id_customer' => $this->input->post('id_customer',TRUE),
		'id_line' => $this->input->post('id_line',TRUE),
		'tanggal_mo' => $this->input->post('tanggal_mo',TRUE),
		'total' => $this->input->post('total',TRUE),
		'id_detailfaktur' => $this->input->post('id_detailfaktur',TRUE),
	    );

            $this->Manufacturing_order_model->update($this->input->post('no_mo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('manufacturing_order'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Manufacturing_order_model->get_by_id($id);

        if ($row) {
            $this->Manufacturing_order_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('manufacturing_order'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manufacturing_order'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');
	$this->form_validation->set_rules('id_line', 'id line', 'trim|required');
	$this->form_validation->set_rules('tanggal_mo', 'tanggal mo', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');

	$this->form_validation->set_rules('no_mo', 'no_mo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "manufacturing_order.xls";
        $judul = "manufacturing_order";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Customer");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Line");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Mo");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Detailfaktur");

	foreach ($this->Manufacturing_order_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_customer);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_line);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_mo);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_detailfaktur);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=manufacturing_order.doc");

        $data = array(
            'manufacturing_order_data' => $this->Manufacturing_order_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('manufacturing_order/manufacturing_order_doc',$data);
    }

}
