<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insurance extends AccountController
{
	protected $ctrlUrl;
    protected $isPublished;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."insurance_user_model", 'modelNameAlias');
        $this->load->model(SITE_MODELS."insurance_model", 'modelInsuranceAlias');
        $this->ctrlUrl = '/account/insurance';

        $fields = array(
            TBL_SUBSCRIBERS.'.published'
        );

        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->isPublished = $record->published;

    }

    public function index()
    {
        $this->data['page'] = 'insurance';
        $this->data['published'] = $this->isPublished;

        $this->data['records'] = $this->modelInsuranceAlias->fetchFields(array('ins_title as title_en','ins_title_ar as title_ar','ins_id'),array('show_status'=>1),array('ins_id'=>'DESC'));

        $fieldsInsurance = array(
            TBL_GENERAL_INSURANCE.'.ins_id',
        );

        $join = array(
           array('table' => TBL_GENERAL_INSURANCE, 'condition' => TBL_GENERAL_INSURANCE.'.ins_id = '.TBL_CLIENT_INSURANCE.'.ins_id', 'join_type' => 'LEFT'),
        );

        $userInsurance = $this->modelNameAlias->fetchFields($fieldsInsurance, array(TBL_CLIENT_INSURANCE.'.subs_id' => $this->encrypt->decode($this->user['user_id'])), array(), null, null, $join);

        $userInsuranceFilterArray = array();

        foreach ($userInsurance as $key => $value)
        {
            array_push($userInsuranceFilterArray, $value->ins_id);
        }

        $this->data['userInsurance'] = $userInsuranceFilterArray;

        if($this->input->post())
        {
            if($this->input->post('ins'))
            {
                $save = array();

                $insurancePost = $this->input->post('ins');

                foreach ($insurancePost as $key => $value)
                {
                    array_push($save, array(
                        'subs_id' => (int) $this->encrypt->decode($this->user['user_id']),
                        'ins_id' => $value,
                        'created_on' => date('Y-m-d h:i:s A')
                    ));
                }

                $this->modelNameAlias->removeInsurance((int) $this->encrypt->decode($this->user['user_id']));
                $this->modelNameAlias->saveInsurance($save);

                $this->session->set_flashdata('message', 'Insurance updated!');
                redirect($this->ctrlUrl);

            }else{

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Please choose your insurance companies';
            }

        }

        $this->load->view($this->layout, $this->data);
    }

}
