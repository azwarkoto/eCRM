<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_karyawan_model extends CI_Model
{

    public $table = 'data_karyawan';
    public $id = 'id_karyawan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_karyawan,password,nama_karyawan,jabatan_karyawan,shift,id_line');
        $this->datatables->from('data_karyawan');
        //add this line for join
        //$this->datatables->join('table2', 'data_karyawan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('data_karyawan/read/$1'),'<i class="fa fa-eye" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('data_karyawan/update/$1'),'<i class="fa fa-edit" style="margin-right:5px;color:black;"></i>')." ".anchor(site_url('data_karyawan/delete/$1'),'<i class="fa fa-eraser" style="margin-right:5px;color:black;"></i>','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'), 'id_karyawan');
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
        $this->db->like('id_karyawan', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('nama_karyawan', $q);
	$this->db->or_like('jabatan_karyawan', $q);
	$this->db->or_like('shift', $q);
	$this->db->or_like('id_line', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_karyawan', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('nama_karyawan', $q);
	$this->db->or_like('jabatan_karyawan', $q);
	$this->db->or_like('shift', $q);
	$this->db->or_like('id_line', $q);
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
        $query = $this->db->get('data_karyawan');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }


}