<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faktur_penjualan_model extends CI_Model
{

    public $table = 'faktur_penjualan';
    public $id = 'id_faktur';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('faktur_penjualan.id_faktur,faktur_penjualan.tgl_faktur,data_barang.nama_barang,faktur_penjualan.item,faktur_penjualan.total,faktur_penjualan.dibayar,faktur_penjualan.kembalian,data_customer.nama_customer');
        $this->datatables->from('faktur_penjualan');
        $this->datatables->join('data_barang','faktur_penjualan.id_barang = data_barang.id_barang');
        $this->datatables->join('data_customer','faktur_penjualan.id_customer = data_customer.id_customer');
        //add this line for join
        //$this->datatables->join('table2', 'faktur_penjualan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('faktur_penjualan/read/$1'),'<i class="fa fa-eye" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('faktur_penjualan/update/$1'),'<i class="fa fa-edit" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('faktur_penjualan/delete/$1'),'<i class="fa fa-eraser" style="margin-right:5px;color:black;"></i>','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'), 'id_faktur');
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
        $this->db->like('id_faktur', $q);
	$this->db->or_like('tgl_faktur', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('item', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('dibayar', $q);
	$this->db->or_like('kembalian', $q);
	$this->db->or_like('id_customer', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_faktur', $q);
	$this->db->or_like('tgl_faktur', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('item', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('dibayar', $q);
	$this->db->or_like('kembalian', $q);
	$this->db->or_like('id_customer', $q);
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
     function count()
    {
        $query = $this->db->get('Faktur_penjualan');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }


    function allbarang(){
        $query = $this->db->get('data_barang');
        return $query->result();
    }

    function allcustomer(){
        $query = $this->db->get('data_customer');
        return $query->result();
    }

}
