<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Profile extends Account_Controller {
    
    protected $view;
    protected $table = TBL_SUBSCRIBERS;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'account';
    } 
    
    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Change your password';
        $this->data['sub_title'] = 'Manage your account details here';
        $this->data['menu'] = 'settings';
        $this->data['partial'] = 'change_password';
        
        $id = $this->encrypt->decode($this->user['user_id']);
        $record = $this->subscriber_service->get_subscriber_by_pk($id);
        
        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('current_pass', 'Current Password', 'trim|required|callback_validate_pwd');
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|matches[cpassword]|required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
            $this->form_validation->set_message('required','Required %s field');
            $this->form_validation->set_message('matches','Passwords should be the same...!');
            $this->form_validation->set_error_delimiters('', '');
 
            if($this->form_validation->run() == TRUE)
            { 
                $this->load->model('auth_model');
                $pwd_hash = $this->auth_model->generate_password_hash( $this->input->post('password'), $record->subs_uniq_token);
                
                $save = array(
                    $this->table.'.subs_pwd_hash' => $pwd_hash,
                    $this->table.'.r_password' => $this->input->post('password')
                );
                
                $where = array(
                    $this->table.'.user_id' => $id
                );
                
                if($this->subscriber_service->save( $save, $where))
                {
                    $this->session->set_flashdata('message', 'Your account password has been changed...!');
                    redirect($this->data['ctrl_url']);
                }
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }
    
    public function validate_pwd($str)
    {
        $this->load->model('auth_model');
        $id = $this->encrypt->decode($this->user['user_id']);
        $record = $this->subscriber_service->get_subscriber_by_pk($id);
        
        $pwd_hash = $this->auth_model->generate_password_hash( $str, $record->subs_uniq_token);

        $where = array(
            $this->table.'.subs_pwd_hash' => $pwd_hash,
            $this->table.'.user_id' => $id 
        );
        
        if(!$this->subscriber_service->get_subscriber_row($where))
        {
            $this->form_validation->set_message('validate_pwd', 'Your current password is invalid');
            return false;
       	}else{
            return true;
     	}
    }
}