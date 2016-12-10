<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
	protected $rootLogin;

    public function __construct()
    {
        parent::__construct();
        $this->rootLogin = $this->session->userdata('root_login');
    }

    public function index()
    {
    	if($this->rootLogin)
        {
        	$this->load->model('admin/subscriber_model','modelUserAlias');

        	$userDetails = $this->modelUserAlias->fetchRowFields(array('user_id','subs_title','subs_username') ,array('user_id' => (int) $this->encrypt->decode($this->session->userdata('subscriber'))));

        	//Redirect to account page for further steps
	   		$sessionData['user_logged'] = array(
	        	'user_id' => $this->encrypt->encode($userDetails->user_id),
	          	'name' => $userDetails->subs_title,
	          	'username' => $userDetails->subs_username,
	           	'type' => 'subscriber',
	           	'validated' => true
	     	); 
	                    
	     	$this->session->set_userdata($sessionData); 
	        
	        redirect(ACCOUNT_PAGE);

        }

    }

}