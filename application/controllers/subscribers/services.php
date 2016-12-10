<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends Account_Controller{
    
    protected $view;
    protected $table = TBL_SERVICES;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('currency_model');
        $this->view = SUBSRIBER_URL.'services';
    } 
 
    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Our Services Page';
        $this->data['sub_title'] = 'Manage your services details here';
        
        $where = array(
            $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id'])
        );

        if($this->input->post())
        {
            $where[$this->table.'.services_title'] = $this->input->post('services_title');
            $this->data['services'] = $this->subscriber_service->get_services_subscribers( $where);
        }else{
            $this->data['services'] = $this->subscriber_service->get_services_subscribers( $where);
        }
        $this->load->view($this->layout, $this->data);
    }
    
    public function add()
    {
        $this->data['content'] = $this->view.'/add';
        $this->data['title'] = 'Add new service';
        $this->data['sub_title'] = 'Manage your services details here';
        $error = false;
        $file_data = array();

        if($this->input->post())
        {
            $this->load->library('form_validation');

            if($_FILES['userfile']['name'] != ""){
 
                $config['upload_path'] = UPLOAD_FOLDER.'page-contents/services/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '800';
                $config['max_width'] = '640';
                $config['max_height'] = '640';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload())
                {
                    $this->data['error'] = $this->upload->display_errors();
                    $error = true;
                }else{
                    $file_data = $this->upload->data();
                }
            
            }
            
            $this->form_validation->set_rules('title', 'Service\'s Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Service\'s Name In Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Service description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Service description Arabic', 'trim|required|xss_clean'); 
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE && !$error)
            {
                $save = array(
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.services_title' => $this->input->post('title'),
                    $this->table.'.services_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.services_description' => $this->input->post('description'),
                    $this->table.'.services_description_ar' => $this->input->post('description_ar'),
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[$this->table.'.services_image'] = $file_data['file_name'];
                }

                if(!isset($this->data['error']))
                {
                    $this->subscriber_service->save_service($save);
                    $this->session->set_flashdata('message', 'Service added!');
                    redirect($this->data['ctrl_url']);
                }
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }
    
    public function edit($id)
    { 
        $this->data['content'] = $this->view.'/edit';
        $this->data['title'] = 'Update service';
        $this->data['sub_title'] = 'Manage your services details here';
        $id = $this->encrypt->decode($id);        
        $this->data['record'] = $this->subscriber_service->get_service_by_pk($id);
        $error = false;
        $file_data = array();

        if($this->input->post())
        {
            $this->load->library('form_validation');
 
            if($_FILES['userfile']['name'] != ""){
 
                $config['upload_path'] = UPLOAD_FOLDER.'page-contents/services/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '800';
                $config['max_width'] = '640';
                $config['max_height'] = '640';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload())
                {
                    $this->data['error'] = $this->upload->display_errors();
                    $error = true;
                }else{
                    $file_data = $this->upload->data();
                }
            
            }
            
            $this->form_validation->set_rules('title', 'Service\'s Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Service\'s Name In Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Service description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Service description Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE && !$error)
            {
                $save = array(
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.services_title' => $this->input->post('title'),
                    $this->table.'.services_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.services_description' => $this->input->post('description'),
                    $this->table.'.services_description_ar' => $this->input->post('description_ar'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s') 
                );
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[$this->table.'.services_image'] = $file_data['file_name'];
                }
                
                $where = array(
                    $this->table.'.services_id' => $id
                );
                
                if(!isset($this->data['error']))
                {
                    $this->subscriber_service->save_service( $save, $where);
                    $this->session->set_flashdata('message', 'Service updated!');
                    redirect($this->data['ctrl_url']);
                }
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_service_by_pk($id);
        
        if(!$record)
        {
            
            redirect(ERROR_404);
            exit(1);
            
        }else{
            
            $where = array(
                $this->table.'.services_id' => $id
            );
            
            //Delete from the table after its found
            if($this->subscriber_service->unset_service($where))
            {
                $this->session->set_flashdata('message', 'Deleted!');
                redirect($this->data['ctrl_url']);
            }else{
                
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
        }

        $this->load->view($this->layout, $this->data);
    }  

    public function validate_csv($str)
    {
        $str = explode(',', $str);

        if(empty($str) || count($str) == 0)
        {
           $this->form_validation->set_message('validate_csv', 'Value should be in CSV format');
           return false;
        }else{
          return true;
        }
    }

    public function status($id,$status)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_service_by_pk($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{
            
            $save = array(
                $this->table.'.show_status' => $status
            );

            $where = array(
                $this->table.'.services_id' => $id
            );
            
            //Delete from the table after its found
            if($this->subscriber_service->save_service( $save, $where))
            {
                $this->session->set_flashdata('message', 'Updated the status!');
                redirect($this->data['ctrl_url']);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
        }

        $this->load->view($this->layout, $this->data);
        
    }
}