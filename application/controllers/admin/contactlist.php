<?php 

if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Contactlist extends MY_Controller {
 
    public function __construct(){
        
        parent::__construct();
        $this->_menu_item = 'contactlist';
        
    }
    
    public function index()
    {
        $data = array();
        $data['content'] = 'admin/contact_list/index';
        $data['title'] = 'Contact List Management';
 
        $this->load->library('contactlist_service');
        $this->load->library('encrypt');
 
        if(Contactlist::get_instance()->input->post()){
            $data['records'] = $this->contactlist_service->search(Contactlist::get_instance()->input->post('list_title'));
        }else{
            $data['records'] = $this->contactlist_service->get_contactlists( array(), array(), null, null);
        }
        $this->load->view($this->layout, $data);
    }
    
    public function create()
    {
        $this->load->library('contactlist_service');
        
        $data = array();
        $data['content'] = 'admin/contact_list/add';
        $data['title'] = 'Contact List Management - New';
        $data['sub_title'] = 'Add your favourite contact lists here';
        $data['users'] = $this->user_service->get_users();
        
        if(Contactlist::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('list_title', 'List Title', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $value = array(
                    TBL_CONTACT_LIST.'.list_title' => Contactlist::get_instance()->input->post('list_title'),
                    TBL_CONTACT_LIST.'.contacts_count' => 0,
                    TBL_CONTACT_LIST.'.created_on' => date('Y-m-d H:i:s'),
                    TBL_CONTACT_LIST.'.updated_on' => date('Y-m-d H:i:s')
                );
                
                $this->contactlist_service->save_contactlist($value);
                $this->session->set_flashdata('message', 'Created!');
                redirect('/admin/contactlist/');
            }
        }
        $this->load->view($this->layout, $data);
    }
    
    public function edit($id)
    {
        $this->load->library('contactlist_service');
        $this->load->library('encrypt');
        
        $data = array();
        $data['content'] = 'admin/contact_list/edit';
        $data['title'] = 'Contact List Management - Update';
        $data['sub_title'] = 'Update your favourite contact lists here';
        $id = $this->encrypt->decode($id);
        
        $where = array(
            TBL_CONTACT_LIST.'.id' => $id
        );
        
        $data['record'] = $this->contactlist_service->get_contactlist_by_pk($id);
        
        if(Contactlist::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('list_title', 'List Title', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $value = array(
                    TBL_CONTACT_LIST.'.list_title' => Contactlist::get_instance()->input->post('list_title'),
                    TBL_CONTACT_LIST.'.contacts_count' => 0,
                    TBL_CONTACT_LIST.'.created_on' => date('Y-m-d H:i:s'),
                    TBL_CONTACT_LIST.'.updated_on' => date('Y-m-d H:i:s')
                );
                $this->contactlist_service->save_contactlist( $value, $where);
                $this->session->set_flashdata('message', 'Updated!');
                redirect('/admin/contactlist/');
            }
        }
        $this->load->view($this->layout, $data);
    }

    public function delete($id)
    {

        $this->load->library('encrypt');
        $this->load->library('contactlist_service');
        
        $id = $this->encrypt->decode($id);        
        $record = $this->contactlist_service->get_contactlist_by_pk($id);
        
        if(!$record){
            
            show_404();
        }else{
 
            if($this->contactlist_service->remove_contact_list($id))
            {                
                $this->session->set_flashdata('message', 'Deleted!');
                redirect('/admin/contactlist/');              
            }else{
                
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect('/admin/contactlist/');
            }
            
        }
        
    }
    
    public function import($id)
    {
        
        $data = array();
        
        $data['content'] = 'admin/contact_list/import';
        $data['title'] = 'Import Contacts To';
        $data['sub_title'] = 'Upload your contacts onto contact list using a *.csv file';
        
        $this->load->library('encrypt');   
        $this->load->library('contactlist_service');
        
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->contactlist_service->get_contactlist_by_pk($id);
        
        if(Contactlist::get_instance()->input->post())
        {

            $err_import = 0;
            $this->load->library('csvimport');
            $config['upload_path'] = UPLOAD_FOLDER.'csv/';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '2000';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                
                $data['error'] = $this->upload->display_errors();
                
            }else{
                
                $file_data = $this->upload->data();
                $file_path =  UPLOAD_FOLDER.'csv/'.$file_data['file_name'];
                
                if ($this->csvimport->get_array($file_path)){
                
                    $csv_array = $this->csvimport->get_array($file_path);
                    $this->load->helper('email');
                    
                    foreach ($csv_array as $row){
 
                        if( $row['email'] != '' && valid_email($row['email']))
                        {
                            $er_description = NULL;
                        }else{
                            
                            $er_description = 'Invalid Email';
                            $err_import = ++$err_import;
                        }
                        $save = array(
                            TBL_CONTACTS.'.list_id' => $id,
                            TBL_CONTACTS.'.first_name' => $row['firstname'],
                            TBL_CONTACTS.'.last_name' => $row['lastname'],
                            TBL_CONTACTS.'.email' => $row['email'],
                            TBL_CONTACTS.'.status' => 1,
                            TBL_CONTACTS.'.er_description' => $er_description,
                            TBL_CONTACTS.'.created_on' => date('Y-m-d H:i:s'),
                            TBL_CONTACTS.'.updated_on' => date('Y-m-d H:i:s'),
                        );
                        $this->contactlist_service->save_contact($save);
                    }

                    $this->recalc_contacts_count($id);
                    $data['err_import'] = $err_import;

                }

            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    
    public function list_contacts($id)
    { 
        $this->load->library('contactlist_service');
        $this->load->library('encrypt');
        
        $data = array();
        $data['content'] = 'admin/contact_list/list_contacts';
        $data['title'] = ' - Contacts';
        $data['sub_title'] = 'Seeing the contacts of ';
        $data['list_id'] = $id = $this->encrypt->decode($id);
        $data['clist'] = $this->contactlist_service->get_contactlist_by_pk($id);
        
        if(Contactlist::get_instance()->input->post())
        {
            $where = array(
                TBL_CONTACTS.'.list_id' => $id,
                TBL_CONTACTS.'.email' => Contactlist::get_instance()->input->post('list_title')
            );
        }else{
            $where = array(
                TBL_CONTACTS.'.list_id' => $id  
            );
        }
        
        $data['records'] = $this->contactlist_service->get_contacts($where);
        $this->load->view($this->layout, $data);
    }
    
    public function add_contact($id)
    { 
        $this->load->library('contactlist_service');
        $this->load->library('encrypt');
        
        $data = array();
        $data['content'] = 'admin/contact_list/add_contact';
        $data['title'] = ' - New Contact';
        $data['sub_title'] = 'Add contacts to ';
        $data['list_id'] = $id = $this->encrypt->decode($id);
        $data['clist'] = $clist = $this->contactlist_service->get_contactlist_by_pk($id);
        
        if(Contactlist::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean');
            $this->form_validation->set_rules('email', 'Contact email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    TBL_CONTACTS.'.list_id' => $id,
                    TBL_CONTACTS.'.first_name' => Contactlist::get_instance()->input->post('first_name'),
                    TBL_CONTACTS.'.last_name' => Contactlist::get_instance()->input->post('last_name'),
                    TBL_CONTACTS.'.email' => Contactlist::get_instance()->input->post('email'),
                    TBL_CONTACTS.'.status' => 1,
                    TBL_CONTACTS.'.er_description' => NULL,
                    TBL_CONTACTS.'.created_on' => date('Y-m-d H:i:s'),
                    TBL_CONTACTS.'.updated_on' => date('Y-m-d H:i:s')
                );
                $this->contactlist_service->save_contact($save);
                $this->recalc_contacts_count($id);
                $this->session->set_flashdata('message', 'Added new contact to '.$clist->list_title);
                redirect('/admin/contactlist/list_contacts/'.$this->encrypt->encode($id));
            }
        } 
        $this->load->view($this->layout, $data);
    }
    
    public function edit_contact($id, $contact_id)
    { 
        $this->load->library('contactlist_service');
        $this->load->library('encrypt');
        
        $data = array();
        $data['content'] = 'admin/contact_list/edit_contact';
        $data['title'] = ' - New Contact';
        $data['sub_title'] = 'Add contacts to ';
        $data['list_id'] = $id = $this->encrypt->decode($id);
        $contact_id = $this->encrypt->decode($contact_id);
        
        $data['clist'] = $clist = $this->contactlist_service->get_contactlist_by_pk($id);
        $data['record'] = $this->contactlist_service->get_contact_by_id($contact_id);
        
        if(Contactlist::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean');
            $this->form_validation->set_rules('email', 'Contact email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {

                $save = array(
                    TBL_CONTACTS.'.list_id' => $id,
                    TBL_CONTACTS.'.first_name' => Contactlist::get_instance()->input->post('first_name'),
                    TBL_CONTACTS.'.last_name' => Contactlist::get_instance()->input->post('last_name'),
                    TBL_CONTACTS.'.email' => Contactlist::get_instance()->input->post('email'),
                    TBL_CONTACTS.'.status' => 1,
                    TBL_CONTACTS.'.er_description' => NULL,
                    TBL_CONTACTS.'.created_on' => date('Y-m-d H:i:s'),
                    TBL_CONTACTS.'.updated_on' => date('Y-m-d H:i:s')
                );
                $where = array(
                    TBL_CONTACTS.'.id' => $contact_id
                );
                
                $this->contactlist_service->save_contact($save, $where);
                $this->recalc_contacts_count($id);
                $this->session->set_flashdata('message', 'Updated contact on '.$clist->list_title);
                redirect('/admin/contactlist/list_contacts/'.$this->encrypt->encode($id));
                
            }
 
        } 
        
        $this->load->view($this->layout, $data);
        
    }
    
    public function delete_contact($id, $contact_id)
    {
        $this->load->library('encrypt');
        $this->load->library('contactlist_service');
        
        $id = $this->encrypt->decode($id);
        $contact_id = $this->encrypt->decode($contact_id);
        $list = $this->contactlist_service->get_contactlist_by_pk($id);
        $contact = $this->contactlist_service->get_contact_by_id($contact_id);
        
        if(!$contact){
            show_404();
        }else{
            $where = array(
                TBL_CONTACTS.'.id' => $contact_id
            );
            if($this->contactlist_service->delete_contact($where))
            {
                $this->recalc_contacts_count($id);
                $this->session->set_flashdata('message', 'Deleted! contact on '.$list->list_title);
                redirect('/admin/contactlist/list_contacts/'.$this->encrypt->encode($id));
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect('/admin/contactlist/list_contacts/'.$this->encrypt->encode($id));
            }
        }
    }
    
    private function recalc_contacts_count($list_id)
    {
        $this->load->library('contactlist_service');
        $total_contacts = (int) $this->contactlist_service->get_total_contacts_by_list($list_id);
        $this->contactlist_service->set_total_counts_count( $list_id, $total_contacts);
    }
    
}