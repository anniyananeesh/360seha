<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Contactlist_service
{

    public function save_contactlist($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('contactlist_model');
        return $CI->contactlist_model->save( $save, $where);
    }
    
    public function get_contactlists($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('contactlist_model');
        return $CI->contactlist_model->get_category($condition, $orderBy, $limit, $offset, $join);
    }
    
    public function get_contactlist_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('contactlist_model');
        
        return $CI->contactlist_model->fetchById($id);
    }
    
    public function remove_contact_list($id)
    {
        $CI = & get_instance();
        $CI->load->model('contactlist_model'); 
        $where = array(TBL_CONTACT_LIST.'.id' => $id);
        return $CI->contactlist_model->delete( $where);
    }
    
    public function save_contact($csv, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('contacts_model');
        return $CI->contacts_model->save( $csv, $where);
    }
    
    public function get_contacts($where = array())
    {
        $CI = & get_instance();
        $CI->load->model('contacts_model');
        return $CI->contacts_model->get_contacts($where);
    }
    
    public function get_contact_by_id($id)
    {
        $CI = & get_instance();
        $CI->load->model('contacts_model');
        return $CI->contacts_model->fetchById($id);
    }
    
    public function delete_contact($where = array())
    {
        $CI = & get_instance();
        $CI->load->model('contacts_model');
        return $CI->contacts_model->delete($where);
    }
    
    public function get_total_contacts_by_list($list_id)
    {
        $CI = & get_instance();
        $CI->load->model('contacts_model');
        $where = array(TBL_CONTACTS.'.list_id' => $list_id);
        return $CI->contacts_model->get_contact_count($where);
    }
    
    public function has_contacts($list_id)
    {
        $count = $this->get_total_contacts_by_list($list_id);
        if($count == 0){return false;}else{return true;}
    }
    
    public function set_total_counts_count($list_id, $count)
    {
        $CI = & get_instance();
        $CI->load->model('contactlist_model');
        $where = array(TBL_CONTACT_LIST.'.id' => $list_id);
        $value = array(TBL_CONTACT_LIST.'.contacts_count' => $count);
        return $CI->contactlist_model->save( $value, $where);
    }
    
    public function search($title)
    {
        $CI = & get_instance();
        $CI->load->model('contactlist_model');
        return $CI->contactlist_model->search($title);
    }
    
}