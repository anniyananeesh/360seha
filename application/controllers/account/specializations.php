<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specializations extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;
    protected $isPublished;
    protected $userCat;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."specialization_model", 'modelNameAlias');
        $this->load->model(SITE_MODELS."category_model", 'modelCategoryAlias');
        $this->load->model(SITE_MODELS."department_user_model", 'modelDeptAlias');

        $this->ctrlUrl = '/account/specializations';
        $this->nextUrl = '/account/photos';

        $fields = array(
            TBL_SUBSCRIBERS.'.published',
            TBL_SUBSCRIBERS.'.subs_cat_id'
        ); 

        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->isPublished = $record->published;
        $this->userCat = $record->subs_cat_id;

    }

    public function index()
    {
        $this->data['page'] = 'specializations';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['published'] = $this->isPublished; 

        $join = array(
           array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.TBL_USER_DEPTS.'.dept_id', 'join_type' => 'inner')
        ); 

        $fields = array(
            TBL_DEPTS.'.dept_title as dept_title_en',
            TBL_DEPTS.'.dept_title_ar',
            TBL_USER_DEPTS.'.*'
        );

        //Get user departments 
        $this->data['department'] = $this->modelDeptAlias->fetchFields( $fields, array(TBL_USER_DEPTS.'.user_id' => $this->encrypt->decode($this->user['user_id'])), array(), null, null, $join);  

        $this->data['user_id'] = (int) $this->encrypt->decode($this->user['user_id']); 
        $this->load->model(SITE_MODELS."specialization_subs_model", "modelSubsSplAlias");

        if($this->input->post())
        {

            if($this->input->post('dept'))
            {
                $save = array();

                $depts = $this->input->post('dept');

                foreach ($depts as $key => $value)
                {
                    array_push($save, array(
                        'dept_id' => (int) $this->input->post('department', TRUE),
                        'subs_id' => (int) $this->encrypt->decode($this->user['user_id']),
                        'spl_id' => $value
                    ));    
                }

                $this->modelSubsSplAlias->removeSplzns((int) $this->input->post('department', TRUE), (int) $this->encrypt->decode($this->user['user_id']));
                $this->modelSubsSplAlias->saveSplzns($save);

                $this->session->set_flashdata('message', 'Specializations updated!');
                redirect($this->ctrlUrl); 

            }
            else
            {

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Please choose your specializations';
            }

        }
 
        $this->load->view($this->layout, $this->data);

    }

}