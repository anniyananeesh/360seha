<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends MY_Controller {
 
	protected $uploadFile;
    protected $table = TBL_DEPTS;
    protected $ctrlUrl;
    protected $classViews = 'admin/departments/';
 
    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/departments/';
        $this->load->model('admin/department_model','modelNameAlias');
        $this->uploadFile = array();
    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;

        $data['title'] = 'Departments';
        $data['sub_title'] = 'Manage your departments here';
        $data['records'] = $records = $this->modelNameAlias->fetchAll();
        $this->load->view($this->layout, $data);

        /*$orderBy = 1;

        foreach ($records as $key => $value) 
        {

            $save = array(
                $this->table.'.orderby' => $orderBy
            ); 
               
            $where = array(
                $this->table.'.dept_id' => $value->dept_id
            );
           
            $this->modelNameAlias->save( $save, $where);

            $orderBy = ++$orderBy; 
        }*/

    }

    public function add()
    {
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;

        $data['title'] = 'Add Department';
        $data['sub_title'] = 'Manage your departments here';
        $error = false; 
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|required|xss_clean');

            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
               $save = array(
                    $this->table.'.dept_title' => $this->input->post('title'),
                    $this->table.'.dept_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.show_status' => 1, 
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                ); 

                $id = $this->modelNameAlias->save($save); 

                $this->session->set_flashdata('message', 'Department added!');
                redirect($this->ctrlUrl);
                
            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }

    public function edit($id)
    {
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Update Department';
        $data['sub_title'] = 'Manage your department';
        
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->modelNameAlias->fetchById($id);
        
        if($this->input->post())
        {  
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.dept_title' => $this->input->post('title'),
                    $this->table.'.dept_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                ); 
               
                $where = array(
                    $this->table.'.dept_id' => $id
                );
 
                $this->modelNameAlias->save( $save, $where);
                $this->session->set_flashdata('message', 'Department updated!');
                redirect($this->ctrlUrl);
            } 
        }
        
        $this->load->view($this->layout, $data); 
    }

    public function status($id,$status)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->modelNameAlias->fetchById($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
            
        }else{
 
            $save = array(
                $this->table.'.show_status' => $status
            );

            $where = array(
                $this->table.'.dept_id' => $id
            );

            $this->modelNameAlias->save($save, $where); 

            $this->session->set_flashdata('message', 'Status changed!');
            redirect($this->ctrlUrl);
        }
    }

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->modelNameAlias->fetchById($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{

            $where = array(
                $this->table.'.dept_id' => $id
            );
 
            if($this->modelNameAlias->delete($where))
            {
                $this->session->set_flashdata('message', 'Department deleted!');
                redirect($this->ctrlUrl);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrlUrl);
            }
            
        }

        $this->load->view($this->layout, $data);
        
    } 

    public function grp_action()
    {
        $post = $this->input->post();

        switch($post['action'])
        {
            case 'order':
                if(count($post['orderby']) > 0)
                {
                    foreach($post['orderby'] AS $key => $value)
                    {
                        $save = array(
                            $this->table.'.orderby' => $value
                        );

                        $where = array($this->table.'.dept_id' => $this->encrypt->decode($post['idarray'][$key]));

                        $this->modelNameAlias->save( $save, $where);
                    }

                    $this->session->set_flashdata('message', 'Order updated!');
                    redirect($this->ctrlUrl);

                }else{
                    
                    $this->session->set_flashdata('notify_error', 'No Subscribers has been selected!');
                    redirect($this->ctrlUrl);
                }
                
            break;

            default:
                $this->session->set_flashdata('notify_error', 'No Subscribers has been selected!');
                redirect($this->ctrlUrl);
            break;
        }
    }

}