<?php 

if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class User extends CI_Controller {

    public $layout;

    public function __construct(){

        parent::__construct();
        $this->layout = ADMIN_LAYOUT;
        $this->_menu_item = 'user';
    }
    
    public function dashboard(){
        
        $this->load->model('getip_model');
        $this->load->library('user_service');
        $this->load->library('category_service');
        $this->load->library('subscriber_service');
        $this->load->library('patient_service');
        
        $data['ips'] = $this->getip_model->get();
        
        $join = array(
            
            array('table' => TBL_USER_GROUPS, 'condition' => TBL_USER_GROUPS.'.grp_id = '.TBL_USERS.'.grp_id', 'join_type' => 'inner'),
            array('table' => TBL_USERS_ROLES, 'condition' => TBL_USER_GROUPS.'.grp_role_id = '.TBL_USERS_ROLES.'.role_id', 'join_type' => 'inner')
        );
        
        $order_by = array(
            TBL_USERS.'.user_id' => 'ASC'
        );
        
        $data['users'] = $this->user_service->get_users( array(), $order_by, NULL, NULL, $join);
        $data['cats'] = $this->category_service->get_categories();
        
        $where_drs = array(
            TBL_SUBSCRIBERS.".subs_type" => 1
        );
        $where_mcs = array(
            TBL_SUBSCRIBERS.".subs_type" => 2
        );
        $where_comps = array(
            TBL_SUBSCRIBERS.".subs_type" => 3
        );
        
        
        $join = array(
            array('table' => TBL_CATEGORY, 'condition' => TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'join_type' => 'inner')
        );

        $data['drs'] = $this->subscriber_service->get_subscribers($where_drs, array(), null, null, $join);
        $data['mcs'] = $this->subscriber_service->get_subscribers($where_mcs, array(), null, null, $join);
        $data['comps'] = $this->subscriber_service->get_subscribers($where_comps, array(), null, null, $join);
        $data['subscribers'] = $this->subscriber_service->get_subscribers(array(), array(), 10, null, $join);
        $data['patients'] = $this->patient_service->get_patients();
        $data['queries'] = $this->subscriber_service->get_query();
        
        $data['content'] = 'admin/user/dashboard';
        $this->load->view($this->layout, $data);
    }
    
    public function unique_visits()
    {
        $this->load->model('getip_model');
        
        $data['records'] = $this->getip_model->get();
        $data['title'] = 'IPs: Unique visits';
        $data['content'] = 'admin/user/unique_visits';
        
        $this->load->view($this->layout, $data);
    }
    
    public function index()
    {
        
        $data = array();
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_view'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $this->check_login();                       //Checking for user login
        
        $data['content'] = 'admin/user/index';
        $data['title'] = 'User Management';
        
        $this->load->library('user_service');
        $this->load->library('encrypt');
        
        $join = array(
            
            array('table' => TBL_USER_GROUPS, 'condition' => TBL_USER_GROUPS.'.grp_id = '.TBL_USERS.'.grp_id', 'join_type' => 'inner'),
            array('table' => TBL_USERS_ROLES, 'condition' => TBL_USER_GROUPS.'.grp_role_id = '.TBL_USERS_ROLES.'.role_id', 'join_type' => 'inner')
        );
        
        $order_by = array(
            TBL_USERS.'.user_id' => 'ASC'
        );
        
        if(User::get_instance()->input->post()){
            
            $where = array(
                TBL_USERS.".user_name" => User::get_instance()->input->post('user')
            );
            
            $data['records'] = $this->user_service->get_users($where, $order_by, NULL, NULL, $join);
            
        }else{
            
            $data['records'] = $this->user_service->get_users( array(), $order_by, NULL, NULL, $join);
        }

        $this->load->view($this->layout, $data);
        
    }
    
    public function create()
    {
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_create'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data = array();
        
        $this->check_login();                       //Checking for user login
        
        $data['content'] = 'admin/user/add';
        $data['title'] = 'User Management - New User';
        $data['sub_title'] = 'Set up a new user here';
        
        $this->load->library('user_service');
        $data['groups'] = $this->user_service->get_user_groups();
        
        if(User::get_instance()->input->post())
        {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            
            $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|callback_validate_username');
            $this->form_validation->set_rules('pwd', 'Password', 'trim|xss_clean|min_length[8]|max_length[12]|matches[cfrm_pwd]|required');
            $this->form_validation->set_rules('cfrm_pwd', 'Confirm Password', 'trim|required|xss_clean');
            
            $this->form_validation->set_rules('grp', 'User Group', 'trim|required|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                $this->load->model('auth_model');
                $uniq_tok = $this->auth_model->generate_unique_token(User::get_instance()->input->post('user_name'));
                $pwd_hash = $this->auth_model->generate_password_hash( User::get_instance()->input->post('pwd'), $uniq_tok);
                
                $save = array(
                    
                    TBL_USERS.'.first_name' => User::get_instance()->input->post('first_name'),
                    TBL_USERS.'.last_name' => User::get_instance()->input->post('last_name'),
                    TBL_USERS.'.user_name' => User::get_instance()->input->post('user_name'),
                    TBL_USERS.'.email' => User::get_instance()->input->post('email'),
                    TBL_USERS.'.password' => $pwd_hash,
                    TBL_USERS.'.unique_token' => $uniq_tok,
                    TBL_USERS.'.user_status' => 1,
                    TBL_USERS.'.grp_id' => User::get_instance()->input->post('grp'),
                    TBL_USERS.'.created' => date('Y-m-d H:i:s')
                );
                
                $this->user_service->save($save);
                
                //If notify email checkbox enabled .... send an email to user mail id
                if(User::get_instance()->input->post('notify'))
                {
                    
                    //Mail code pending here .. need create a mail library
                    
                }
                
                $this->session->set_flashdata('message', 'Created!');
                redirect(ADMIN_URL.'user/');
            }
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    
    public function edit($id)
    {
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_edit'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data = array();
        
        $this->check_login();                       //Checking for user login
        
        $data['content'] = 'admin/user/edit';
        $data['title'] = 'User Management - Update User';
        $data['sub_title'] = 'Update user details here';
        
        $this->load->library('user_service');
        $this->load->library('encrypt');
        
        $id = $this->encrypt->decode($id);
        
        $data['record'] = $this->user_service->get_user_by_pk($id);
        $data['groups'] = $this->user_service->get_user_groups();
        
        if(User::get_instance()->input->post())
        {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            
            if(User::get_instance()->input->post('pwd') != "")
            {
                $this->form_validation->set_rules('pwd', 'Password', 'trim|xss_clean|min_length[8]|max_length[12]|matches[cfrm_pwd]|required');
                $this->form_validation->set_rules('cfrm_pwd', 'Confirm Password', 'trim|required|xss_clean');
            }
            
            $this->form_validation->set_rules('grp', 'User Group', 'trim|required|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                $this->load->model('auth_model');
 
                $save = array(
                    
                    TBL_USERS.'.first_name' => User::get_instance()->input->post('first_name'),
                    TBL_USERS.'.last_name' => User::get_instance()->input->post('last_name'),
                    TBL_USERS.'.email' => User::get_instance()->input->post('email'),
                    TBL_USERS.'.user_status' => 1,
                    TBL_USERS.'.grp_id' => User::get_instance()->input->post('grp'),
                    TBL_USERS.'.created' => date('Y-m-d H:i:s')
                );
                
                if(User::get_instance()->input->post('pwd') != "")
                {
                    $uniq_tok = $this->auth_model->generate_unique_token(User::get_instance()->input->post('user_name'));
                    $pwd_hash = $this->auth_model->generate_password_hash( User::get_instance()->input->post('pwd'), $uniq_tok);
                    
                    $save[TBL_USERS.'.password'] = $pwd_hash;
                    $save[TBL_USERS.'.unique_token'] = $uniq_tok;
                }                
                
                $where = array(
                    TBL_USERS.'.user_id' => $id
                );
                
                $this->user_service->save( $save, $where);
                
                //If notify email checkbox enabled .... send an email to user mail id
                if(User::get_instance()->input->post('notify'))
                {
                    
                    //Mail code pending here .. need to create a mail library
                    
                }
                
                $this->session->set_flashdata('message', 'Created!');
                redirect(ADMIN_URL.'user/');
            }
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    
    public function delete($id)
    {
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_delete'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $this->load->library('encrypt');
        $this->load->model('user_service');
        
        $id = $this->encrypt->decode($id);        
        $record = $this->user_service->get_user_by_pk($id);
        
        if(!$record){
            
            show_404();
        }else{
            
            $where = array(
                TBL_USERS.'.user_id' => $id
            );
            
            //Delete from the table after its found
            if($this->user_service->delete($where))
            {
                $this->session->set_flashdata('message', 'Deleted!');
                redirect( ADMIN_URL.'user/');              
            }else{
                
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect( ADMIN_URL.'user/');
            }
            
        }
        
    }
    
    public function reset($id){
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_edit'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $this->load->library('encrypt');
        $id = $this->encrypt->decode($id);
        
        $this->load->library('user_service');
        $record = $this->user_service->get_user_by_pk($id);
        
        if(!$record){
            
            redirect(ERROR_404);
            exit(1);
        }
        
        if($this->user_service->rst_user_pwd($id, $record->user_name)){
            
            $this->session->set_flashdata('message', '<h4><i class="fa fa-bell-alt"></i>Done!</h4><p>Password of <b>'.$record->first_name.' '.$record->last_name.'</b> has been reset...!</p>');
            redirect( ADMIN_URL.'user/');
        }else{
            
            $this->session->set_flashdata('notify_error', 'Something\'s not irght :( ...!');
            redirect( ADMIN_URL.'user/');
        }
        
    }
    
    public function status($id, $status){
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_edit'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $this->load->library('encrypt');
        $id = $this->encrypt->decode($id);
        
        $this->load->library('user_service');
        $record = $this->user_service->get_user_by_pk($id);
        
        if(!$record){
            
            redirect(ERROR_404);
            exit(1);
        }
        
        $save = array(
            TBL_USERS.'.user_status' => $status
        );
        
        $where = array(
            TBL_USERS.'.user_id' => $id
        );
        
        if($this->user_service->save( $save, $where)){
            
            $this->session->set_flashdata('message', '<h4><i class="fa fa-bell-alt"></i>Done!</h4><p>Status of <b>'.$record->first_name.' '.$record->last_name.'</b> has been changed...!</p>');
            redirect( ADMIN_URL.'user/');
        }else{
            
            $this->session->set_flashdata('notify_error', 'Something\'s not irght :( ...!');
            redirect( ADMIN_URL.'user/');
        }
        
    }

    public function check_login()
    {
        $this->load->library('session');
        $userSession = $this->session->userdata('logged_in');
        if (empty($userSession)) {
            
            $this->session->set_userdata('refered_from', current_url());
            redirect(ADMIN_LOGIN_URL);
        }
        $this->user = $userSession;        
        
    }
    
    public function validate_username($str){
            
        $this->load->library('user_service');
        
        $where = array(
            TBL_USERS.'.user_name' => $str  
        );
            
        if($this->user_service->has_username($where)){
		
            $this->form_validation->set_message('validate_username', 'Wait ! somebody already took this username :( | Try another one ...');
            return false;
        } else {

            return true;
        }
            
    }
    
    public function forgot_password(){
    	
    	$data['title'] = 'Forgot your password - Don\'t Worry'; 
 
    	if($this->input->post()){
    		
            $this->load->library('form_validation');

            $this->form_validation->set_rules('reg_email', 'Registered Email', 'trim|required|valid_email|callback_validate_email');

            $this->form_validation->set_message('required','Hey! Where is your mail id?');
            $this->form_validation->set_message('valid_email','Hey! check your mail id?');

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE){

                $this->load->library('user_service');
                $this->load->model('auth_model');
                
                $where = array(
                    'email' => (string) User::get_instance()->input->post('reg_email')
                );

                $usr_details = $this->user_service->get_user_by_row( $where);
                $newpass = $this->user_service->rst_user_pwd( $usr_details->user_id, $usr_details->user_name);
                
                $query['username'] = $usr_details->email;
                $query['new_pass'] = $newpass;
                
                if($this->mail_password_recover($query)){
                    
                   $this->session->set_flashdata('message', 'Gotcha! <br/> We have just send a mail to <b>'.(string) $this->input->post('reg_email').'</b> <br/>with the reset password!');
                   redirect( ADMIN_URL.'user/mail_send'); 
                }else{
                    
                    
                }
                

            }
    		
    	}
    	
    	$this->load->view(ADMIN_URL.'user/forgot_pass', $data);
    }
    
    public function mail_send(){
    	
     	if($this->session->flashdata('message')){
    		
            $this->load->view( ADMIN_URL.'user/mail_send');
    		
    	}else{
    		
            redirect(ERROR_404);
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
    
    public function validate_email($str){
            
        $this->load->model('auth_model');

       	if($this->auth_model->is_email_exists($str)){
            
            return true;
       	} else {
       		
            $this->form_validation->set_message('validate_email', 'Wait ! No account has been found associated with this mail id');
            return false;
        }
            
    }
    
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(ADMIN_LOGIN_URL);
    }
        
    
}
