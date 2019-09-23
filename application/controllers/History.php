<?php
Class History extends CI_Controller{

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
        if($this->session->userdata('level')=='siswa'){
            $id_user = $this->session->userdata('id_user');
            if($id_user != null){
                $data['content_view'] = 'v_history';
                $data['datahistory'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/notif'. '/'. $id_user));
                $this->load->view('template',$data);
            }
        }else{
            $data['content_view'] = 'v_history_admin';
            $data['datahistory'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/history'));
            $this->load->view('template',$data);
        }
        
    }
    function kembali($id_pinjam){
        if(empty($id_pinjam)){
            redirect('history'); 
        }else{
            $update =  json_decode($this->curl->simple_put($this->API.'/DetilRuang' . '/'. $id_pinjam)); 
            if($update == 0||$update==50000)
            {
                $this->session->set_flashdata('hasil','Telah berhasil kembalikan, denda: '.$update);
            }else
            {
                $this->session->set_flashdata('hasil','Gagal');
            }
            redirect('history');
        }
    }
    function delete($id_pinjam){
        if(empty($id_pinjam)){
            redirect('history');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/peminjaman'.'/'.$id_pinjam); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('history');
        }
    }
    }



   
