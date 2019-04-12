<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Departemen extends CI_Model {

	public function __construct(){
        $this->load->database();
    }

    //listing
    public function listing(){
    	$query = $this->db->get('daftar_departemen');
    	return $query->result();
    }

    //detail
    public function detail($id){
    	$query = $this->db->get_where('daftar_departemen', array('id_departemen' => $id));
    	return $query->row();
    }

    //tambah
    public function tambah($data){
    	$this->db->insert('daftar_departemen', $data);
    }

    //edit
	public function edit($data){
    	$this->db->where('id_departemen',$data['id_departemen']);
    	$this->db->update('daftar_departemen',$data);
    }

    //delete
	public function delete($data){
    	$this->db->where('id_departemen',$data['id_departemen']);
    	$this->db->delete('daftar_departemen',$data);
    }

}
