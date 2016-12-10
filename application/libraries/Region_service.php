<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Region_service{
    
    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('region_model');
        
        return $CI->region_model->save( $save, $where);
        
    }
    
    public static function get($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()){
        
        $CI = & get_instance();
        $CI->load->model('region_model');
        
        return $CI->region_model->get($condition, $orderBy, $limit, $offset, $join);
        
    }
    
    public static function get_region_by_pk($id){
 
        $CI = & get_instance();
        $CI->load->model('region_model');
        
        return $CI->region_model->fetchById($id);
    }
    
    public static function get_regions_by_city($city){
        
        $CI = & get_instance();
        $CI->load->model('region_model');
        
        $where = array(
            TBL_REGION.'.city_pk' => $city
        );
        
        return $CI->region_model->get($where);
    }
    
    public static function get_regions_by_city_name($city){
        
        $CI = & get_instance();
        $CI->load->model('region_model');
 
        return $CI->region_model->get_regions_by_city_name(urldecode($city));
    }
    
    public static function remove($where){
        
        $CI = & get_instance();
        $CI->load->model('region_model'); 
        
        return $CI->region_model->delete( $where);
        
    }
    
}