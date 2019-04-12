<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_barang_model extends CI_Model
{

    public $table = 'detail_barang';
    public $id = 'id_detailbarang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_detailbarang,id_barang,id_komponen,qty,satuan');
        $this->datatables->from('detail_barang');
        //add this line for join
        //$this->datatables->join('table2', 'detail_barang.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('detail_barang/read/$1'),'<i class="fa fa-eye" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('detail_barang/update/$1'),'<i class="fa fa-edit" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('detail_barang/delete/$1'),'<i class="fa fa-eraser" style="margin-right:5px;color:black;"></i>','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'), 'id_detailbarang');
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
        $this->db->like('id_detailbarang', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('id_komponen', $q);
	$this->db->or_like('qty', $q);
	$this->db->or_like('satuan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_detailbarang', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('id_komponen', $q);
	$this->db->or_like('qty', $q);
	$this->db->or_like('satuan', $q);
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