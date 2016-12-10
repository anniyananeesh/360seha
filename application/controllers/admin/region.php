<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Region extends MY_Controller{
    
    protected $table = TBL_ADS;
    protected $ctrlUrl;
    protected $classViews = 'admin/region/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/region/';
        $this->load->library('region_service');
        $this->load->library('city_service');
    }
    
    public function index()
    {
        $data = array();
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Region List';
        $data['cities'] = $this->city_service->get();
 
        if($this->input->post()){
            
            $where = array();
            if($this->input->post('city') != "")
            {
                $where[$this->table.".city_pk"] = $this->encrypt->decode($this->input->post('city'));
            }
            if($this->input->post('name') != "")
            {
                $where[$this->table.".reg_name"] = $this->input->post('name');
            }
            $data['records'] = $this->region_service->get($where);
            
        }else{
            $data['records'] = $this->region_service->get();
        }
        $this->load->view($this->layout, $data);
    }
    
    public function create()
    {
        $data = array();
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Add Region';
        $data['sub_title'] = 'Add your region details here';
        $data['cities'] = $this->city_service->get();
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Region Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.reg_name' => $this->input->post('name'),
                    $this->table.'.city_pk' => $this->encrypt->decode($this->input->post('city')),
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
                $this->region_service->save($save);
                $this->session->set_flashdata('message', 'Created!');
                redirect($this->ctrlUrl);
            }
        }
        $this->load->view($this->layout, $data);
    }
    
    public function edit($id)
    {
        $data = array();
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Update Region';
        $data['sub_title'] = 'Update your region details here';
        
        $id = $this->encrypt->decode($id);
        $where = array(
            $this->table.'.id' => $id
        );

        $data['record'] = $this->region_service->get_region_by_pk($id);
        $data['cities'] = $this->city_service->get();
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Region Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.reg_name' => $this->input->post('name'),
                    $this->table.'.city_pk' => $this->encrypt->decode($this->input->post('city')),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
                $where = array(
                  $this->table.'.id' => $id  
                );
                $this->region_service->save($save, $where);
                $this->session->set_flashdata('message', 'Updated!');
                redirect($this->ctrlUrl);
                
            }
        }
        $this->load->view($this->layout, $data);
    }
    
    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->region_service->get_region_by_pk($id);
        
        if(!$record){
            show_404();
        }else{
            $where = array(
                $this->table.'.id' => $id
            );

            if($this->region_service->remove($where))
            {
                $this->session->set_flashdata('message', 'Deleted!');
                redirect($this->ctrlUrl);              
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrlUrl);
            }
        }
    }
}