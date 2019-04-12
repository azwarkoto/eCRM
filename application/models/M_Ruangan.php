<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ruangan extends CI_Model {

	public function __construct(){
        $this->load->database();
    }

    //listing
    public function listing(){
    	$query = $this->db->get('daftar_ruangan');
    	return $query->result();
    }

    //detail
    public function detail($id){
    	$query = $this->db->get_where('daftar_ruangan', array('id_ruangan' => $id));
    	return $query->row();
    }

    //tambah
    public function tambah($data){
    	$this->db->insert('daftar_ruangan', $data);
    }

    //edit
	public function edit($data){
    	$this->db->where('id_ruangan',$data['id_ruangan']);
    	$this->db->update('daftar_ruangan',$data);
    }

    //delete
	public function delete($data){
    	$this->db->where('id_ruangan',$data['id_ruangan']);
    	$this->db->delete('daftar_ruangan',$data);
    }

}