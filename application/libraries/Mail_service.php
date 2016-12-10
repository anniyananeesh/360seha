<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Mail_service{
    
    public $mailHost;
    public $mailPort;
    public $mailUsername;
    public $mailPassword;
    public $protocol;
    
    public $ci;
    
    /*
     * When mail service is inititalized the construct function creates are required packages onto memmory for handling with the scope
     * Parser to parse the template passed
     * My_phpMailer is liobrary to be imported to send the mails ..refer PHPMailer class online
     * Putting the profiler output stautus to false ...otherwise mail will be crashed from sending
     * 
     * All Config is kept inside the 
     * 
     * Location: ./application/config/mail.php
     */
    public function __construct() {
        
        //Initialize the instance of the Codeigniter framework. 
        //No Direct access from library folder
        $this->ci = & get_instance();
        $this->ci->load->library('parser');
        $this->ci->load->library('My_PHPMailer');
        $this->ci->output->enable_profiler(FALSE);
        
        $this->ci->config->load('mail');
        $mail = $this->ci->config->item('mail');

        $this->mailHost = $mail["smtp_host"];
        $this->mailPort = $mail["smtp_port"];
        $this->mailUsername = $mail["smtp_user"];
        $this->mailPassword = $mail["smtp_pass"];
        $this->protocol = $mail["protocol"];
    }
    
    /*
     * Send the mail transfered to this service
     * @params $query Contents
     * @params $template Template to wrap up with
     * @params $mentry Aka Mail Entry Details of mail to be send
     */
    public function Send( $query, $template, $mentry, $bccArary = FALSE)
    {
        $html = $this->ci->parser->parse( $template, $query, TRUE);

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->isHTML(true);
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = $this->mailHost;
        $mail->Port       = $this->mailPort;
        $mail->Username   = $this->mailUsername;
        $mail->Password   = $this->mailPassword;
        $mail->SetFrom( $mentry["from"], $mentry["from_name"]);
        $mail->AddReplyTo( $mentry["reply_to"], $mentry["reply_title"]);
        $mail->Subject    = $mentry["subject"];
        $mail->Body      =  $html;
        $mail->AltBody    = $mentry["alt_body"];
        $mail->AddAddress( $mentry["to"], $mentry["to_title"]);

        if($bccArary)
        {
            foreach ($bccArary as $bcc) {
                $mail->addBCC($bcc);
            }
        }
        
        if($mail->Send()){
            return true;
        }else{
            return false;
        }
    }
    
}