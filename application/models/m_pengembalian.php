<?php
class M_Pengembalian extends CI_Model{
    
    function cariTransaksi($no){
        $query=$this->db->query("select a.*,b.nama from transaksi a,
                                anggota b
                                where a.id_transaksi='$no' and a.id_transaksi
                                not in(select id_transaksi from pengembalian)
                                and a.nis=b.nis");
        return $query;
    }
    
    function tampilBuku($no){
        $query=$this->db->query("select a.*,b.judul,b.pengarang
                                from transaksi a,buku b
                                where a.id_transaksi='$no' and
                                a.id_transaksi not in(select id_transaksi from pengembalian)
                                and a.kode_buku=b.kode_buku");
        return $query;
    }
    
    function simpan($info){
        $this->db->insert("pengembalian",$info);
    }
    
    function update($no,$update){
        $this->db->where("id_transaksi",$no);
        $this->db->update("transaksi",$update);
    }
    
    function cari_by_nis($nis){
        $query=$this->db->query("select * from transaksi where id_transaksi
                                not in(select id_transaksi from pengembalian)
                                and nis like'%$nis%' group by nis");
        return $query;
    }
}