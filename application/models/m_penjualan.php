<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class m_penjualan extends CI_Model{

        function statistikPenjualan(){
            $this->db->select('barang.namaBarang, SUM(penjualan.qty) AS
            qty');
            $this->db->from('penjualan');
            $this->db->join('barang','idBarang');
            $this->db->group_by('barang.namaBarang');
            $this->db->order_by('penjualan.idBarang');
            $query = $this->db->get();
            return $query;
        }
        
        function jumlahPenjualan(){
            $this->db->select('count(penjualan.idPenjualan) AS
            jumTransaksi,SUM(barang.harga*qty) AS jumPendapatan');
            $this->db->from('penjualan');
            $this->db->join('barang','idBarang');
            $query = $this->db->get();
            return $query;
        }
    }
?>