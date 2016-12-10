<?php 

if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Errors extends CI_Controller {
    
    public $layout;
    
    public function __construct(){
        
        parent::__construct();
        $this->layout = ADMIN_LAYOUT;
        
        $this->load->library('session');
        $userSession = $this->session->userdata('logged_in');
        if (empty($userSession)) {
            $this->session->set_userdata('refered_from', current_url());
            redirect(ADMIN_LOGIN_URL);
        }
        $this->user = $userSession;        
        $this->_menu_item = 'city';
        
    }

    public function access_denied()
    {
        $this->load->view(ADMIN_URL.'errors/denied');
    }    
}