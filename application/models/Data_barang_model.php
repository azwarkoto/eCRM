<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_barang_model extends CI_Model
{

    public $table = 'data_barang';
    public $id = 'id_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_barang,nama_barang,jenis_barang,nama_ng');
        $this->datatables->from('data_barang');
        //add this line for join
        //$this->datatables->join('table2', 'data_barang.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('data_barang/read/$1'),'<i class="fa fa-eye" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('data_barang/update/$1'),'<i class="fa fa-edit" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('data_barang/delete/$1'),'<i class="fa fa-eraser" style="margin-right:5px;color:black;"></i>','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'), 'id_barang');
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
        $this->db->like('id_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('jenis_barang', $q);
	$this->db->or_like('nama_ng', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('jenis_barang', $q);
	$this->db->or_like('nama_ng', $q);
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
        $query = $this->db->get('data_barang');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
      public function listing(){
        $sql = "SELECT * from Data_barang";
        // $this->db->select('*');
        // $this->db->from('daftar_ruangan');
        // $this->db->join('fasilitas_ruangan', 'fasilitas_ruangan.id_ruangan = daftar_ruangan.id_ruangan');
        // $this->db->join('daftar_barang', 'daftar_barang.id_barang = fasilitas_ruangan.id_barang');
        // $this->db->group_by(array("fasilitas_ruangan.id_ruangan", "fasilitas_ruangan.id_barang"));
        // $this->db->group_by('fasilitas_ruangan.id_ruangan');
        $query = $this->db->query($sql);
        return $query->result();
    }
}