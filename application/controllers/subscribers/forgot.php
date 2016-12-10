<?php 
if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Forgot extends CI_Controller {

    protected $view;
    protected $ctrl_url;
    protected $root_login;

    public function __construct()
    {
        parent::__construct(); 
        $this->load->library('encrypt');
        $this->load->library('subscriber_service');

        $this->view = 'subscribers/forgot';
        $this->ctrl_url = base_url().'subscribers/login';
        $this->root_login = $this->session->userdata('root_login');
    }
    
    public function index()
    {
    	$data['title'] = 'Forgot your password - Don\'t Worry'; 
    	$data['ctrl_url'] = $this->ctrl_url;

    	if($this->input->post()){

    		$this->load->library('form_validation');
            $this->form_validation->set_rules('reg_email', 'Registered Email', 'trim|required|valid_email|callback_validate_email');
            $this->form_validation->set_message('required','Hey! Where is your mail id?');
            $this->form_validation->set_message('valid_email','Hey! check your mail id?');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
            	$this->load->model('auth_model');
            	$where = array('subs_email'=>$this->input->post('reg_email'));
            	$user = $this->subscriber_service->get_subscriber_row($where);

            	$newpass = $this->subscriber_service->rst_user_pwd( $user->user_id, $user->subs_username);
            	$query['username'] = $user->subs_email;
                $query['new_pass'] = $newpass;

                $this->mail_password_recover($query);

                $this->session->set_flashdata('message', 'Gotcha! <br/> We have just send a mail to <b>'.(string) $this->input->post('reg_email').'</b> <br/>with the reset password!');
           		redirect('/subscribers/forgot'); 

            }

    	}

    	$this->load->view($this->view, $data);
    }

    public function validate_email($str){

        $where = array(
          	'subs_email' => $str
        );

        if($this->subscriber_service->has_username($where))
        {
            return true;
        }else{
        	$this->form_validation->set_message('validate_username', 'NO user found');
            return false;
        }

    }

    public function mail_password_recover($query)
    {
        
        $this->load->library('parser');
        $this->load->library('My_PHPMailer');
        $this->output->enable_profiler(FALSE);
        
        $html = $this->parser->parse(ADMIN_URL.'newsletter_templates/recover-password', $query, TRUE); //TRUE no buffer output
            
        $mail = new PHPMailer();
        $mail->IsSMTP();            // we are going to use SMTP
        $mail->isHTML(true);
        $mail->SMTPAuth   = true;   // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "arun.gopi@reflectionsinfos.com";  // user email address
        $mail->Password   = "godislove101";        // password in GMail
        $mail->SetFrom( 'some-one@360seha.com', 'Account password changed');  //Who is sending the email
        $mail->AddReplyTo( "no-reply@360seha.com", "No Reply");  //email address that receives the response
        $mail->Subject    = 'Your account password has been changed';
        $mail->Body      =  $html;
        $mail->AltBody    = "Plain text message";
        $mail->AddAddress( $query['username'], "Support Desk 360seha.com");
        
        if(!$mail->Send()){
                
            return true;
        } else {
            return true;
        }
    }

}