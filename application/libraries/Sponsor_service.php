<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
Class Sponsor_service{
    
    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('sponsor_model');
        return $CI->sponsor_model->save( $save, $where);
    }
    
    public static function get($condition = array(), $fields = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('sponsor_model');
        return $CI->sponsor_model->get($condition, $fields, $orderBy, $limit, $offset, $join);
    }
    
    public static function get_sponsor_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('sponsor_model');
        return $CI->sponsor_model->fetchById($id);
    }
    
    public static function remove($where)
    {
        $CI = & get_instance();
        $CI->load->model('sponsor_model'); 
        return $CI->sponsor_model->delete( $where);
        
    }
    
}