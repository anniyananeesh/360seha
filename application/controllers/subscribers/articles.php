<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends Account_Controller{
    
    protected $view;
    protected $table = TBL_ARTICLES;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'articles';
    }

    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Articles Page';
        $this->data['sub_title'] = 'Manage your articles here';
        $where = array(
            $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id'])
        );
        $this->data['notes'] = $this->subscriber_service->get_articles($where);
        $this->load->view($this->layout, $this->data);
    }
    
    
    public function add()
    {
        $this->data['content'] = $this->view.'/add';
        $this->data['title'] = 'Add article';
        $this->data['sub_title'] = 'Manage your articles page';
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'News title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'News title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|required|xss_clean');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.title' => $this->input->post('title'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.description' => $this->input->post('description'),
                    $this->table.'.description_ar' => $this->input->post('description_ar'),
                    $this->table.'.show_status' => 1,
                    $this->table.'.subscriber_type' => (int) $this->user['subs_type'],
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
 
                $this->subscriber_service->save_article($save);
                $this->session->set_flashdata('message', 'Article added!');
                redirect($this->data['ctrl_url']);
            }
        }

        $this->load->view($this->layout, $this->data);
    }
    
    public function edit($id)
    {
        $this->data['content'] = $this->view.'/edit';
        $this->data['title'] = 'Edit article';
        $this->data['sub_title'] = 'Manage your article page';
        $id = $this->encrypt->decode($id);
        $this->data['record'] = $this->subscriber_service->get_article_by_pk($id);
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'News title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'News title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|required|xss_clean');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.title' => $this->input->post('title'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.description' => $this->input->post('description'),
                    $this->table.'.description_ar' => $this->input->post('description_ar'),
                    $this->table.'.subscriber_type' => (int) $this->user['subs_type'],
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
               
                $where = array(
                    $this->table.'.articles_id' => $id
                );
 
                $this->subscriber_service->save_article( $save, $where);
                $this->session->set_flashdata('message', 'Article updated!');
                redirect($this->data['ctrl_url']);  
            }
        }

        $this->load->view($this->layout, $this->data);
    }

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_article_by_pk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{
            
            $where = array(
                $this->table.'.articles_id' => $id
            );
 
            if($this->subscriber_service->unset_article($where))
            {
                $this->session->set_flashdata('message', 'Article deleted!');
                redirect($this->data['ctrl_url']);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
        }

        $this->load->view($this->layout, $this->data);
    }

    public function status($id,$status)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_article_by_pk($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{

            $save = array(
                $this->table.'.show_status' => $status
            );
            
            $where = array(
                $this->table.'.articles_id' => $id
            );

            if($this->subscriber_service->save_article($save,$where))
            {
                $this->session->set_flashdata('message', 'Article status updated!');
                redirect($this->data['ctrl_url']);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
            
        }

        $this->load->view($this->layout, $this->data);
    }
}