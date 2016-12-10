<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Social extends Account_Controller {
    
    protected $view;
    protected $table = TBL_CONTACT_US_PAGE;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'social-media';
    }

    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Social Media Page';
        $this->data['sub_title'] = 'Manage your social media details here';
        $this->data['config'] = $this->subscriber_service->get_subscriber_page( $this->encrypt->decode($this->user['user_id']), $this->table);
        
        if($this->input->post())
        {
             $save = array(
                $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                $this->table.'.social_fb_link' => ($this->input->post('social_fb_link') != "") ? $this->input->post('social_fb_link') : NULL,
                $this->table.'.social_tweet_link' => ($this->input->post('social_tweet_link') != "") ? $this->input->post('social_tweet_link') : NULL,
                $this->table.'.social_inst_link' => ($this->input->post('social_inst_link') != "") ? $this->input->post('social_inst_link') : NULL,
                $this->table.'.social_ytube_link' => ($this->input->post('social_ytube_link') != "") ? $this->input->post('social_ytube_link') : NULL,
                $this->table.'.social_google_plus' => ($this->input->post('social_google_plus') != "") ? $this->input->post('social_google_plus') : NULL,
                $this->table.'.social_linked_in' => ($this->input->post('social_linked_in') != "") ? $this->input->post('social_linked_in') : NULL,
                $this->table.'.created_on' => date('Y-m-d H:i:s'),
                $this->table.'.updated_on' => date('Y-m-d H:i:s')
            );    

            $where = array(
                $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id'])
            );

            if($this->subscriber_service->has_page_setting($where, $this->table))
            {
                $this->subscriber_service->set_page_setting( $save, $this->table, $where);                 
            }else{
                $this->subscriber_service->set_page_setting( $save, $this->table);
            }

            $this->session->set_flashdata('message', 'Social Media updated!');
            redirect($this->data['ctrl_url']);
        }
        
        $this->load->view($this->layout, $this->data);
    }
}