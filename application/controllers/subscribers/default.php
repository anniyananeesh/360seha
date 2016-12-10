<?php 

if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Default extends CI_Controller {

    public $layout;
    public $menu_access;

    public function __construct()
    {

        parent::__construct();
        $this->layout = SUBSCRIBER_LAYOUT;

        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('subscriber_service');
        
        $userSession = $this->session->userdata('subs_logged_in');
 
        if (empty($userSession)) {
            
            $this->session->set_userdata('refered_from', current_url());
            redirect(SUBSRIBER_LOGIN_URL);
        }
        
        $this->user = $userSession;
        $this->root_login = $this->session->userdata('root_login');        
        $this->menu_access = $this->subscriber_service->get_subscriber_menu_access($this->encrypt->decode($this->user['subs_user_id']));
    }
 
}