<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Part_model extends CI_Model
{

    public $table = 'part';
    public $id = 'id_part';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('part.id_part,part.nama_part,part.jenis_part,part.cycle_time,part.nama_ng,material.nama_material');
        $this->datatables->from('part');
        $this->datatables->join('material','part.id_material = material.id_material');
        //add this line for join
        //$this->datatables->join('table2', 'part.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('part/read/$1'),'<i class="fa fa-eye" style="margin-right:5px;color:black;"></i>')." | ".anchor(site_url('part/update/$1'),'<i class="fa fa-edit" style="margin-right:5px;color:black;"></i>')." | ".anchor(site_url('part/delete/$1'),'<i class="fa fa-eraser" style="margin-right:5px;color:black;"></i>','onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'), 'id_part');
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
        $this->db->like('id_part', $q);
	$this->db->or_like('nama_part', $q);
	$this->db->or_like('jenis_part', $q);
	$this->db->or_like('cycle_time', $q);
	$this->db->or_like('nama_ng', $q);
	$this->db->or_like('id_material', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_part', $q);
	$this->db->or_like('nama_part', $q);
	$this->db->or_like('jenis_part', $q);
	$this->db->or_like('cycle_time', $q);
	$this->db->or_like('nama_ng', $q);
	$this->db->or_like('id_material', $q);
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
    
    function allmaterial(){
        $query = $this->db->get('material');
        return $query->result();
    }

}
