<?php 
if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class User extends Account_Controller{
    
    protected $views;
    protected $ctrl_url;

    public function __construct()
    {
        parent::__construct(); 
        $this->views = SUBSRIBER_URL.'user';
        $this->ctrl_url = SUBSRIBER_URL.'user';
    }
 
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(SUBSRIBER_LOGIN_URL);
    }
    
    //Landing page for subscriber login
    public function about_us()
    {
        $data['content'] = $this->views.'/about_us';
        $data['title'] = 'About Us Page';
        $data['sub_title'] = 'Manage your about us page';
        $data['post'] = $this->subscriber_service->get_subscriber_by_pk($this->encrypt->decode($this->user['user_id']));
        
        if($this->input->post())
        { 
            $save = array(
                TBL_SUBSCRIBERS.'.description_en_long' => (User::get_instance()->input->post('description_en_long')) ? User::get_instance()->input->post('description_en_long') : NULL,
                TBL_SUBSCRIBERS.'.description_en_long_ar' => (User::get_instance()->input->post('description_en_long_ar')) ? User::get_instance()->input->post('description_en_long_ar') : NULL,
            );

            $where = array(
                TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($this->user['user_id'])
            );
            
            $this->subscriber_service->save($save,$where);
            $this->session->set_flashdata('message', 'About Page updated!');
            redirect($this->ctrl_url.'/about_us');

        }
        
        $this->load->view($this->layout, $data);
    }

}