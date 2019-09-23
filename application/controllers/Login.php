<?php
Class Login extends CI_Controller{

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
        $this->load->view('v_login');
    }
    public function forgot_password()
     {
         $email = $this->uri->segment(3);

         echo 'Saya Lupa Password, email saya : '. $email;
     }
    function index_post(){

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == TRUE)
    {

        if(isset($_POST['submit'])){
            $data = array(
                'username'              => $this->input->post('username'),
                'password'              => $this->input->post('password'));
            $insert =  json_decode($this->curl->simple_post($this->API.'/login', $data, array(CURLOPT_BUFFERSIZE => 10))); 
            
            if($insert != 'gagal')
            {
                foreach($insert as $ins){
                    $data_session = array(
                        'id_user' => $ins->id_user,
                        'username'  => $ins->username,
                        'login_status' => TRUE,
                        'level'	    => $ins->nama_lvl
                    );
                $this->session->set_userdata($data_session);
                }
                $this->session->set_flashdata('hasil','Login Berhasil');
                if($this->session->userdata('level')=="admin"){
                    redirect('dashboard/index/admin');
                }else{
                    redirect('dashboard/index/indoor');
                }
               
            }else
            {
               $this->session->set_flashdata('hasil','Username atau Password salah!');
               redirect('login'); 
            }
        }else{
            $this->load->view('login'); 
        }
    }else{
        $this->session->set_flashdata('hasil', validation_errors());
				redirect('login');
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}

   