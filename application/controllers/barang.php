<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Barang extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model(array('m_barang', 'm_user'));
            date_default_timezone_set('Asia/Jakarta');
        }

        function getkodeunik() {
            $q = $this->db->query("SELECT MAX(RIGHT(idBarang,2)) AS idmax FROM barang");
            $kd = ""; // kode awal
            
            if($q->num_rows() > 0) { // jika data ada
                foreach($q->result() as $k) {
                    $tmp = ((int)$k->idmax) + 1; // string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                    $kd = sprintf("%02s", $tmp); // kode ambil 4 karakter terakhir
                }
            } else { // jika data kosong diset ke kode awal
                $kd = "01";
            }

            $kar = "B"; // karakter depan kodenya
            // gabungkan string dengan kode yang telah dibuat tadi
            return $kar . $kd;
        }

        function tambah() {
            if(!$this->session->userdata('level') == 'Petugas') {
                redirect('login');
            } else {
                if ($this->input->method() == 'post') {
                    $this->m_barang->tambah();
                    $this->session->set_flashdata('info', 'Data berhasil ditambah');
                    redirect('barang/tambah');
                } else {
                    $data['kodeunik'] = $this->m_barang->getkodeunik();
                    $this->load->view('petugas/header');
                    $this->load->view('petugas/tambahBarang', $data);
                    $this->load->view('petugas/footer');
                }
            }
        }

        public function barang(){
            if(!$this->session->userdata('level')=='Petugas') {
                redirect('login');
            }else{
                $data['dataBarang'] = $this->m_barang->getBarang()->result();

                $this->load->view('petugas/header');
                $this->load->view('petugas/dataBarang',$data);
                $this->load->view('petugas/footer');
            }
        }

        function dataBarang(){
            if(!$this->session->userdata('level')=='Admin') {
                redirect('login');
            }else{
                $data['admin'] = $this->m_user->selectAdmin()->row();
                $data['dataBarang'] = $this->m_barang->getBarang()->result();

                $this->load->view('admin/header',$data);
                $this->load->view('admin/dataBarang');
                $this->load->view('admin/footer');
            }
        }

        public function ubahBarang($idBarang){
            if(!$this->session->userdata('level')=='Admin') {
                redirect('login');
            }else{
                if ($this->input->method()=='post') {
                    $this->m_barang->ubahBarang($idBarang);
                    $this->session->set_flashdata('info', 'Data berhasil diubah');
                    redirect('barang/barang');
                }else{
                    $data['dataBarang'] = $this->m_barang->selectBarang($idBarang)->row();
                    $this->load->view('petugas/header');
                    $this->load->view('petugas/ubahBarang', $data);
                    $this->load->view('petugas/footer');
                }
            }
        }
    }
?>