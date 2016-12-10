<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertise extends PublicController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
       $this->data['page'] = 'advertise';

       $post['full_name'] = '';
       $post['email'] = '';
       $post['contact_no'] = '';
       $post['message'] = '';

       $this->data['post'] = $post;

       if($this->input->post())
       {

       		$this->data['post'] = $this->input->post();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('full_name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|xss_clean');
            $this->form_validation->set_rules('message', 'Message', 'trim|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

            	$full_name = $this->input->post('full_name',TRUE);
              	$email = $this->input->post('email',TRUE);
              	$contact_no = $this->input->post('contact_no',TRUE);
              	$message = $this->input->post('message',TRUE);

            	$this->load->library('email');
               	$this->config->load('email',true);
              	$this->email->from($email);
            	$this->email->to(INFO_EMAIL);
           		$this->email->subject(SITE_NAME.' - Advertise with us request form');

              	include_once(MISC_PATH."/emails.php");
            	$message = $contact_email;

            	$this->email->message($message);

            	if ($this->email->send())
            	{
              		$this->data["MSG"] = "Thank you for your inquiry. We will get back to you within 24 hours.";
               		$this->data["Error"] = "N";
             	}else{
             		$this->data["MSG"] = "Someting Went Wrong :(";
            		$this->data["Error"] = "Y";
             	}

            }
            else
            {
                $this->data["MSG"] = "Your form has errors";
                $this->data["Error"] = "Y";
            }

       }

       $this->load->view($this->layout, $this->data);

    }

}
