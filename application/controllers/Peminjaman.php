<?php
Class Peminjaman extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index(){
        $data['content_view'] = 'v_peminjaman';
        $data['datapinjam'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/peminjaman'));
        $this->load->view('template',$data);
    }

    function tampil($id_ruang){
        $data['content_view'] = 'v_pinjam_user';
        $data['id_ruang'] = $id_ruang;
        $this->load->view('template', $data);
    }
    
    function create(){
        if($this->input->post('id_ruang')!=""&&$this->input->post('id_user')!=""&&$this->input->post('waktu_pinjam')!=""&&$this->input->post('waktu_kembali')!=""&&$this->input->post('ket_pinjam')!=""){
        if(isset($_POST['submit'])){
            $data = array(
                    'id_ruang'      => $this->input->post('id_ruang'),
                    'waktu_pinjam'  => $this->input->post('waktu_pinjam'),
                    'waktu_kembali' => $this->input->post('waktu_kembali'),
                    'ket_pinjam'    => $this->input->post('ket_pinjam'),
                    'id_user'       => $this->input->post('id_user'));
            $insert =  $this->curl->simple_post($this->API.'/peminjaman', $data, array(CURLOPT_BUFFERSIZE => 10));  
            if($insert)
            {
                $this->session->set_flashdata('hasil','Tunggu Konfirmasi Dari Admin...');
                redirect('History'); 
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
        }else{
            $this->load->view('peminjaman/create');
        }
    }else{
        $this->session->set_flashdata('hasil','harap isi form dengan baik');
        $data['id_ruang'] = $this->input->post('id_ruang');
        $data['content_view'] = 'v_pinjam_user';
        $this->load->view('template', $data);
    }
        }
    function terima($id_pinjam){
        if(empty($id_pinjam)){
            redirect('peminjaman'); 
        }else{
            $update =  $this->curl->simple_put($this->API.'/peminjaman' . '/'. $id_pinjam); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Berhasil Terima');
            }else
            {
               $this->session->set_flashdata('hasil','Gagal Terima');
            }
            redirect('peminjaman');
        }
    }
    function delete($id){
        if(empty($id)){
            redirect('peminjaman');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/peminjaman', array('id_pinjam'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('peminjaman');
        }
    }
}

