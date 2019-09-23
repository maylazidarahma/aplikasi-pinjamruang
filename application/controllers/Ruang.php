<?php
Class Ruang extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        // $this->load->library('form_validation');
    }

    function index(){
        $data['content_view'] = 'v_ruang';
        $data['dataruang'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/ruang/indoor'));
        $data['dataruang2'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/ruang/outdoor'));
        $data['datakat'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/kategori'));
        $data['datadetil'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/DetilRuangUbah'));
        $this->load->view('template',$data);
    }
    function get_detil(){
        
    }
    function create(){

        // $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'trim|required');
        // $this->form_validation->set_rules('gambar', 'Gambar', 'trim|required');
		// $this->form_validation->set_rules('status_pinjam', 'Status Pinjam', 'trim|required');
        // $this->form_validation->set_rules('id_kat', 'Kategori', 'trim|required');
        // $this->form_validation->set_rules('id_detil', 'Detail', 'trim|required');

        // if($this->form_validation->run() == TRUE) 
        // {
        if(isset($_POST['submit'])){
        $uploaddir='./assets/images/ruang/';
        $file_name = $_FILES['gambar']['name'];
        $uploadfile = $uploaddir.$file_name;
        if(move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)){
                $data = array(
                    'nama_ruang'    => $this->input->post('nama_ruang'),
                    'gambar'        => $file_name,
                    'status_pinjam' =>$this->input->post('status_pinjam'),
                    'id_kat'        => $this->input->post('id_kat'),
                    'id_detil'      => $this->input->post('id_detil'));
    
                $insert =  $this->curl->simple_post($this->API.'/ruang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
                if($insert)
                {
                    $this->session->set_flashdata('hasil','Insert Data Berhasil');
                }else
                {
                   $this->session->set_flashdata('hasil','Insert Data Gagal');
                }
                redirect('ruang');
            }else{
                $this->load->view('ruang/create');
            }
        
        // }else{
        //     $this->session->set_flashdata('hasil', validation_errors());
        //         redirect('ruang');
        // }
    }
    }

    function edit(){
        if(isset($_POST['submit'])){
            $get = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/DetilRuang'.'/'.$this->input->post('id_ruang')));
            foreach($get as $l){
            if($_FILES['gambar']['name']!= ""){
                $uploaddir='./assets/images/ruang/';
                $file_name = $_FILES['gambar']['name'];
                $uploadfile = $uploaddir.$file_name;
                if(move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)){
                    $data = array(
                        'id_ruang'           => $this->input->post('id_ruang'),
                        'nama_ruang'         => $this->input->post('nama_ruang'),
                        'gambar'             => $file_name,
                        'status_pinjam'      =>$this->input->post('status_pinjam'),
                        'id_kat'             => $this->input->post('id_kat'),
                        'id_detil'           => $this->input->post('id_detil'));
                    $update =  $this->curl->simple_put($this->API.'/ruang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
                    if($update)
                    {
                        $this->session->set_flashdata('hasil','Update Data Berhasil');
                    }else
                    {
                       $this->session->set_flashdata('hasil','Update Data Gagal');
                    }
                    redirect('ruang');
                }
            }else if($_FILES['gambar']['name']==""){
                    $data = array(
                        'id_ruang'           => $this->input->post('id_ruang'),
                        'nama_ruang'         => $this->input->post('nama_ruang'),
                        'gambar'             => $l->gambar,
                        'status_pinjam'      =>$this->input->post('status_pinjam'),
                        'id_kat'             => $this->input->post('id_kat'),
                        'id_detil'           => $this->input->post('id_detil'));
                    $update =  $this->curl->simple_put($this->API.'/ruang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
                    if($update)
                    {
                        $this->session->set_flashdata('hasil','Update Data Berhasil');
                    }else
                    {
                       $this->session->set_flashdata('hasil','Update Data Gagal');
                    }
                    redirect('ruang');
            }
           }
        }
        else{
            $params = array('id_ruang'=>  $this->uri->segment(3));
            $data['dataruang'] = json_decode($this->curl->simple_get($this->API.'/ruang',$params));
            $this->load->view('ruang/edit',$data);
        }
    }

    function delete($id_ruang){
        if(empty($id_ruang)){
            redirect('ruang');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/ruang'.'/'. $id_ruang); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('ruang');
        }
    }
}
    
