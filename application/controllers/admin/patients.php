<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patients extends MY_Controller {

    protected $table = TBL_PATIENTS;
    protected $ctrlUrl;
    protected $classViews = 'admin/patients/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/patients/';
        $this->load->library('patient_service');
    }
    
    public function index()
    {
        $data = array();
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Users List';
        
        if($this->input->post())
        {
            $where = (trim($this->input->post('reward_pts')) != "") ? array(
                $this->table.'.reward_points' => $this->input->post('reward_pts')
            ) : array();
            $data['records'] = $this->patient_service->get_patients( $where, array(), null, null);
        }else{
            $data['records'] = $this->patient_service->get_patients( array(), array(), null, null);
        }
        
        $this->load->view($this->layout, $data);
    }
 
    public function edit($id)
    {
        $data = array();
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Update User';
        $data['sub_title'] = 'Update user details here';
        
        $id = $this->encrypt->decode($id);
        $where = array(
            $this->table.'.id' => $id
        );

        $data['record'] = $this->patient_service->get_patient_by_pk($id);

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|xss_clean');
            $this->form_validation->set_rules('location', 'Location', 'trim|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.full_name' => $this->input->post('name'),
                    $this->table.'.email' => $this->input->post('email'),
                    $this->table.'.location' => $this->input->post('location'),
                    $this->table.'.phone' => $this->input->post('phone'),
                    $this->table.'.update_on' => date('Y-m-d H:i:s')
                );

                $where = array(
                  $this->table.'.id' => $id  
                );
                
                $this->patient_service->save($save, $where);
                $this->session->set_flashdata('message', 'Updated!');
                redirect($this->ctrlUrl);
            }
        }
        $this->load->view($this->layout, $data);
    }
    
    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->patient_service->get_patient_by_pk($id);
        
        if(!$record){
            redirect(ERROR_404);
            exit(1);
        }else{
            $where = array(
                $this->table.'.id' => $id
            );

            if($this->patient_service->unset_patient($where))
            {
                $this->session->set_flashdata('message', 'Deleted!');
                redirect($this->ctrlUrl);         
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrlUrl);
            }
        }
    }

    public function status($id,$status)
    { 
        $id = $this->encrypt->decode($id);
        $record = $this->patient_service->get_patient_by_pk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }

        $save = array(
            $this->table.'.status' => (int) $status
        );

        $where = array(
            $this->table.'.id' => $id
        );

        $this->patient_service->save($save, $where);

        $this->session->set_flashdata('message', 'Status of user => <strong>'.$record->full_name.'</strong> updated!');
        redirect($this->ctrlUrl);
    } 
}