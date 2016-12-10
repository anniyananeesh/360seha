<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;
	protected $isPublished;
	protected $userMainTitle;
	protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'appointments_model', 'modelNameAlias');

        $this->ctrlUrl = '/account/appointments';
        $this->nextUrl = '/account/details';

        $fields = array(TBL_SUBSCRIBERS.'.published', TBL_SUBSCRIBERS.'.subs_title'); 
        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));

        $this->isPublished = $record->published;
        $this->userMainTitle = $record->subs_title;
        $this->table = TBL_APPOINTMENTS;
    }

    public function index()
    {
    	$this->data['page'] = 'appointments/index';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['ctrlUrl'] = $this->ctrlUrl;
        $this->data['published'] = $this->isPublished;

        $join = array(
           array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.$this->table.'.dept_fk', 'join_type' => 'LEFT'),
           array('table' => TBL_PATIENTS, 'condition' => TBL_PATIENTS.'.id = '.$this->table.'.user_id', 'join_type' => 'LEFT'),
           array('table' => TBL_SUBSCRIBERS, 'condition' => TBL_SUBSCRIBERS.'.user_id = '.$this->table.'.subscriber', 'join_type' => 'LEFT')
        );

        $fields = array(
        	TBL_DEPTS.'.dept_title as dept_title_en',
        	TBL_DEPTS.'.dept_title_ar',
        	TBL_DEPTS.'.dept_id',
        	TBL_PATIENTS.'.full_name as patient',
        	TBL_PATIENTS.'.id as patient_id',
        	$this->table.'.*'
        );

        $where = array(
        	TBL_SUBSCRIBERS.'.user_id' => (int) $this->encrypt->decode($this->user['user_id'])
        );

        $this->data['records'] = $this->modelNameAlias->fetchFields($fields, $where, array(), null, null, $join);

        $this->load->view($this->layout, $this->data);
    }
    
    public function edit($id)
    {
    	$this->data['page'] = 'appointments/edit';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['ctrlUrl'] = $this->ctrlUrl;
        $this->data['published'] = $this->isPublished; 


        $join = array(
           array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.$this->table.'.dept_fk', 'join_type' => 'LEFT'),
           array('table' => TBL_PATIENTS, 'condition' => TBL_PATIENTS.'.id = '.$this->table.'.user_id', 'join_type' => 'LEFT'),
           array('table' => TBL_SUBSCRIBERS, 'condition' => TBL_SUBSCRIBERS.'.user_id = '.$this->table.'.subscriber', 'join_type' => 'LEFT')
        );

        $fields = array(
        	TBL_DEPTS.'.dept_title as dept_title_en',
        	TBL_DEPTS.'.dept_title_ar',
        	TBL_DEPTS.'.dept_id',
        	TBL_PATIENTS.'.full_name as patient',
        	TBL_PATIENTS.'.id as patient_id',
        	$this->table.'.*'
        );

        $id = $this->encrypt->decode($id);

        $where = array(
        	$this->table.'.id' => $id,
        	$this->table.'.subscriber' => (int) $this->encrypt->decode($this->user['user_id'])
        );

        $record = $this->modelNameAlias->fetchRowFields($fields, $where, array(), $join);
 
        $this->data['post'] = (array) $record; 

        if($this->input->post())
        {
        	$this->data['post'] = $this->input->post();

        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('appointment_day', 'Appointment day', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('appointment_time', 'Time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
 
            $this->form_validation->set_message('required', '%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

            	$appointmentDay = $this->input->post('appointment_day');
            	$appointmentTime = $this->input->post('appointment_time');

            	$save = array(
                    $this->table.'.appointment_time' => ($appointmentTime != '') ? date('h:i A', strtotime($appointmentTime)) : '',
                    $this->table.'.appointment_day' => ($appointmentDay != '') ? date('m/d/Y', strtotime($appointmentDay)) : '',
                    $this->table.'.status' => $this->input->post('status'), 
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                ); 

                $where = array(
		        	$this->table.'.id' => (int) $id,
		        	$this->table.'.subscriber' => (int) $this->encrypt->decode($this->user['user_id'])
		        ); 
                $this->modelNameAlias->save($save, $where);

                $this->session->set_flashdata('message', 'Appointment details updated!');
                redirect($this->ctrlUrl);

            }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function delete($id)
    {
    	$id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchRowFields(array('id'), array('id'=>$id));

        if(empty($record))
        {
        	$this->session->set_flashdata('message', 'No record found!');
        	redirect($this->ctrlUrl);
        }else{

        	$where = array(
        		$this->table.'.id' => $id
        	);

        	$this->modelNameAlias->delete($where);

        	$this->session->set_flashdata('message', 'Appointment deleted!');
        	redirect($this->ctrlUrl);

        }

    }

}