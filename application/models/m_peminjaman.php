<?php
class M_Peminjaman extends CI_Model{
    private $table="transaksi";
    
    function nootomatis(){
        $today=date('Ymd');
        $query=mysql_query("select max(id_transaksi) as last from transaksi where id_transaksi like '$today%'");
        $data=mysql_fetch_array($query);
        $lastNoFaktur=$data['last'];
        
        $lastNoUrut=substr($lastNoFaktur,8,3);
        
        $nextNoUrut=$lastNoUrut+1;
        
        $nextNoTransaksi=$today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksi;
    }
    
    function getAnggota(){
        return $this->db->get("anggota");
    }
    
    function cariAnggota($nis){
        $this->db->where("nis",$nis);
        return $this->db->get("anggota");
    }
    
    function cariBuku($kode){
        $this->db->where("kode_buku",$kode);
        return $this->db->get("buku");
    }
    
    function simpanTmp($info){
        $this->db->insert("tmp",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tmp");
    }
    
    function cekTmp($kode){
        $this->db->where("kode_buku",$kode);
        return $this->db->get("tmp");
    }
    
    function jumlahTmp(){
        return $this->db->count_all("tmp");
    }
    
    function hapusTmp($kode){
        $this->db->where("kode_buku",$kode);
        $this->db->delete("tmp");
    }
    
    function simpan($info){
        $this->db->insert("transaksi",$info);
    }
    
    function pencarianbuku($cari){
        $this->db->like("judul",$cari);
        return $this->db->get("buku");
    }
    
}