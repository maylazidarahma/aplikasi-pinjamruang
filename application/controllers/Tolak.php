<?php
Class Tolak extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    function tolak($id_pinjam){
        if(empty($id_pinjam)){
            redirect('peminjaman');
        }else{
            $update =  $this->curl->simple_put($this->API.'/Tolak' . '/'. $id_pinjam); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Permintaan Berhasil ditolak');
            }else
            {
               $this->session->set_flashdata('hasil','Gagal');
            }
            redirect('peminjaman');
        }
    }
}