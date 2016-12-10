<?php 
if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Login extends CI_Controller {

    protected $view;
    protected $ctrl_url;
    protected $root_login;

    public function __construct()
    {
        parent::__construct(); 
        $this->load->library('encrypt');
        $this->load->library('subscriber_service');

        $this->view = 'subscribers/login';
        $this->ctrl_url = base_url().'subscribers/login';
        $this->root_login = $this->session->userdata('root_login');
    }
    
    public function index()
    {
        $data = array();
        $data['ctrl_url'] = $this->ctrl_url;
 
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean'); 
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $auth = $this->subscriber_service->_auth($this->input->post()); 

                switch ($auth) {

                    case 'user':

                        $data['Error'] = 'Y';
                        $data['MSG'] = 'User not found';
                        break;

                    case 'password':

                        $data['Error'] = 'Y';
                        $data['MSG'] = 'Password mismatching. Check if CAPS LOCK is on!';
                        break;

                    case 'blocked':

                        $data['Error'] = 'Y';
                        $data['MSG'] = 'Account blocked. Contact admin <a href="mailto:info@360seha.com">Email Now</a>';
                        break;

                    case 'logged':
 
                        redirect(SUBSRIBER_HOME);
                        break;
                    
                    default:
                    
                        $data['Error'] = 'Y';
                        $data['MSG'] = 'No username and password';
                        break;
                }

            }else{

                $data['Error'] = 'Y';
                $data['MSG'] = 'No username and password';
            }

        }
        
        $this->load->view($this->view,$data);
    }

    public function root()
    {
        //Check if its admin direct login
        if($this->root_login)
        {
            $subscriber = $this->subscriber_service->get_subscriber_by_pk($this->encrypt->decode($this->session->userdata('subscriber')));

            $data['subs_logged'] = array(
                'user_id' => $this->encrypt->encode($subscriber->user_id),
                'name' => $subscriber->subs_title,
                'username' => $subscriber->subs_username,
                'subs_type' => $subscriber->subs_type,
                'subs_image' => $subscriber->subs_profile_img,
                'subscriber' => $subscriber->user_id,
                'type' => 'subscriber',
                'validated' => true
            );

            $this->session->set_userdata($data);
            redirect(SUBSRIBER_HOME);
            exit(1);

        }else{

            //If no access token found redirect to login
            $this->index();
        }
    }
}