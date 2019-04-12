<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manufacturing_order_model extends CI_Model
{

    public $table = 'manufacturing_order';
    public $id = 'no_mo';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('manufacturing_order.no_mo,data_customer.nama_customer,line.nama_line,manufacturing_order.tanggal_mo,manufacturing_order.total');
        $this->datatables->from('manufacturing_order');
        $this->datatables->join('data_customer', 'manufacturing_order.id_customer = data_customer.id_customer');
        $this->datatables->join('line', 'manufacturing_order.id_line = line.id_line');
        //add this line for join
        //$this->datatables->join('table2', 'manufacturing_order.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('manufacturing_order/read/$1'),'<i class="fa fa-eye" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('manufacturing_order/update/$1'),'<i class="fa fa-edit" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('manufacturing_order/delete/$1'),'<i class="fa fa-eraser" style="margin-right:5px;color:black;"></i>','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'), 'no_mo');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('no_mo', $q);
	$this->db->or_like('id_customer', $q);
	$this->db->or_like('id_line', $q);
	$this->db->or_like('tanggal_mo', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('id_detailfaktur', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no_mo', $q);
	$this->db->or_like('id_customer', $q);
	$this->db->or_like('id_line', $q);
	$this->db->or_like('tanggal_mo', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('id_detailfaktur', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function allline(){
        $query = $this->db->get('line');
        return $query->result();
    }
    function allcustomer(){
        $query = $this->db->get('data_customer');
        return $query->result();
    }

}