<?php 
 
class M_login extends CI_Model{	
	function cek_login($username,$password){		
		 $this->db->where('id_karyawan', $username);
         $this->db->where('password', $password);
         return $this->db->get('data_karyawan');
	}	

	

}