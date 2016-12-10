<?php 
if (!defined('BASEPATH')) 
        exit('No direct script access allowed');

class Offers extends Account_Controller {
    
    protected $view;
    protected $table = TBL_OFFERS;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'offers';
        $this->load->model('currency_model');
    }

    public function index()
    { 
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Our Offers Page';
        $this->data['sub_title'] = 'Manage your offers here';
 
        $where = array(
            $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id'])
        );

        if($this->input->post())
        {

            $where[$this->table.'.offer_title'] = $this->input->post('offer_title');
            $this->data['offers'] = $this->subscriber_service->get_offers( $where);
        }else{

            $this->data['offers'] = $this->subscriber_service->get_offers( $where);
        }

        $this->load->view($this->layout, $this->data);
    }
    
    public function add()
    { 
        $file_data = array();
        $this->data['content'] = $this->view.'/add';
        $this->data['title'] = 'Add new offer';
        $this->data['sub_title'] = 'Manage your offer details here';
        $subs = $this->data['user_details'];
        
        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Offer\'s Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Offer\'s Title In Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('orig_price', 'Original Price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('discount_price', 'Discount Price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dpd1', 'Offer Start date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dpd2', 'Offer End date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Offer description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Offer description in Arabic', 'trim|required|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                if($_FILES['userfile']['name'] != ""){
 
                    $config['upload_path'] = UPLOAD_FOLDER.'page-contents/offers/';   //Fixing the upload directory
                    $config['allowed_types'] = 'jpg|png|jpeg';                          //Configuring the allowed file types
                    $config['max_size'] = '800';                                        //Setting the maximum upload file size
                    $config['max_width'] = '640';
                    $config['max_height'] = '640';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload())                                    // If upload failed, display error
                    {
                        $this->data['error'] = $this->upload->display_errors();
                    }else{
                        $file_data = $this->upload->data();
                    }

                }

                $save = array(
                    
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.offer_title' => $this->input->post('title'),
                    $this->table.'.offer_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.orig_price' => $this->input->post('orig_price'),
                    $this->table.'.subs_type' => $subs->subs_type,
                    $this->table.'.offer_starts' => date('Y-m-d H:i:s', strtotime($this->input->post('dpd1'))),
                    $this->table.'.offer_ends' => date('Y-m-d H:i:s', strtotime($this->input->post('dpd2'))),
                    $this->table.'.discount_price' => $this->input->post('discount_price'),
                    $this->table.'.offer_description' => $this->input->post('description'),
                    $this->table.'.offer_description_ar' => $this->input->post('description_ar'),
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                    
                ); 
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[$this->table.'.offer_image'] = $file_data['file_name'];
                }

                if(!isset($this->data['error']))
                {
                    $offer_id = $this->subscriber_service->save_offer($save);

                    if($this->input->post('send'))
                    {
                        $this->send_notification((int) $this->encrypt->decode($this->user['user_id']), $this->input->post());

                        $save = array(
                            $this->table.'.send' => 1
                        );

                        $where = array(
                            $this->table.'.offer_id' => $offer_id
                        );

                        $this->subscriber_service->save_offer($save, $where);
                    }

                    $this->session->set_flashdata('message', 'Offer details added!');
                    redirect($this->data['ctrl_url']);
                }
            }
            
        }
        
        $this->load->view($this->layout, $this->data);
        
    }
    
    public function edit($id)
    {
        $file_data = array();
        $this->data['content'] = $this->view.'/edit';
        $this->data['title'] = 'Update offer';
        $this->data['sub_title'] = 'Manage your offer details here';
        $id = $this->encrypt->decode($id);

        $this->data['record'] = $this->subscriber_service->get_offer_by_pk($id, array());
        $subs = $this->data['user_details'];
        
        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Offer\'s Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Offer\'s Title In Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('orig_price', 'Original Price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('discount_price', 'Discount Price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dpd1', 'Offer Start date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dpd2', 'Offer End date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Offer description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Offer description in Arabic', 'trim|required|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                if($_FILES['userfile']['name'] != ""){
 
                    $config['upload_path'] = UPLOAD_FOLDER.'page-contents/offers/';   //Fixing the upload directory
                    $config['allowed_types'] = 'jpg|png|jpeg';                          //Configuring the allowed file types
                    $config['max_size'] = '800';                                        //Setting the maximum upload file size
                    $config['max_width'] = '640';
                    $config['max_height'] = '640';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload())                                    // If upload failed, display error
                    {
                        $this->data['error'] = $this->upload->display_errors();
                    }else{
                        $file_data = $this->upload->data();
                    }

                }

                $save = array(
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.offer_title' => $this->input->post('title'),
                    $this->table.'.offer_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.service_fk' => $this->input->post('service'),
                    $this->table.'.subs_type' => $subs->subs_type,
                    $this->table.'.offer_starts' => date('Y-m-d H:i:s', strtotime($this->input->post('dpd1'))),
                    $this->table.'.offer_ends' => date('Y-m-d H:i:s', strtotime($this->input->post('dpd2'))),
                    $this->table.'.orig_price' => $this->input->post('orig_price'),
                    $this->table.'.discount_price' => $this->input->post('discount_price'),
                    $this->table.'.offer_description' => $this->input->post('description'),
                    $this->table.'.offer_description_ar' => $this->input->post('description_ar'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                ); 
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[$this->table.'.offer_image'] = $file_data['file_name'];
                }
                
                $where = array(
                    $this->table.'.offer_id' => $id
                );
                
                if(!isset($this->data['error']))
                {
                    $this->subscriber_service->save_offer( $save, $where);
                    $this->session->set_flashdata('message', 'Offer details updated!');
                    redirect($this->data['ctrl_url']);
                }
 
            }
            
        }
        
        $this->load->view($this->layout, $this->data);
        
    }
    
    public function send_notification_cloud($post)
    {
        $dpd1 = date('d M', strtotime($post['dpd1']));
        $dpd2 = date('d M', strtotime($post['dpd2']));

        $message = array(
            "title" => $post['title'],
            "message" => "Valid from ".$dpd1." till ".$dpd2,
            "url" => "" //update this url with genuine one
        );

        $this->load->library('GCM');
        $devices = $this->gcm->get_registerd_devices();
        $frmt_ar = array();

        //Format devices array to pass onto GCM
        foreach ($devices AS $d)
        {
            array_push($frmt_ar, $d->gcm_regid);
        }
        //Send the notifications to GCM server
        $this->gcm->send_notification($frmt_ar, $message, GOOGLE_API_KEY);
    }
    
    
    public function delete($id)
    {
 
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_offer_by_pk($id);
        
        if(!$record)
        {
            
            redirect(ERROR_404);
            exit(1);
            
        }else{
            
            $where = array(
                $this->table.'.offer_id' => $id
            );
            
            //Delete from the table after its found
            if($this->subscriber_service->unset_offer($where))
            {
 
                $this->session->set_flashdata('message', 'Deleted!...Offer details deleted');
                redirect($this->data['ctrl_url']);
            }else{
                
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
            
        } 
        
    } 

    public function send($id)
    { 
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_offer_by_pk($id);

        if(!$record)
        {
            
            redirect(ERROR_404);
            exit(1);
            
        }else{
            

            $offers = array();
            $offers['title'] = $record->offer_title;
            $offers['description'] = $record->offer_description;

            $save = array(
                $this->table.'.send' => 1
            );

            $where = array(
                $this->table.'.offer_id' => $id
            );

            $this->subscriber_service->save_offer($save, $where);
            //$this->send_notification((int) $this->encrypt->decode($this->user['user_id']), $offers);
            $this->session->set_flashdata('message', 'Mail Send!');
            redirect($this->data['ctrl_url']);
            
        }

    }

    public function send_notification($subsId, $Offer)
    {
        $this->load->library('mail_service');
        $this->load->library('subscriber_service');
        $this->load->library('subscription_service');

        $subs = $this->subscriber_service->get_subscriber_by_pk($subsId);
        $emails = $this->subscription_service->get_followers($subsId);

        $mentry = array(

            "from" => 'info@360seha.com',
            "from_name" => '360Seha Newsletter',
            "reply_to" => 'no-reply@360seha.com',
            "reply_title" => 'No reply',
            "subject" => $subs->subs_title. ' just added a offer => '.$Offer['title'],
            "alt_body" => "Plain text message",
            "to" => $subs->subs_email,
            "to_title" => $subs->subs_title
        );

        $query = array(
            "subs_title" => $subs->subs_title,
            "type" => 'Offer',
            "title" => $Offer['title'],
            "content" => character_limiter($Offer['description'], 500, '...'),
            "link" => base_url().$subs->subs_public_profile.'/offers/'.$Offer['title']
        );


        $template = PROFILE_VIEW.'email_templates/notifications';
        $this->mail_service->Send( $query, $template, $mentry, $emails);
    }

}