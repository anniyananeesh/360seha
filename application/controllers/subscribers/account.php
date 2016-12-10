<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Account extends Account_Controller {

    protected $table = TBL_SUBSCRIBERS;
    protected $view;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'account'; 
    }

    public function index()
    {  
        $this->data['content'] = $this->view.'/account';
        $this->data['title'] = 'Add username and password';
        $this->data['sub_title'] = 'Setup the subcriber login details here';

        $post['username'] = ($this->data['user_details']->subs_username != NULL) ? $this->data['user_details']->subs_username : '';
        $post['r_password'] = ($this->data['user_details']->r_password != NULL) ? $this->data['user_details']->r_password : '';
        $this->data['post'] = $post;

        if($this->input->post())
        { 
            $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_validate_username');
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|matches[cpassword]|required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
            $this->form_validation->set_message('required','Required %s field');
            $this->form_validation->set_message('matches','Passwords should be the same...!');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
                $this->load->model('auth_model');
                $uniq_token = $this->auth_model->generate_unique_token($this->input->post('username'));
                $pwd_hash = $this->auth_model->generate_password_hash($this->input->post('password'),$uniq_token);
                
                $save = array(
                    $this->table.'.subs_username' => $this->input->post('username'),
                    $this->table.'.subs_pwd_hash' => $pwd_hash,
                    $this->table.'.subs_uniq_token' => $uniq_token,
                    $this->table.'.r_password' => $this->input->post('password')
                );
                
                $where = array(
                    $this->table.'.user_id' => $this->encrypt->decode($this->user['user_id'])
                );

                $this->subscriber_service->save($save,$where);
                $this->session->set_flashdata('message', 'Login details setup successfully!');
                redirect($this->data['ctrl_url']);

            }
            
        }
        
        $this->load->view($this->layout, $this->data);
    } 

    public function send()
    {
        $user = $this->data['user_details'];

        $this->load->library('mail_service');

        $mentry = array(

            "from" => 'info@360seha.com',
            "from_name" => '360Seha Signup information',
            "reply_to" => 'no-reply@360seha.com',
            "reply_title" => 'No reply',
            "subject" => $user->subs_title. ' Account details for 360seha',
            "alt_body" => "Plain text message",
            "to" => $user->subs_email,
            "to_title" => $user->subs_title
        );

        $query = array(
            "subs_title" => $user->subs_title,
            "username" => $user->subs_username,
            "password" => $user->r_password,
            "url" => base_url().'subscribers/login'
        );

        $template = PROFILE_VIEW.'email_templates/send_account_info';
        $this->mail_service->Send( $query, $template, $mentry);

        $this->session->set_flashdata('message', 'Login details has been send successfully!');
        redirect($this->data['ctrl_url']);
    }

    public function validate_username($str)
    {
        $where = array(
            $this->table.'.subs_username' => $str,
            $this->table.'.user_id !=' => $this->encrypt->decode($this->user['user_id'])
        );

        if($this->subscriber_service->has_username($where))
        {
            $this->form_validation->set_message('validate_username', 'Wait ! somebody already took this username :( | Try another one ...');
            return false;
        }else{
            return true;
        }

    }
}