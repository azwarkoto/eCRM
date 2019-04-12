<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_laporan_model extends CI_Model
{

    public $table = 'data_laporan';
    public $id = 'id_laporan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_laporan,id_karyawan,id_part,tanggal,total,no_mo');
        $this->datatables->from('data_laporan');
        //add this line for join
        //$this->datatables->join('table2', 'data_laporan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('data_laporan/read/$1'),'<i class="fa fa-eye" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('data_laporan/update/$1'),'<i class="fa fa-edit" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('data_laporan/delete/$1'),'<i class="fa fa-eraser" style="margin-right:5px;color:black;"></i>','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'), 'id_laporan');
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
        $this->db->like('id_laporan', $q);
	$this->db->or_like('id_karyawan', $q);
	$this->db->or_like('id_part', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('no_mo', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_laporan', $q);
	$this->db->or_like('id_karyawan', $q);
	$this->db->or_like('id_part', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('no_mo', $q);
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

}
