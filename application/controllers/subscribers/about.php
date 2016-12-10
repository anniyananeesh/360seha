<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Account_Controller{
    
    protected $table_splzn = TBL_SUBS_SPECIALIZATION;
    protected $table = TBL_SUBSCRIBERS;
    protected $view;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'about';
        $this->load->model('specialization_model');
        $this->load->library('category_service');
    }

    public function index()
    { 
        $this->data['content'] = $this->view.'/about_us';
        $this->data['title'] = 'About Us Page';
        $this->data['sub_title'] = 'Manage your about us page';
        $this->data['post'] = $record = $this->data['user_details'];
        $this->data['child'] = $this->category_service->get_children($record->subs_cat_id);

        //Loading the specializations for the subscriber ...
        $where_spl = array( $this->table_splzn.'.subs_id' => $record->user_id);
        $this->data["splzn"] = $this->specialization_model->get($where_spl);
        $error = false;
        
        if($this->input->post())
        { 
            if($this->input->post('subs_title') == "" && $this->input->post('subs_title_ar') == "")
            {
                $error = true;
                $this->data["msg"] = "Fill in either english or arabic title";
            }

            if($this->input->post('description') == "" && $this->input->post('description_ar') == "")
            {
                $error = true;
                $this->data["msg2"] = "Fill in either english or arabic short description";
            }

            if(!$error)
            {
                $save = array(
                    $this->table.'.subs_title' => ($this->input->post('subs_title')) ? $this->input->post('subs_title') : NULL,
                    $this->table.'.subs_title_ar' => ($this->input->post('subs_title_ar')) ? $this->input->post('subs_title_ar') : NULL,
                    $this->table.'.description' => ($this->input->post('description')) ? $this->input->post('description') : NULL,
                    $this->table.'.description_ar' => ($this->input->post('description_ar')) ? $this->input->post('description_ar') : NULL,
                    $this->table.'.description_en_long' => ($this->input->post('description_en_long')) ? $this->input->post('description_en_long') : NULL,
                    $this->table.'.description_en_long_ar' => ($this->input->post('description_en_long_ar')) ? $this->input->post('description_en_long_ar') : NULL,
                    $this->table.'.meta_en' => ($this->input->post('meta_en') != "") ? serialize(explode(",", $this->input->post('meta_en'))) : NULL,
                    $this->table.'.meta_ar' => ($this->input->post('meta_ar') != "") ? serialize(explode(",", $this->input->post('meta_ar'))) : NULL
                );

                $where = array(
                    $this->table.'.user_id' => $this->encrypt->decode($this->user['user_id'])
                );

                //Set the user specializations her
                $this->set_spl($this->input->post(), $record->user_id);
                $this->subscriber_service->save($save,$where);
                $this->session->set_flashdata('message', 'About Page updated!');
                redirect($this->data['ctrl_url']); 
            }
            
        }
        
        $this->load->view($this->layout, $this->data);
    }

    private function set_spl($post, $id = NULL)
    {
        if(count($post['splzn']) > 0)
        {
            if($id != NULL)
            {
                $where = array($this->table_splzn.'.subs_id' => $id);
                $this->specialization_model->delete($where);
            }

            $splznarray_filtered = array_unique($post['splzn']);
        
            $set_spl = array();
            foreach($splznarray_filtered AS $spl)
            {array_push($set_spl, array( $this->table_splzn.'.subs_id' => $id, $this->table_splzn.'.spl_id' => (int) $spl));}
            $this->specialization_model->set($set_spl); 
        }
    }
}