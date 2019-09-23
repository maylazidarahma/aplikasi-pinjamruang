<?php
Class Admin extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    function index(){
        $data['content_view'] = 'v_admin';
        $data['dataadmin'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/admin'));
        $this->load->view('template', $data);
    }
    function create(){

            $this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == TRUE)
		{
        if(isset($_POST['submit'])){
            $data = array(
                'id_user'               => $this->input->post('id_user'),
                'nama'                  => $this->input->post('nama'),
                'username'              => $this->input->post('username'),
                'password'              => $this->input->post('password'));
            $insert =  $this->curl->simple_post($this->API.'/admin', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('admin');
        }else{
            $this->load->view('admin/create');
        }
    }else{
        $this->session->set_flashdata('hasil', validation_errors());
				redirect('admin');
        }
    }
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_user'              => $this->input->post('ubah_id_user'),
                'nama'                  => $this->input->post('ubah_nama'),
                'username'              => $this->input->post('ubah_username'),
                'password'              => $this->input->post('ubah_password'));
            $update =  $this->curl->simple_put($this->API.'/admin', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('admin');
        }else{
            $params = array('id_user'=>  $this->uri->segment(3));
            $data['dataadmin'] = json_decode($this->curl->simple_get($this->API.'/admin',$params));
            $this->load->view('admin/edit',$data);
        }
    }
    function delete($id_user){
        if(empty($id_user)){
            redirect('admin');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/admin'.'/'. $id_user); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('admin');
        }
    }
}


  