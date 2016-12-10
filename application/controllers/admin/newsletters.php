<?php 

if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Newsletters extends MY_Controller {

    public $init;
    
    public function __construct(){
        parent::__construct();
        $this->_menu_item = 'newsletters';
        $this->load->library('My_PHPMailer');
        $this->init = $this->getNewsLetterConfig();
    }
    
    public function index()
    {
        redirect(ADMIN_URL.'newsletters/send/');        
    }
    
    public function settings(){
        
        $data = array();
        $data['_mode'] = false;
        $data['content'] = 'admin/newsletter/settings';
        $data['title'] = 'Newsletter Settings';

        //If post happens put these values onto database and update it .
        if(Newsletters::get_instance()->input->post()){
 
            $this->load->library('form_validation');

            $this->form_validation->set_rules('from_nl_mail', 'From Mail', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('from_nl_name', 'From Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('nl_server', 'Newsletter Server', 'trim|required|xss_clean');
            
            if(Newsletters::get_instance()->input->post('nl_server') == 'MailChimp')
            {
                $data['_mode'] = true;
                $this->form_validation->set_rules('mailchimp_id', 'MailChimp Key', 'trim|required|xss_clean'); 
            }
            
            $this->form_validation->set_rules('spam_words', 'Spam words filtering', 'trim|required|xss_clean|callback_validate_csv');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                foreach($forms as $config)
                {
                   $where = array(
                       TBL_CONFIG.'.group_name' => 'newsletter',
                       TBL_CONFIG.'.config_key' => $config['id']
                   );
                   $post = Newsletters::get_instance()->input->post($config['id']);
                   $value = array(
                     TBL_CONFIG.'.config_value' => (isset($post) && $post) ? $post :  '0'
                   );
                   
                   $this->config_model->save( $value, $where);
                }
                
                $this->session->set_flashdata('flash_message', 'asdsad');
                redirect('/admin/newsletters/settings');
            }

        }
        
        $data['config'] = $this->init;
        $this->load->view($this->layout, $data);
    }
    
    public function send(){
        
        $data = array();
 
        $this->load->model('config_model');
        $this->load->library('contactlist_service');
        $this->load->library('subscriber_service');
        $this->load->library('encrypt');

        if(Newsletters::get_instance()->input->post())
        {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('subscriber', 'Choose subscribers to be included', 'required|xss_clean');
            $this->form_validation->set_rules('from_email', 'From Mail', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('from_name', 'From Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('c_list', 'Contact List', 'trim|required|xss_clean|callback_validate_contacts');
            $this->form_validation->set_rules('nl_subject', 'Newsletter Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('content', 'Content', 'trim|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $this->load->library('parser');
                
                if(Newsletters::get_instance()->input->post('nl_tpl') == 'General')
                {
                    
                    //get all contacts from contact list
                    $where = array(
                        TBL_CONTACTS.'.list_id' => $this->encrypt->decode(Newsletters::get_instance()->input->post('c_list'))
                    );
                    
                    $contacts = $this->contactlist_service->get_contacts($where);
                    
                    
                    //Get all subscribers chosen and mix up with the template
                    $subscribers = Newsletters::get_instance()->input->post('subscriber');
                    
                    $data = array(

                        'subscribers' => $this->generate_subscribers_html_list($subscribers),
                        'message' => Newsletters::get_instance()->input->post('content')
                    ); 

                    $html = $this->parser->parse(ADMIN_URL.'newsletter_templates/general', $data);

                    foreach ($contacts as $c)
                    {

                        $mail = new PHPMailer();
                        $mail->IsSMTP();            // we are going to use SMTP
                        $mail->isHTML(true);
                        $mail->SMTPAuth   = true;   // enabled SMTP authentication
                        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
                        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
                        $mail->Port       = 465;                   // SMTP port to connect to GMail
                        $mail->Username   = "arun.gopi@reflectionsinfos.com";  // user email address
                        $mail->Password   = "godislove101";        // password in GMail
                        $mail->SetFrom(Newsletters::get_instance()->input->post('from_email'), 'News Desk'. Newsletters::get_instance()->input->post('from_name'));  //Who is sending the email
                        $mail->AddReplyTo("no-reply@360seha.com","Firstname Lastname");  //email address that receives the response
                        $mail->Subject    = Newsletters::get_instance()->input->post('nl_subject');
                        $mail->Body      = (string) $html;
                        $mail->AltBody    = "Plain text message";

                        //$destino = "aneesh.anniyan@gmail.com"; // Who is addressed the email to
                        //$mail->AddAddress($destino, "John Doe");
                        $mail->AddBCC($c->email);

                        if(!$mail->Send()){

                            $data["message"] = "Error: " . $mail->ErrorInfo;
                        } else {
                            $data["message"] = "Message to recepients!";
                        }
                        
                    }
 
                }

            }
            
        }
        
        $data['config'] = $this->init;
        $data['content'] = 'admin/newsletter/send';
        $data['clists'] = $this->contactlist_service->get_contactlists();
        $data['subscribers'] = $this->subscriber_service->get_subscribers();
        $data['title'] = 'Send A Newsletter';
        
        $this->load->view($this->layout, $data);
    }

    public function send_followers()
    {
        $data = array();
 
        $this->load->model('config_model');
        $this->load->library('subscriber_service'); 

        //Initializing all the view variables here
        $data['content'] = 'admin/newsletter/followers';
        $data['title'] = 'Send Newsletter to followers';
        $data['subscribers'] = $this->subscriber_service->get_subscribers();
 
        if(Newsletters::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('subscriber', 'Choose subscribers to be included', 'required|xss_clean');
            $this->form_validation->set_rules('from_email', 'From Mail', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('from_name', 'From Name', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('subject', 'Newsletter Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
            
            $this->form_validation->set_message('Invalid %s', 'required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

                //Get the followers of the subscriber chosen
                $this->load->library('subscription_service');
                $followers = $this->subscription_service->get_followers(Newsletters::get_instance()->input->post('subscriber'));

                //Check if there is any follower ..if not redirect to newsletter controller and same view
                if(!$followers)
                {
                    $data["error_message"] = "No followers found for this subscriber.. Choose another one.";
 
                }else{

                    //Finish up the template 
                    $query = array(
                        "message" => Newsletters::get_instance()->input->post('message')
                    );
                
                    $template = ADMIN_URL.'newsletter_templates/followers';

                    //Load the mail service library
                    $this->load->library('mail_service');

                    //Put the mail entry details
                    $mentry = array(
                        "from" => Newsletters::get_instance()->input->post('from_email'),
                        "from_name" => Newsletters::get_instance()->input->post('from_name'),
                        "reply_to" => 'no-reply@360seha.com',
                        "reply_title" => 'No reply',
                        "subject" => Newsletters::get_instance()->input->post('subject'),
                        "alt_body" => strip_tags(Newsletters::get_instance()->input->post('message')) //Strip the html tags and set as the plain text
                    );

                    //Get the follower from array and send to them one by one
                    foreach ($followers as $follower) {

                        $mentry["to"] = $follower;
                        $mentry["to_title"] = "Dear Follower";

                        if(!$this->mail_service->Send( $query, $template, $mentry)){

                            $data["message"] = "Something went wrong :(";
                        } else {
 
                            $this->session->set_flashdata('message', 'Message send!');
                            redirect( ADMIN_URL.'newsletters/send_followers');
                        }

                    }  

                }

            }

        }

        $this->load->view($this->layout, $data);
    }
    
    private function generate_subscribers_html_list($subscribers){
        
        if(is_array($subscribers) && count($subscribers) > 0)
        {
            $this->load->library('subscriber_service');
            foreach($subscribers as $sub)
            {
                
                $sub_details = $this->subscriber_service->get_subscriber_by_pk($sub);

                $html = '<div class="section2 align-base left underline item" style="margin: 0;padding: 0;border: 0;outline: 0;font-weight: inherit;font-style: inherit;vertical-align: baseline !important;z-index: 2;text-align: left;float: left;width: 45%;display: block;position: relative;height: auto;margin-left: 10px;padding-bottom: 15px;border-bottom: #e5e5e5 solid 2px">

                        <img src="http://360seha.com/uploads/subscribers/profile/'.$sub_details->subs_profile_img.'" class="left" width="143" height="140" style="margin: 0;padding: 0;border: 0;outline: 0;font-weight: inherit;font-style: inherit;vertical-align: baseline;z-index: 2;text-align: left;float: left" />

                           <div class="info_subscriber left" style="margin: 0;padding: 0;border: 0;outline: 0;font-weight: inherit;font-style: inherit;vertical-align: baseline;z-index: 2;text-align: left;float: left;display: block;position: relative;width: 120px;height: auto;margin-left: 10px;margin-top: 30px;line-height: 20px;font-size: 14px">

                               <a href="http://360seha.com/p/'.$sub_details->subs_public_profile.'" class="name" style="margin: 0;padding: 0;border: 0;outline: 0;font-weight: inherit;font-style: inherit;vertical-align: baseline;z-index: 2;text-align: left;color: #34b7af">'.$sub_details->subs_title.'</a>
                               <span class="details" style="margin: 0;padding: 0;border: 0;outline: 0;font-weight: inherit;font-style: inherit;vertical-align: baseline;z-index: 2;text-align: left;color: #505454">'.$sub_details->subs_email.'</span>
                               <span class="details" style="margin: 0;padding: 0;border: 0;outline: 0;font-weight: inherit;font-style: inherit;vertical-align: baseline;z-index: 2;text-align: left;color: #505454">Sharjah, UAE</span>
                           </div>

                       </div>';
                 
            }
             
           return $html; 
        }
 
    }
 
    public function custom_notifications()
    {
        $data['content'] = 'admin/newsletter/custom_notifications';
        $data['title'] = 'Custom Notifications';
        
        $this->load->library('GCM');
        $data['devices'] = $devices = $this->gcm->get_registerd_devices();
                
        if(Newsletters::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
            $this->form_validation->set_rules('message', 'Message', 'required|xss_clean');
            $this->form_validation->set_rules('url', 'Notification Url', 'required|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
 
                $message = array(
                    "title" => Newsletters::get_instance()->input->post('title'),
                    "message" => Newsletters::get_instance()->input->post('message'),
                    "url" => Newsletters::get_instance()->input->post('url')
                );
 
                $frmt_ar = array();

                //Format devices array to pass onto GCM
                foreach ($devices AS $d)
                {
                    array_push($frmt_ar, $d->gcm_regid);
                }
                
                //Send the notifications to GCM server
                if($this->gcm->send_notification($frmt_ar, $message, GOOGLE_API_KEY))
                {
                    $data['message'] = "Your Notifications Forwarded to GCM Server for queueing. Will be send as notifications to the registered App Users";
                }
            }
            
        }
        
        $this->load->view($this->layout, $data);
    }
 
    /*
     * Validation for CSV presence
     * @params $str  => A string data is passed
     */
    public function validate_csv($str){
      
        $str = explode(',', $str);

        if(empty($str) || count($str) == 0){

           $this->form_validation->set_message('validate_csv', 'Value should be in CSV format');
           return false;

        }else{

          return true;
        }
      
   }
   
   /*
    * Validate contact list for minimum contacts
    * @params $str
    * 
    * A string is passed from the form area
    * 
    */
   public function validate_contacts($str)
   {
       $this->load->library('contactlist_service');
       $this->load->library('encrypt');
       
       $str = $this->encrypt->decode($str);
       if(!$this->contactlist_service->has_contacts($str)){

           $this->form_validation->set_message('validate_contacts', 'No contacts has been found');
           return false;

        }else{

          return true;
        }
   }
   
   public function send_email(){
        
        $data = array();

        $this->load->library('subscriber_service');
        $this->load->library('encrypt');
 
        $data['subscribers'] = $this->subscriber_service->get_subscribers();

        if(Newsletters::get_instance()->input->post())
        {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('subscriber', 'Choose subscribers to be included', 'required|xss_clean');
            $this->form_validation->set_rules('from_email', 'From Mail', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('from_name', 'From Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('nl_subject', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('content', 'Content', 'trim|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                $record = $this->subscriber_service->get_subscriber_by_pk(Newsletters::get_instance()->input->post('subscriber'));

                //Send an inivitation email to the registered subscriber
                $this->load->library('mail_service');
                
                //Mail Entry Details here ...
                $mentry = array(
                    
                    "from" => 'info@360seha.com',
                    "from_name" => '360Seha Team',
                    "reply_to" => 'no-reply@360seha.com',
                    "reply_title" => 'No reply',
                    "subject" => 'Hi! Your account has been created (approval required)',
                    "alt_body" => "Plain text message",
                    "to" => $record->subs_email,
                    "to_title" => $record->subs_title
                );
                
                //Prepare the content variables for the mail ...
                $query = array(
                    
                    "title" => $record->subs_title,
                    "username" => $record->subs_username,
                    "pwd" => $record->r_password,
                    "email_verify" => $this->encrypt->encode($record->subs_email.time()),
                    "content" => Newsletters::get_instance()->input->post('content')
                );
                
                $template = ADMIN_URL.'newsletter_templates/verify_company';
                
                //Sending the mail to subscriber ...
                if(!$this->mail_service->Send( $query, $template, $mentry)){

                    $data["message"] = "Error: ";
                } else {
                    $data["message"] = "Message Send";
                }
                //Mail Sending finished here ...

            }
            
        }
        
        $data['content'] = 'admin/newsletter/send_mail';
        $data['title'] = 'Send Custom Emails To Subscribers';
        
        $this->load->view($this->layout, $data);
    }
    
}