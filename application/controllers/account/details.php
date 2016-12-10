<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Details extends AccountController
{
	protected $ctrlUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."specialization_model", 'modelNameAlias');
        $this->load->model(SITE_MODELS.'category_model', 'modelCategoryAlias');
        $this->ctrlUrl = '/account/details';
    }
    
    public function index()
    {
        $this->data['page'] = 'details';

        $fields = array(
        	TBL_SUBSCRIBERS.'.has_emergency',
            TBL_SUBSCRIBERS.'.subs_cat_id',
        	TBL_SUBSCRIBERS.'.subs_public_profile',
        	TBL_SUBSCRIBERS.'.has_insurance',
            TBL_SUBSCRIBERS.'.payments',
        	TBL_SUBSCRIBERS.'.published'
        ); 

        $userID = $this->encrypt->decode($this->user['user_id']);

        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));

        $post['has_emergency'] = ($record->has_emergency == 1) ? TRUE : FALSE;
        $post['subs_public_profile'] = $record->subs_public_profile;
        $post['has_insurance'] = ($record->has_insurance == 1) ? TRUE : FALSE;
        $post['payments'] = ($record->payments != NULL) ? explode(',', $record->payments) : FALSE;
        $this->data['post'] = $post;

        $this->data['published'] = $record->published; 

        if($this->input->post())
        {
            $this->data['post'] = $this->input->post();

        	$this->load->library('form_validation');
            $this->form_validation->set_rules('subs_public_profile', 'Public profile', 'trim|required|xss_clean|callback_validateProfileURL');  

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

                //If choose payment methods
                $paymentMethods = $this->input->post("payments",TRUE);
                $paymentMethods = (is_array($paymentMethods) && $paymentMethods) ? implode(',', $paymentMethods) : NULL;

            	$save = array(
                    TBL_SUBSCRIBERS.'.has_emergency' => ($this->input->post("has_emergency",TRUE)) ? 1 : 0,
                    TBL_SUBSCRIBERS.'.has_insurance' => ($this->input->post("has_insurance",TRUE)) ? 1 : 0,
                    TBL_SUBSCRIBERS.'.payments' => $paymentMethods,
                    TBL_SUBSCRIBERS.'.subs_public_profile' => $this->input->post("subs_public_profile",TRUE),
                    TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
                ); 

                $where = array(
                	TBL_SUBSCRIBERS.'.user_id' => $userID
                ); 

                $this->modelUserAlias->save( $save, $where); 

                //TODO : - Send an email to admin for new approval notification
                if($record->published == 0)
                {

                }

                $responseMessage = ($record->published == 0) ? 'Your profile has been submitted for approval' : 'Information updated!';

                $this->session->set_flashdata('message', $responseMessage);
                redirect($this->ctrlUrl); 

            }else{

	        	$this->data['Error'] = 'Y';
	           	$this->data['MSG'] = 'Your form has errors';

	        }

        }

        $this->load->view($this->layout, $this->data);
    }  

    public function validateProfileURL($profileURL)
    {
        if($this->modelUserAlias->isExist(array('subs_public_profile'=>$profileURL,'user_id !=' => (int) $this->encrypt->decode($this->user['user_id']))))
        {
            $this->form_validation->set_message('validateUsername', 'Profile URL is already taken');
            return false;
        }else{
            return true;
        }
    }

}