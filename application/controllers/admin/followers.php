<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Followers extends MY_Controller {

    protected $ctrlUrl;
    protected $classViews = 'admin/followers/';

    public function __construct()
    {
        parent::__construct(); 
        $this->ctrlUrl = HOST_URL.'/admin/followers/';
        $this->load->library('subscription_service');
        $this->load->library('subscriber_service');
    } 

    public function index()
    {
        $data = array();
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Subscriber Followers List';
        $data['records'] = FALSE;
        $data['userId'] = FALSE;
        $data['users'] = $this->subscriber_service->get_subscribers(array(TBL_SUBSCRIBERS.'.published' => 1));
 
        if($this->input->post())
        {
            $data['records'] = $this->subscription_service->get_followers_by_subscriber($this->encrypt->decode($this->input->post('user')));
            $data["userId"] = $this->encrypt->decode($this->input->post('user'));
        }
 
        $this->load->view($this->layout, $data);
    }

    public function export($userId = '')
    {
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=exceldata.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->library('subscription_service');
        $this->load->library('subscriber_service');
        
        $data = array();
        $data['records'] = false;
        
        if($userId != "")
        {
            $data['records'] = $this->subscription_service->get_followers_by_subscriber((int) $userId);
        }
 
        $this->load->view(ADMIN_URL.'followers/export', $data);
    }

}