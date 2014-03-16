<?php
class Coba extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_anggota');
        $this->load->library('template');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $this->template->display('coba/index');
    }
    
    function tampilData(){
        $data['anggota']=$this->m_anggota->semua()->result();
        $this->load->view('coba/tampil',$data);
    }
}