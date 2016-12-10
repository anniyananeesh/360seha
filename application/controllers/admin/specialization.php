<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specialization extends MY_Controller {
 
	protected $uploadFile;
    protected $table = TBL_SPECIALIZATIONS;
    protected $ctrlUrl;
    protected $classViews = 'admin/specialization/';
    protected $join;
 
    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/specialization/';
        $this->load->model('admin/specialization_model','modelNameAlias');
        $this->load->model('admin/department_model','modelDeptAlias');
        $this->uploadFile = array();

        $this->join = array(
            array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.TBL_SPECIALIZATIONS.'.dept_id', 'join_type' => 'inner'),
        );
    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;

        $data['title'] = 'Specialization';
        $data['sub_title'] = 'Manage your specializations here';

        $data['records'] = $this->modelNameAlias->fetchAll( array(), array(), null, null, $this->join);
        $this->load->view($this->layout, $data);
    }

    public function add()
    {
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;

        $data['title'] = 'Add specialization';
        $data['sub_title'] = 'Manage your specializations here';
        $error = false; 

        $data['department'] = $this->modelDeptAlias->fetchAll(array('show_status' => 1));
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title_en', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dept_fk', 'Department', 'trim|required|xss_clean');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
               $save = array(
                    $this->table.'.title_en' => $this->input->post('title_en'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.dept_id' => $this->input->post('dept_fk'),
                    $this->table.'.show_status' => 1, 
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                ); 

                $id = $this->modelNameAlias->save($save); 

                $this->session->set_flashdata('message', 'Specialization added!');
                redirect($this->ctrlUrl);
                
            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }

    public function edit($id)
    {
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Update specialization';
        $data['sub_title'] = 'Manage your specialization';
        
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->modelNameAlias->fetchById($id, $this->join);
        $data['department'] = $this->modelDeptAlias->fetchAll(array('show_status' => 1));

        if($this->input->post())
        {  
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title_en', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dept_fk', 'Department', 'trim|required|xss_clean');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
               $save = array(
                    $this->table.'.title_en' => $this->input->post('title_en'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.dept_id' => $this->input->post('dept_fk'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                ); 
               
                $where = array(
                    $this->table.'.id' => $id
                );
 
                $this->modelNameAlias->save( $save, $where);
                $this->session->set_flashdata('message', 'Specialization updated!');
                redirect($this->ctrlUrl);
            } 
        }
        
        $this->load->view($this->layout, $data); 
    }

    public function status($id,$status)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->modelNameAlias->fetchById($id, $this->join);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
            
        }else{
 
            $save = array(
                $this->table.'.show_status' => $status
            );

            $where = array(
                $this->table.'.id' => $id
            );

            $this->modelNameAlias->save($save, $where); 

            $this->session->set_flashdata('message', 'Status changed!');
            redirect($this->ctrlUrl);
        }
    }

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->modelNameAlias->fetchById($id, $this->join);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{

            $where = array(
                $this->table.'.id' => $id
            );
 
            if($this->modelNameAlias->delete($where))
            {
                $this->session->set_flashdata('message', 'Specialization deleted!');
                redirect($this->ctrlUrl);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrlUrl);
            }
            
        }

        $this->load->view($this->layout, $data);
        
    } 

}