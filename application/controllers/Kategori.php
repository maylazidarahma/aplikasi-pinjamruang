<?php
Class Kategori extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    function index(){
        $data['content_view'] = 'v_kategori';
        $data['datakat'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/kategori'));
        $this->load->view('template',$data);
    }
    function create(){
        $this->form_validation->set_rules('nama_kat', 'Nama Kategori', 'trim|required');
		
        if($this->form_validation->run() == TRUE){
        if(isset($_POST['submit'])){
            $data = array(
                'id_kat'                => $this->input->post('id_kat'),
                'nama_kat'              => $this->input->post('nama_kat'));
            $insert =  $this->curl->simple_post($this->API.'/kategori', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('kategori');
        }else{
            $this->load->view('kategori/create');
        }
    }else{
        $this->session->set_flashdata('hasil', validation_errors());
			redirect('kategori');
    }
    }
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_kat'        =>  $this->input->post('ubah_id_kat'),
                'nama_kat'      =>  $this->input->post('ubah_nama_kat'));
            $update =  $this->curl->simple_put($this->API.'/kategori', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('kategori');
        }else{
            $params = array('id_kat'=>  $this->uri->segment(3));
            $data['datakat'] = json_decode($this->curl->simple_get($this->API.'/kategori',$params));
            $this->load->view('kategori/edit',$data);
        }
    }
    function delete($id_kat){
        if(empty($id_kat)){
            redirect('kategori');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/kategori'.'/'. $id_kat); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('kategori');
        }
    }
}
