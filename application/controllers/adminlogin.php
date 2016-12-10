<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Controller
{
    public $layout;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('auth_model');
        $this->layout = ADMIN_LAYOUT;
    }
    
    public function index()
    {
        $data = array();
        
        if($this->input->post())
        {
            $this->auth_model->_auth($this->input->post(), "AD");
            if($this->input->post('username') == '' || $this->input->post('password') == '')
            {
                $data['message'] = 'Where is your login credential?';
            }else if($this->auth_model->_auth($this->input->post(), "AD")){
                redirect(ADMIN_URL.'user/dashboard');
            }
        }
        
        //If have user session... move to dashboard
        $userSession = $this->session->userdata('logged_in');
        if ($userSession)
        {
            redirect(ADMIN_URL.'user/dashboard');
        }
        
        $this->load->view(ADMIN_URL.'user/login', $data);
    }

}