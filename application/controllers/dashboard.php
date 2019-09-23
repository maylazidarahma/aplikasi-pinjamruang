<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
	}
	
	public function index($kategori)
	{
		if($this->session->userdata('login_status') == TRUE){
			$data['content_view'] = 'dashboard_view';
			if($kategori == "admin"){
				$data['count'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/count'));
				$this->load->view('template', $data);
			}
			else if($kategori == "indoor"){
			$data['dataruang'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/ruang'.'/'.$kategori));
			$this->load->view('template', $data);
			}
			else{
			$data['dataruang'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/ruang'.'/'.$kategori));
			$this->load->view('template', $data);
			}
		}
		else{
		redirect('login');
		}
	}
	

}