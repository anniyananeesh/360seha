<?php

class Account_Controller extends CI_Controller
{
    public $layout; 
    public $user; 
    public $data;
 
    function __construct()
    {
        parent::__construct();
        $this->layout = SUBSCRIBER_LAYOUT;

        $this->load->library('subscriber_service');
        $this->user = $this->session->userdata('subs_logged');

        if (empty($this->user)) {

	      	$this->session->set_userdata('refered_from', current_url());
            redirect(SUBSRIBER_LOGIN_URL);
        }

        $this->data['root_login'] = $this->session->userdata('root_login');
        $this->data['menu_access'] = $this->subscriber_service->get_subscriber_menu_access($this->encrypt->decode($this->user['user_id']));
        $this->data['user_details'] = $this->subscriber_service->get_subscriber_by_pk($this->encrypt->decode($this->user['user_id']));
        $this->data['ctrl_url'] = base_url().SUBSRIBER_URL.strtolower($this->router->fetch_class());
    }

}