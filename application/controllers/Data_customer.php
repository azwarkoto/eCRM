<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_customer_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'data_customer/data_customer_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_customer_model->json();
    }

    public function read($id) 
    {
        $row = $this->Data_customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_customer' => $row->id_customer,
		'nama_customer' => $row->nama_customer,
		'alamat_customer' => $row->alamat_customer,
		'tanggal_lahir_customer' => $row->tanggal_lahir_customer,
		'email_customer' => $row->email_customer,
		'no_telpon_customer' => $row->no_telpon_customer,
        'view'      => 'data_customer/data_customer_read',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_customer/create_action'),
	    'id_customer' => set_value('id_customer'),
	    'nama_customer' => set_value('nama_customer'),
	    'alamat_customer' => set_value('alamat_customer'),
	    'tanggal_lahir_customer' => set_value('tanggal_lahir_customer'),
	    'email_customer' => set_value('email_customer'),
	    'no_telpon_customer' => set_value('no_telpon_customer'),
        'password' => set_value('password'),
	);
        $this->load->view('data_customer/data_customer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_customer' => $this->input->post('nama_customer',TRUE),
		'alamat_customer' => $this->input->post('alamat_customer',TRUE),
		'tanggal_lahir_customer' => $this->input->post('tanggal_lahir_customer',TRUE),
		'email_customer' => $this->input->post('email_customer',TRUE),
		'no_telpon_customer' => $this->input->post('no_telpon_customer',TRUE),
        'password' => md5($this->input->post('password',TRUE)),
	    );

            $this->Data_customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('login'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_customer/update_action'),
		'id_customer' => set_value('id_customer', $row->id_customer),
		'nama_customer' => set_value('nama_customer', $row->nama_customer),
		'alamat_customer' => set_value('alamat_customer', $row->alamat_customer),
		'tanggal_lahir_customer' => set_value('tanggal_lahir_customer', $row->tanggal_lahir_customer),
		'email_customer' => set_value('email_customer', $row->email_customer),
		'no_telpon_customer' => set_value('no_telpon_customer', $row->no_telpon_customer),
        'password' => set_value('password', $row->password),
	    );
            $this->load->view('data_customer/data_customer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_customer', TRUE));
        } else {
            $data = array(
		'nama_customer' => $this->input->post('nama_customer',TRUE),
		'alamat_customer' => $this->input->post('alamat_customer',TRUE),
		'tanggal_lahir_customer' => $this->input->post('tanggal_lahir_customer',TRUE),
		'email_customer' => $this->input->post('email_customer',TRUE),
		'no_telpon_customer' => $this->input->post('no_telpon_customer',TRUE),
        'password' => $this->input->post('password',TRUE),
	    );

            $this->Data_customer_model->update($this->input->post('id_customer', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_customer_model->get_by_id($id);

        if ($row) {
            $this->Data_customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_customer', 'nama customer', 'trim|required');
	$this->form_validation->set_rules('alamat_customer', 'alamat customer', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir_customer', 'tanggal lahir customer', 'trim|required');
	$this->form_validation->set_rules('email_customer', 'email customer', 'trim|required');
	$this->form_validation->set_rules('no_telpon_customer', 'no telpon customer', 'trim|required');

	$this->form_validation->set_rules('id_customer', 'id_customer', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_customer.xls";
        $judul = "data_customer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Customer");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Customer");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir Customer");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Customer");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telpon Customer");

	foreach ($this->Data_customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_customer);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir_customer);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_customer);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_telpon_customer);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_customer.doc");

        $data = array(
            'data_customer_data' => $this->Data_customer_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('data_customer/data_customer_doc',$data);
    }

}