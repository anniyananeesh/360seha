<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
*/
/* City service */

Class City_service{
    
    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('city_model');
        return $CI->city_model->save( $save, $where);
        
    }
    
    public static function get($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()){
        
        $CI = & get_instance();
        $CI->load->model('city_model');
        
        return $CI->city_model->get($condition, $orderBy, $limit, $offset, $join);
        
    }
    
    public static function get_city_by_pk($id){
        
        $CI = & get_instance();
        $CI->load->model('city_model');
        
        return $CI->city_model->fetchById($id);
    }
    
    public static function remove($where){
        
        $CI = & get_instance();
        $CI->load->model('city_model'); 
        
        return $CI->city_model->delete( $where);
        
    }

    public static function lastOrderID(){
        
        $CI = & get_instance();
        $CI->load->model('city_model'); 
        
        return $CI->city_model->lastOrderID();
        
    }
    
}