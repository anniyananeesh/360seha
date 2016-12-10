<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends AccountController
{
	protected $ctrlUrl;

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = '/forgot';
    }
    
    public function index()
    {
        $this->data['page'] = 'forgot';

        $post['username'] = '';
        $this->data['post'] = $post;

        $fields = array(TBL_SUBSCRIBERS.'.subs_uniq_token', TBL_SUBSCRIBERS.'.subs_email', TBL_SUBSCRIBERS.'.subs_title');
        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));

        if($this->input->post())
        {
        	$this->data['post'] = $this->input->post();

        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_validateUsername');
        	$this->form_validation->set_error_delimiters('', '');

        	if($this->form_validation->run() == TRUE)
            {
            	$resetPwd = $this->modelUserAlias->generateRandomPwdString();
                $pwdHashKey = $this->modelUserAlias->generatePwdHashKey($resetPwd, $record->subs_uniq_token);

                $save = array(
                    TBL_SUBSCRIBERS.'.subs_pwd_hash' => $pwdHashKey,
                    TBL_SUBSCRIBERS.'.r_password' => $resetPwd,
                    TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
                ); 

                $where = array(
                	TBL_SUBSCRIBERS.'.user_id' => $userID
                ); 

                $this->modelUserAlias->save( $save, $where);

                $newPassword = $resetPwd;
                $userTitle = $record->subs_title;

                $this->load->library('email');
               	$this->config->load('email',true);
              	$this->email->from(INFO_EMAIL);
            	$this->email->to($record->subs_email);
           		$this->email->subject(SITE_NAME.' - Password has been reset');

           		include_once(MISC_PATH."/emails.php");
            	$message = $reset_password_email;

            	$this->email->message($message);

            	if ($this->email->send())
            	{
            		$this->session->set_flashthis->data('message', 'Reset password has been send to your registered email!');
                	redirect($this->ctrlUrl);

            	}else
            	{
            		$this->data['Error'] = 'Y';
                	$this->data['MSG'] = 'Your form has errors';
            	}

            }else{

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Your form has errors';

            }

        }

        $this->load->view($this->layout, $this->data);
    } 

    public function validateUsername($username)
    {
        if($this->modelUserAlias->isExist(array('subs_username'=>$username)))
        {
            return true;
        }else{
            $this->form_validation->set_message('validateUsername', 'User not found');
            return false;
        }
    }

}