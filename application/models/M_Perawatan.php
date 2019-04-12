<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Perawatan extends CI_Model {

	public function __construct(){
        $this->load->database();
    }

    //listing
    public function listing(){
        $this->db->select('*');
        $this->db->from('perawatan');
        // $this->db->join('fasilitas_ruangan', 'fasilitas_ruangan.id_ruangan = perawatan.id_ruangan');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = perawatan.id_barang');
        $this->db->join('daftar_ruangan', 'daftar_ruangan.id_ruangan = perawatan.id_ruangan');
        // $this->db->group_by(array("daftar_ruangan.id_ruangan", "daftar_barang.id_barang"));
        // $this->db->group_by('fasilitas_ruangan.id_ruangan');
        $query = $this->db->get();
    	return $query->result();
    }

    //detail
    public function detail($id){
        $this->db->select('*');
        $this->db->from('perawatan');
        // $this->db->join('fasilitas_ruangan', 'fasilitas_ruangan.id_ruangan = perawatan.id_ruangan');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = perawatan.id_barang');
        $this->db->join('daftar_ruangan', 'daftar_ruangan.id_ruangan = perawatan.id_ruangan');
        $this->db->where('perawatan.id_perawatan =',$id);
        $query = $this->db->get();
        // $this->db->group_by('fasilitas_ruangan.id_ruangan');
    	// $query = $this->db->get_where('perawatan', array('id_perawatan' => $id));
    	return $query->row();
    }
    public function readaset(){
        $this->db->select('*');
        $this->db->from('perawatan');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = perawatan.id_barang');

        $query = $this->db->get();

        return $query->row();
    }

    //tambah
    public function tambah($data){
    	return $this->db->insert('perawatan', $data);
    }

    //edit
	public function edit($data){
    	$this->db->where('id_perawatan',$data['id_perawatan']);
    	$this->db->update('perawatan',$data);
    }

    //delete
	public function delete($data){
    	$this->db->where('id_perawatan',$data['id_perawatan']);
    	$this->db->delete('perawatan',$data);
    }

    public function read(){
        $query = $this->db->get('daftar_ruangan');
        return $query->result();
    }

    
    public function read_aset(){
        $this->db->select('SUBSTRING(tgl_masuk, 1, 4) as month, nama_barang, daftar_barang.id_barang, kode_barang, kode_ruangan');
        $this->db->from('daftar_barang');
        $this->db->join('fasilitas_ruangan', 'fasilitas_ruangan.id_barang = daftar_barang.id_barang');
        $this->db->join('daftar_ruangan', 'daftar_ruangan.id_ruangan = fasilitas_ruangan.id_ruangan');
        $this->db->group_by('fasilitas_ruangan.id_ruangan');
        $query = $this->db->get();
        return $query->result();
    }

    public function year(){
        $this->db->select('SUBSTRING(tgl_masuk, 1, 4) as month');
        $this->db->from('fasilitas_ruangan');
        $query = $this->db->get();
        // $query = $this->db->get_where('fasilitas_ruangan', array('id_fasilitas_ruangan' => $id));
        return $query->row();
    }
	public function get_ruangan()
	{
		$this->db->order_by('id_ruangan', 'asc');
		return $this->db->get('daftar_ruangan')->result();
	}
	public function get_barang()
	{
		// kita joinkan tabel kota dengan provinsi
		$this->db->order_by('daftar_barang.id_barang', 'asc');
		$this->db->group_by('fasilitas_ruangan.id_barang', 'asc');
		$this->db->group_by('fasilitas_ruangan.id_ruangan', 'asc');
		$this->db->join('daftar_ruangan', 'fasilitas_ruangan.id_ruangan = daftar_ruangan.id_ruangan');
		$this->db->join('daftar_barang', 'fasilitas_ruangan.id_barang = daftar_barang.id_barang');
		return $this->db->get('fasilitas_ruangan')->result();
	}
	public function get_identifikasi()
	{
		// kita joinkan tabel kota dengan provinsi
		$this->db->select('SUBSTRING(fasilitas_ruangan.tgl_masuk, 1, 4) as month, daftar_barang.id_barang, daftar_barang.kode_barang,daftar_barang.nama_barang, daftar_ruangan.id_ruangan, daftar_ruangan.kode_ruangan,daftar_ruangan.nama_ruangan, fasilitas_ruangan.jumlah, fasilitas_ruangan.no_identifikasi');
		$this->db->order_by('daftar_barang.id_barang', 'asc');
		$this->db->group_by('fasilitas_ruangan.id_barang', 'asc');
		$this->db->group_by('fasilitas_ruangan.id_ruangan', 'asc');
		$this->db->join('daftar_ruangan', 'fasilitas_ruangan.id_ruangan = daftar_ruangan.id_ruangan');
		$this->db->join('daftar_barang', 'fasilitas_ruangan.id_barang = daftar_barang.id_barang');
		return $this->db->get('fasilitas_ruangan')->row();
	}

    public function _uploadImage()
{
    $config['upload_path']          = './upload/img/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id_perawatan;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

}
