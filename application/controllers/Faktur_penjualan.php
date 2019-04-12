<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faktur_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faktur_penjualan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = array('view'      => 'faktur_penjualan/faktur_penjualan_list');
        $this->load->view('wrapper',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Faktur_penjualan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Faktur_penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_faktur' => $row->id_faktur,
		'tgl_faktur' => $row->tgl_faktur,
		'id_barang' => $row->id_barang,
		'item' => $row->item,
		'total' => $row->total,
		'dibayar' => $row->dibayar,
		'kembalian' => $row->kembalian,
		'id_customer' => $row->id_customer,
        'view'      => 'faktur_penjualan/faktur_penjualan_read',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur_penjualan'));
        }
    }

    public function create() 
    {
        $barang = $this->Faktur_penjualan_model->allbarang();
        $customer = $this->Faktur_penjualan_model->allcustomer();


        $data = array(
            'button' => 'Create',
            'action' => site_url('faktur_penjualan/create_action'),
	    'id_faktur' => set_value('id_faktur'),
	    'tgl_faktur' => set_value('tgl_faktur'),
	    'id_barang' => set_value('id_barang'),
	    'item' => set_value('item'),
	    'total' => set_value('total'),
	    'dibayar' => set_value('dibayar'),
	    'kembalian' => set_value('kembalian'),
	    'id_customer' => set_value('id_customer'),
        'barang'    => $barang,
        'customer'  => $customer,
        'view'      => 'faktur_penjualan/faktur_penjualan_form',
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
		'tgl_faktur' => $this->input->post('tgl_faktur',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'item' => $this->input->post('item',TRUE),
		'total' => $this->input->post('total',TRUE),
		'dibayar' => $this->input->post('dibayar',TRUE),
		'kembalian' => $this->input->post('kembalian',TRUE),
		'id_customer' => $this->input->post('id_customer',TRUE),
	    );

            $this->Faktur_penjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faktur_penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faktur_penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faktur_penjualan/update_action'),
		'id_faktur' => set_value('id_faktur', $row->id_faktur),
		'tgl_faktur' => set_value('tgl_faktur', $row->tgl_faktur),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'item' => set_value('item', $row->item),
		'total' => set_value('total', $row->total),
		'dibayar' => set_value('dibayar', $row->dibayar),
		'kembalian' => set_value('kembalian', $row->kembalian),
		'id_customer' => set_value('id_customer', $row->id_customer),
        'view'      => 'faktur_penjualan/faktur_penjualan_form',
	    );
            $this->load->view('wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur_penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_faktur', TRUE));
        } else {
            $data = array(
		'tgl_faktur' => $this->input->post('tgl_faktur',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'item' => $this->input->post('item',TRUE),
		'total' => $this->input->post('total',TRUE),
		'dibayar' => $this->input->post('dibayar',TRUE),
		'kembalian' => $this->input->post('kembalian',TRUE),
		'id_customer' => $this->input->post('id_customer',TRUE),
	    );

            $this->Faktur_penjualan_model->update($this->input->post('id_faktur', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faktur_penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faktur_penjualan_model->get_by_id($id);

        if ($row) {
            $this->Faktur_penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faktur_penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faktur_penjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_faktur', 'tgl faktur', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('item', 'item', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('dibayar', 'dibayar', 'trim|required');
	$this->form_validation->set_rules('kembalian', 'kembalian', 'trim|required');
	$this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');

	$this->form_validation->set_rules('id_faktur', 'id_faktur', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "faktur_penjualan.xls";
        $judul = "faktur_penjualan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Faktur");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Item");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Dibayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Kembalian");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Customer");

	foreach ($this->Faktur_penjualan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_faktur);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->item);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dibayar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kembalian);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_customer);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=faktur_penjualan.doc");

        $data = array(
            'faktur_penjualan_data' => $this->Faktur_penjualan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('faktur_penjualan/faktur_penjualan_doc',$data);
    }


}