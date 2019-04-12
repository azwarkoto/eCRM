<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Fasilitas_Ruangan extends CI_Model {

	public function __construct(){
        $this->load->database();
    }

    //listing
    public function listing(){
        $sql = "SELECT sum(fasilitas_ruangan.jumlah) as total, daftar_ruangan.nama_ruangan, daftar_barang.nama_barang, daftar_ruangan.id_ruangan, daftar_barang.id_barang, fasilitas_ruangan.id_fasilitas_ruangan from fasilitas_ruangan, daftar_ruangan, daftar_barang where fasilitas_ruangan.id_barang = daftar_barang.id_barang and fasilitas_ruangan.id_ruangan = daftar_ruangan.id_ruangan group by fasilitas_ruangan.id_ruangan, fasilitas_ruangan.id_barang";
        // $this->db->select('*');
        // $this->db->from('daftar_ruangan');
        // $this->db->join('fasilitas_ruangan', 'fasilitas_ruangan.id_ruangan = daftar_ruangan.id_ruangan');
        // $this->db->join('daftar_barang', 'daftar_barang.id_barang = fasilitas_ruangan.id_barang');
        // $this->db->group_by(array("fasilitas_ruangan.id_ruangan", "fasilitas_ruangan.id_barang"));
        // $this->db->group_by('fasilitas_ruangan.id_ruangan');
        $query = $this->db->query($sql);
    	return $query->result();
    }

    //detail
    public function detail($id_fasilitas_ruangan){
         $this->db->select('*');
        $this->db->from('daftar_ruangan');
        $this->db->join('fasilitas_ruangan', 'fasilitas_ruangan.id_ruangan = daftar_ruangan.id_ruangan');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = fasilitas_ruangan.id_barang');
        $this->db->where('fasilitas_ruangan.id_fasilitas_ruangan =', $id_fasilitas_ruangan);
        $query = $this->db->get();
        // $query = $this->db->get_where('fasilitas_ruangan', array('id_fasilitas_ruangan' => $id));
    	return $query->row();
    }

    public function details($id_ruangan, $id_barang){
        $this->db->select('*');
        $this->db->from('fasilitas_ruangan');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = fasilitas_ruangan.id_barang');
        $this->db->join('daftar_ruangan', 'daftar_ruangan.id_ruangan = fasilitas_ruangan.id_ruangan');
        $this->db->where('fasilitas_ruangan.id_barang', $id_barang);
        $this->db->where('fasilitas_ruangan.id_ruangan', $id_ruangan);
        return $this->db->get()->result();
    }

    public function detaillengkap($id, $ids){
        // $sql = "SELECT sum(fasilitas_ruangan.jumlah) as total, (*) from fasilitas_ruangan, daftar_ruangan, daftar_barang where fasilitas_ruangan.id_ruangan = $id and fasilitas_ruangan.id_barang =$ids";
         // $sql = "SELECT  daftar_ruangan.kode_ruangan, daftar_ruangan.nama_ruangan, daftar_barang.kode_barang,daftar_barang.nama_barang, fasilitas_ruangan.tgl_masuk, fasilitas_ruangan.jumlah from fasilitas_ruangan, daftar_ruangan, daftar_barang where fasilitas_ruangan.id_ruangan=$id and fasilitas_ruangan.id_barang=$ids and fasilitas_ruangan.id_barang = daftar_barang.id_barang and fasilitas_ruangan.id_ruangan = daftar_ruangan.id_ruangan";
		 $sql = "SELECT * , sum(fasilitas_ruangan.jumlah) as total from daftar_barang, daftar_ruangan, fasilitas_ruangan where fasilitas_ruangan.id_ruangan=$id and fasilitas_ruangan.id_barang=$ids and fasilitas_ruangan.id_barang=daftar_barang.id_barang and fasilitas_ruangan.id_ruangan=daftar_ruangan.id_ruangan";
        $query = $this->db->query($sql);
        // $query = $this->db->get_where('fasilitas_ruangan', array('id_fasilitas_ruangan' => $id));
        return $query->row();
    }
	public function detail_lengkap($id){
        
		 $sql = "SELECT *, sum(fasilitas_ruangan.jumlah) as total from daftar_barang, daftar_ruangan, fasilitas_ruangan where fasilitas_ruangan.id_fasilitas_ruangan=$id and fasilitas_ruangan.id_barang=daftar_barang.id_barang and fasilitas_ruangan.id_ruangan=daftar_ruangan.id_ruangan";
        $query = $this->db->query($sql);
        // $query = $this->db->get_where('fasilitas_ruangan', array('id_fasilitas_ruangan' => $id));
        return $query->row();
    }

    public function details_lengkap($id){
        
         $sql = "SELECT *, sum(fasilitas_ruangan.jumlah) as total from daftar_barang, daftar_ruangan, fasilitas_ruangan where fasilitas_ruangan.id_fasilitas_ruangan=$id and fasilitas_ruangan.id_barang=daftar_barang.id_barang and fasilitas_ruangan.id_ruangan=daftar_ruangan.id_ruangan";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function year($id, $ids){
        $this->db->select('SUBSTRING(tgl_masuk, 1, 4) as month');
        $this->db->from('fasilitas_ruangan');
        $this->db->where('fasilitas_ruangan.id_ruangan =', $id);
        $this->db->where('fasilitas_ruangan.id_barang =', $ids);
        $query = $this->db->get();
        // $query = $this->db->get_where('fasilitas_ruangan', array('id_fasilitas_ruangan' => $id));
        return $query->row();
    }
	public function years_lengkap($id){
        $this->db->select('SUBSTRING(tgl_masuk, 1, 4) as month');
        $this->db->from('fasilitas_ruangan');
        $this->db->where('fasilitas_ruangan.id_fasilitas_ruangan =', $id);
        $query = $this->db->get();
        // $query = $this->db->get_where('fasilitas_ruangan', array('id_fasilitas_ruangan' => $id));
        return $query->row();
    }


    //detaillengkap
    //tambah
    public function tambah($data){
    	$this->db->insert('fasilitas_ruangan', $data);
    }

    //edit
	public function edit($data){
    	$this->db->where('id_fasilitas_ruangan',$data['id_fasilitas_ruangan']);
    	$this->db->update('fasilitas_ruangan',$data);
    }

    //delete
	public function delete($id){
    	$this->db->where('id_fasilitas_ruangan',$id);
    	return $this->db->delete('fasilitas_ruangan');
    }

    public function read(){
        $query = $this->db->get('daftar_ruangan');
        return $query->result();
    }
    public function readbarang(){
        $query = $this->db->get('daftar_barang');
        return $query->result();
    }

    
}
