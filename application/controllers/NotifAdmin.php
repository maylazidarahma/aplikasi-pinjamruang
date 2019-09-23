<?php
Class NotifAdmin extends CI_Controller{

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
        $data['datapinjam'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/Peminjaman'));
        $this->load->view('v_history_admin',$data);
    }
}