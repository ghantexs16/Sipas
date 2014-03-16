<?php
class Peminjaman extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template'));
        $this->load->model('m_peminjaman');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $data['title']="Transaksi Peminjaman";
        $data['tanggalpinjam']=date('Y-m-d');
        $data['tanggalkembali'] = strtotime('+7 day',strtotime($data['tanggalpinjam']));
        $data['noauto']=$this->m_peminjaman->nootomatis();
        $data['anggota']=$this->m_peminjaman->getAnggota()->result();
        $data['tanggalkembali'] = date('Y-m-d', $data['tanggalkembali']);
        $this->template->display('peminjaman/index',$data);
    }
    
    function tampil(){
        $data['tmp']=$this->m_peminjaman->tampilTmp()->result();
        $data['jumlahTmp']=$this->m_peminjaman->jumlahTmp();
        $this->load->view('peminjaman/tampil',$data);
    }
    
    function sukses(){
        
        $tmp=$this->m_peminjaman->tampilTmp()->result();
        foreach($tmp as $row){
            $info=array(
                'id_transaksi'=>$this->input->post('nomer'),
                'nis'=>$this->input->post('nis'),
                'kode_buku'=>$row->kode_buku,
                'tanggal_pinjam'=>$this->input->post('pinjam'),
                'tanggal_kembali'=>$this->input->post('kembali'),
                'status'=>"N"
            );
            $this->m_peminjaman->simpan($info);
            
            //hapus data di temp
            $this->m_peminjaman->hapusTmp($row->kode_buku);
        }
    }
    
    function cariAnggota(){
        $nis=$this->input->post('nis');
        $anggota=$this->m_peminjaman->cariAnggota($nis);
        if($anggota->num_rows()>0){
            $anggota=$anggota->row_array();
            echo $anggota['nama'];
        }
    }
    
    function cariBuku(){
        $kode=$this->input->post('kode');
        $buku=$this->m_peminjaman->cariBuku($kode);
        if($buku->num_rows()>0){
            $buku=$buku->row_array();
            echo $buku['judul']."|".$buku['pengarang'];
        }
    }
    
    
    function tambah(){
        $kode=$this->input->post('kode');
        $cek=$this->m_peminjaman->cekTmp($kode);
        if($cek->num_rows()<1){
            $info=array(
                'kode_buku'=>$this->input->post('kode'),
                'judul'=>$this->input->post('judul'),
                'pengarang'=>$this->input->post('pengarang')
            );
            $this->m_peminjaman->simpanTmp($info);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_peminjaman->hapusTmp($kode);
    }
    
    function pencarianbuku(){
        $cari=$this->input->post('caribuku');
        $data['buku']=$this->m_peminjaman->pencarianbuku($cari)->result();
        $this->load->view('peminjaman/pencarianbuku',$data);
    }
}