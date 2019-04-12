<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	public function __construct(){
        $this->load->database();
    }

    //listing
    public function listing(){
    	$query = $this->db->get('admin');
    	return $query->result();
    }

    //detail
    public function detail($id){
    	$query = $this->db->get_where('admin', array('id_user' => $id));
    	return $query->row();
    }

    //tambah
    public function tambah($data){
    	$this->db->insert('admin', $data);
    }

    //edit
	public function edit($data){
    	$this->db->where('id_user',$data['id_user']);
    	$this->db->update('admin',$data);
    }

    //delete
	public function delete($data){
    	$this->db->where('id_user',$data['id_user']);
    	$this->db->delete('admin',$data);
    }

}
