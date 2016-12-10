<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'category_model', 'modelCategoryAlias');
        $this->ctrlUrl = '/account/basic';
        $this->nextUrl = '/account/location';
    }
    
    public function index()
    {
        $this->data['page'] = 'basic';
        $this->data['nextUrl'] = $this->nextUrl;
        
        //Load all parent categories here except for doctors
        $this->data['category'] = $this->modelCategoryAlias->fetchFields(array('name as name_en','name_ar', 'id_category'),array('id_category_parent' => NULL), array('id_category'=>'ASC'));

        $fields = array(
        	TBL_SUBSCRIBERS.'.subs_title as subs_title_en',
        	TBL_SUBSCRIBERS.'.subs_title_ar',
        	TBL_SUBSCRIBERS.'.subs_cat_id',
        	TBL_SUBSCRIBERS.'.description_en_long as description_en',
        	TBL_SUBSCRIBERS.'.description_en_long_ar as description_ar',
        	TBL_SUBSCRIBERS.'.published'
        );  

        $userID = $this->encrypt->decode($this->user['user_id']);

        $this->data['profileData'] = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->data['published'] = $this->data['profileData']->published;

        if($this->input->post())
        {
        	$this->load->library('form_validation');
            $this->form_validation->set_rules('name_en', 'Name English', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('name_ar', 'Name Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

            $this->form_validation->set_rules('description_en', 'Description English', 'trim|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description Arabic.', 'trim|xss_clean'); 

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

            	$save = array(
                    TBL_SUBSCRIBERS.'.subs_title' => $this->input->post('name_en'),
                    TBL_SUBSCRIBERS.'.subs_title_ar' => $this->input->post('name_ar'),
                    TBL_SUBSCRIBERS.'.subs_public_profile' => preg_replace('/\s+/', '', trim(strtolower($this->input->post('name_en')))),
                    TBL_SUBSCRIBERS.'.subs_cat_id' => $this->input->post('category'),
                    TBL_SUBSCRIBERS.'.description_en_long' => $this->input->post('description_en'),
                    TBL_SUBSCRIBERS.'.description_en_long_ar' => $this->input->post('description_ar'),
                    TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
                ); 

                $where = array(
                	TBL_SUBSCRIBERS.'.user_id' => $userID
                ); 

                $this->modelUserAlias->save( $save, $where);

                $this->session->set_flashdata('message', 'Details updated!');
                redirect($this->ctrlUrl); 

            }else{

	        	$this->data['Error'] = 'Y';
	           	$this->data['MSG'] = 'Your form has errors';

	        }

        }

        $this->load->view($this->layout, $this->data);
    } 

}