<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Contact extends Account_Controller {
    
    protected $view;
    protected $table = TBL_SUBSCRIBERS;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'contact'; 
    }
 
    public function index()
    {  
        $this->load->library('city_service'); 
        $this->load->model('country_model');
        $this->load->library('region_service');

        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Contact us Page';
        $this->data['sub_title'] = 'Manage your contact us page here';
        
        $this->data['record'] = $record = $this->subscriber_service->get_subscriber_by_pk($this->encrypt->decode($this->user['user_id']));

        $this->data['country'] = $this->country_model->fetchAll(array(),array('orderby'=>'ASC'));
        $this->data['cities'] = $this->city_service->get();
        $this->data['regions'] = $this->region_service->get_regions_by_city($record->subs_state);
        $this->data['post'] = (array) $record;

        if($this->input->post())
        {
                $save = array(
                    $this->table.'.subs_address_1' => $this->input->post('subs_address_1'),
                    $this->table.'.subs_address_1_ar' => $this->input->post('subs_address_1_ar'),
                    $this->table.'.subs_address_2' => $this->input->post('subs_address_2'),
                    $this->table.'.subs_address_2_ar' => $this->input->post('subs_address_2_ar'),
                    $this->table.'.city' => $this->input->post('city'),
                    $this->table.'.subs_state' => $this->input->post('subs_state'),
                    $this->table.'.subs_country' => $this->input->post('subs_country'),

                    $this->table.'.subs_lat_id' => $this->input->post('subs_lat_id'),
                    $this->table.'.subs_long_id' => $this->input->post('subs_long_id'),
                    
                    $this->table.'.subs_email' => $this->input->post('subs_email'),
                    $this->table.'.subs_primary_contact' => $this->input->post('subs_primary_contact'),  
                    $this->table.'.subs_url' => ($this->input->post('subs_url') != "") ? $this->input->post('subs_url') : NULL,

                    $this->table.'.subs_fax_no' => ($this->input->post('subs_fax_no') != "") ? $this->input->post('subs_fax_no') : NULL,                
                    $this->table.'.subs_update' => date('Y-m-d H:i:s')
                );
            
                $where = array(
                    $this->table.'.user_id' => $this->encrypt->decode($this->user['user_id'])
                );
 
                $this->subscriber_service->save($save,$where);
                $this->session->set_flashdata('message', 'Contact updated!');
                redirect($this->data['ctrl_url']);
        }
        
        $this->load->view($this->layout, $this->data);
    } 
}