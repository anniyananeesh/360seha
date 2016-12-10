<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends AccountController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
       $this->data['page'] = 'signin';

       if($this->input->post())
       {

       		$this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

            	$fields = array(
		        	TBL_SUBSCRIBERS.'.user_id',
		        	TBL_SUBSCRIBERS.'.subs_title',
		        	TBL_SUBSCRIBERS.'.subs_username',
		        	TBL_SUBSCRIBERS.'.subs_pwd_hash',
		        	TBL_SUBSCRIBERS.'.r_password',
		        	TBL_SUBSCRIBERS.'.subs_uniq_token',
		        	TBL_SUBSCRIBERS.'.status'
		        ); 

            	$userDetails = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.subs_username' => $this->input->post('username')));
 
            	if($userDetails->status == 1)
            	{

            		$pwdHashKey = $this->modelUserAlias->generatePwdHashKey($this->input->post('password'), $userDetails->subs_uniq_token);

            		if($pwdHashKey === $userDetails->subs_pwd_hash)
            		{
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

            		}else{

            			$this->data['Error'] = 'Y';
	           			$this->data['MSG'] = 'Password not matching';
            		}

            	}else{

            		$this->data['Error'] = 'Y';
	           		$this->data['MSG'] = 'Account is disabled by administrator.';

            	}

            }

       }

       $this->load->view($this->layout, $this->data);
    } 

}