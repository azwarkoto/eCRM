<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Barang extends CI_Model {

	public function __construct(){
        $this->load->database();
    }

    //listing
    public function listing(){
    	$query = $this->db->get('daftar_barang');
    	return $query->result();
    }

    //detail
    public function detail($id){
    	$query = $this->db->get_where('daftar_barang', array('id_barang' => $id));
    	return $query->row();
    }

    //tambah
    public function tambah($data){
    	$this->db->insert('daftar_barang', $data);
    }

    //edit
	public function edit($data){
    	$this->db->where('id_barang',$data['id_barang']);
    	$this->db->update('daftar_barang',$data);
    }

    //delete
	public function delete($data){
    	$this->db->where('id_barang',$data['id_barang']);
    	$this->db->delete('daftar_barang',$data);
    }

}
