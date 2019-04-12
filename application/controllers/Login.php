<?php

class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
  $this->load->library('session');
    $this->load->model('M_login');
        if ($this->session->userdata('id_karyawan')) {
            if($this->session->userdata('jabatan_karyawan') == 'Admin Divisi'){
                redirect('C_Beranda');
            }elseif($this->session->userdata('jabatan_karyawan') == 'Manajer'){
                redirect('Barang');
            }
        }  

  }

  function index(){
    $this->load->view('login');
  }

  function aksi_login(){

    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));

    // $where = array(
    //   'username' => $username,
    //   'password' => ($password)
    //   );
    $cek = $this->M_login->cek_login($username,$password);
    if($cek->num_rows() > 0){
      foreach ($cek->result() as $row) {
                    $id_karyawan = $row->id_karyawan;
                    $nama_karyawan = $row->nama_karyawan;
                    $jabatan_karyawan = $row->jabatan_karyawan;
                }

      $sessioncrm = array(
        'id_karyawan' => $id_karyawan,
        'nama_karyawan' => $nama_karyawan,
        'jabatan_karyawan' => $jabatan_karyawan,
        'status' => "login"
        );



      $this->session->set_userdata($sessioncrm);
print_r($this->session->all_userdata());
     
   
      if($this->session->userdata('jabatan_karyawan')=='Admin Divisi'){
        redirect('C_Beranda');
      }else if($this->session->userdata('level')=='Manajer'){
        redirect(base_url('Manajer/C_Beranda'));
      }

    }else{
      echo "Username dan password salah !";
    }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }
}
