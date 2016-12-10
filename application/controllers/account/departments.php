<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;

    protected $isPublished;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."department_user_model", 'modelNameAlias');
        $this->load->model(SITE_MODELS."department_model", 'modelDeptAlias');
        $this->ctrlUrl = '/account/departments';
        $this->nextUrl = '/account/specializations';

        $fields = array(
            TBL_SUBSCRIBERS.'.published'
        ); 

        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->isPublished = $record->published;

    }

    public function index()
    {
        $this->data['page'] = 'departments';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['published'] = $this->isPublished;      

        $this->data['records'] = $this->modelDeptAlias->fetchFields(array('dept_title as dept_title_en','dept_title_ar','dept_id'),array('show_status'=>1),array('dept_id'=>'DESC'));

        $fieldsDept = array(
            TBL_DEPTS.'.dept_id',
        );

        $join = array(
           array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.TBL_USER_DEPTS.'.dept_id', 'join_type' => 'LEFT'), 
        );

        $userDepts = $this->modelNameAlias->fetchFields($fieldsDept, array(TBL_USER_DEPTS.'.user_id' => $this->encrypt->decode($this->user['user_id'])), array(), null, null, $join);
        
        $userDeptFilterArray = array();

        foreach ($userDepts as $key => $value)
        {
            array_push($userDeptFilterArray, $value->dept_id);
        }
        
        $this->data['userDepts'] = $userDeptFilterArray;

        if($this->input->post())
        {

            if($this->input->post('dept'))
            {
                $save = array();

                $depts = $this->input->post('dept');

                foreach ($depts as $key => $value)
                {
                    array_push($save, array(
                        'user_id' => (int) $this->encrypt->decode($this->user['user_id']),
                        'dept_id' => $value
                    ));    
                }

                $this->modelNameAlias->removeDept((int) $this->encrypt->decode($this->user['user_id']));
                $this->modelNameAlias->saveDept($save);

                $this->session->set_flashdata('message', 'Departments updated!');
                redirect($this->ctrlUrl); 

            }else{

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Please choose your department';
            }

        }

        $this->load->view($this->layout, $this->data);
    }

}