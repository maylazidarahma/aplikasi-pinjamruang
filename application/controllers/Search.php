<?php
Class Search extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    function index_post(){
            $data = array(
                'nama_ruang'              => $this->input->post('nama_ruang'));
            $insert['dataruang'] =  json_decode($this->curl->simple_post($this->API.'/Search', $data, array(CURLOPT_BUFFERSIZE => 10)));    
            $insert['content_view'] = 'dashboard_view';
            $this->load->view('template', $insert);
        }
}