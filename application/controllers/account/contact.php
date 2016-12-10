<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = '/account/contact';
        $this->nextUrl = '/account/timings';

        $this->load->model(SITE_MODELS.'social_media_model', 'modelSocialMediaAlias');
    }
    
    public function index()
    {
        $this->data['page'] = 'contact';
        $this->data['nextUrl'] = $this->nextUrl; 

        $fields = array(
        	TBL_SUBSCRIBERS.'.subs_contact_name',
        	TBL_SUBSCRIBERS.'.subs_email',
        	TBL_SUBSCRIBERS.'.subs_primary_contact',
        	TBL_SUBSCRIBERS.'.subs_secondary_contact',
        	TBL_SUBSCRIBERS.'.subs_url',
        	TBL_SUBSCRIBERS.'.published'
        ); 

        $userID = $this->encrypt->decode($this->user['user_id']);

        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $socialMedias = $this->modelSocialMediaAlias->fetchRowFields(array('social_fb_link','social_tweet_link','social_inst_link'), array('subscriber'=> (int) $userID));

        $post['contact_person'] = $record->subs_contact_name;
        $post['email'] = $record->subs_email;
        $post['contact_no'] = $record->subs_primary_contact;
        $post['tel'] = $record->subs_secondary_contact;
        $post['url'] = $record->subs_url;

        $post['social_fb_link'] = (isset($socialMedias->social_fb_link)) ? $socialMedias->social_fb_link : '';
        $post['social_tweet_link'] = (isset($socialMedias->social_tweet_link)) ? $socialMedias->social_tweet_link : '';
        $post['social_inst_link'] = (isset($socialMedias->social_inst_link)) ? $socialMedias->social_inst_link : '';

        $this->data['post'] = $post;

        $this->data['published'] = $record->published;

        if($this->input->post())
        {
            $this->data['post'] = $this->input->post();

        	$this->load->library('form_validation');
            //$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('tel', 'Telephone', 'trim|xss_clean');
            $this->form_validation->set_rules('contact_no', 'Mobile no.', 'trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'Website', 'trim|xss_clean'); 

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

            	$save = array(
                    TBL_SUBSCRIBERS.'.subs_contact_name' => $this->input->post("contact_person",TRUE),
                    TBL_SUBSCRIBERS.'.subs_email' => $this->input->post("email",TRUE),
                    TBL_SUBSCRIBERS.'.subs_primary_contact' => $this->input->post("contact_no",TRUE),
                    TBL_SUBSCRIBERS.'.subs_secondary_contact' => $this->input->post("tel",TRUE),
                    TBL_SUBSCRIBERS.'.subs_url' => $this->input->post("url",TRUE),
                    TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
                ); 

                $where = array(
                	TBL_SUBSCRIBERS.'.user_id' => $userID
                ); 

                $this->modelUserAlias->save( $save, $where);

                $save_smedia = array(
                    'social_fb_link' => $this->input->post("social_fb_link",TRUE),
                    'social_tweet_link' => $this->input->post("social_tweet_link",TRUE),
                    'social_inst_link' => $this->input->post("social_inst_link",TRUE),
                    'subscriber' => $userID
                );

                $where = (isset($socialMedias->social_fb_link) || isset($socialMedias->social_tweet_link) || isset($socialMedias->social_inst_link)) ? array('subscriber'=>(int) $userID) : array();

                $this->modelSocialMediaAlias->save($save_smedia, $where);

                $this->session->set_flashdata('message', 'Contact details updated!');
                redirect($this->ctrlUrl); 

            }else{

	        	$this->data['Error'] = 'Y';
	           	$this->data['MSG'] = 'Your form has errors';

	        }

        }

        $this->load->view($this->layout, $this->data);
    } 

}