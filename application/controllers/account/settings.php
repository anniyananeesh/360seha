<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends AccountController
{
    protected $ctrlUrl;

    public function __construct()
    {
        parent::__construct();

        $this->ctrlUrl = '/account/settings';
    }
    
    public function index()
    {
        $this->data['page'] = 'settings';

        $fields = array(
        	TBL_SUBSCRIBERS.'.published',
            TBL_SUBSCRIBERS.'.subs_uniq_token'
        );  

        $userID = $this->encrypt->decode($this->user['user_id']);

        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->data['published'] = $record->published;

        if($this->input->post())
        {
            $this->data['post'] = $this->input->post();

        	$this->load->library('form_validation');
            $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|xss_clean|callback_validatePassword');  
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|min_length[8]|max_length[12]|matches[confirm_password]|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');

            $this->form_validation->set_message('required','Required %s field');
            $this->form_validation->set_message('matches','Passwords should be the same...!');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
                $pwdHashKey = $this->modelUserAlias->generatePwdHashKey($this->input->post('new_password'), $record->subs_uniq_token);

            	$save = array(
                    TBL_SUBSCRIBERS.'.subs_pwd_hash' => $pwdHashKey,
                    TBL_SUBSCRIBERS.'.r_password' => $this->input->post('new_password'),
                    TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
                ); 

                $where = array(
                	TBL_SUBSCRIBERS.'.user_id' => $userID
                ); 

                $this->modelUserAlias->save( $save, $where);

                $this->session->set_flashdata('message', 'Account settings updated!');
                redirect($this->ctrlUrl); 

            }else{

	        	$this->data['Error'] = 'Y';
	           	$this->data['MSG'] = 'Your form has errors';

	        }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function validatePassword($newPassword)
    {
        $record = $this->modelUserAlias->fetchRowFields(array('subs_pwd_hash','subs_uniq_token'), array('user_id' => (int) $this->encrypt->decode($this->user['user_id'])));

        $pwdHashKey = $this->modelUserAlias->generatePwdHashKey($newPassword, $record->subs_uniq_token);

        if($pwdHashKey == $record->subs_pwd_hash)
        {
            return true;
        }else{
            $this->form_validation->set_message('validatePassword', 'Your current password not matching');
            return false;
        }
        
    }

}