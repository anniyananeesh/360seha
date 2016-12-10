<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Async extends CI_Controller 
{
    public $msg;
    
    public function __construct()
    {
        parent::__construct();
        $this->msg = array();

 	    if (!$this->input->is_ajax_request())
        { 
          exit('Oops ! illegal entry found... please do the request as an AJAX one');            
        }
    }
    
    public function show_hours_template()
    {
        $this->load->view('admin/async/show-hours');
    }
    
    public function get_children($pk)
    {
        $this->load->library('category_service');
        $async = $this->category_service->get_children($pk);
        echo json_encode($async);
    }

    public function get_departments($userID)
    {
        $this->load->model(SITE_MODELS.'/department_user_model', 'modelAlias');

        $join = array(
            array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.TBL_USER_DEPTS.'.dept_id', 'join_type' => 'inner')
        );

        $async = $this->modelAlias->fetchFields(array(TBL_DEPTS.'.dept_title as title_en', TBL_DEPTS.'.dept_title_ar as title_ar', TBL_DEPTS.'.dept_id as id'), array(TBL_USER_DEPTS.'.user_id' => (int) $this->encrypt->decode($userID), TBL_DEPTS.'.show_status' => 1), array(), null, null, $join);
        echo json_encode($async);
    }

    public function get_specializations($userID, $deptID)
    {
        $this->load->model(SITE_MODELS.'/specialization_subs_model', 'modelAlias');

        $join = array(
            array('table' => TBL_SPECIALIZATIONS, 'condition' => TBL_SPECIALIZATIONS.'.id = '.TBL_SUBS_SPECIALIZATION.'.spl_id', 'join_type' => 'inner')
        );

        $async = $this->modelAlias->fetchFields(array(TBL_SPECIALIZATIONS.'.title_en', TBL_SPECIALIZATIONS.'.title_ar', TBL_SPECIALIZATIONS.'.id'), array(TBL_SUBS_SPECIALIZATION.'.subs_id' => (int) $this->encrypt->decode($userID), TBL_SUBS_SPECIALIZATION.'.dept_id' => $deptID, TBL_SPECIALIZATIONS.'.show_status' => 1), array(), null, null, $join);

        echo json_encode($async);
    }

    public function save_account_type($id, $type)
    {
        $response = array();

        if(!empty($id) && !empty($type))
        {
            $this->load->model('admin/subscriber_model', 'modelNameAlias');

            switch ($type) {
                case 1:
                    $save = array('is_featured' => 1, 'account_type' => 1);
                    break;
                
                case 2:
                    $save = array('is_featured' => 0, 'account_type' => 2);
                    break;

                case 3:
                    $save = array('is_featured' => 0, 'account_type' => 3);
                    break;

                default:
                    $save = array('is_featured' => 0, 'account_type' => 3);
                    break;
            }

            $id = $this->encrypt->decode($id);

            $where = array('user_id' => $id);

            $this->modelNameAlias->save( $save, $where);

            $response['code'] = 200;
            $response['data'] = array();
            $response['response'] = 'STATUS_OK';

        }
        else
        {
            $response['code'] = 404;
            $response['data'] = array();
            $response['response'] = 'NO_DATA';
        }

        echo json_encode($response);
        
    }

}