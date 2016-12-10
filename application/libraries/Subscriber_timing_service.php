<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
*/
/* City service */

Class Subscriber_timing_service{
    
    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_timings_model');
        
        return $CI->subscriber_timings_model->save( $save, $where);
        
    }
    
    public static function get($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()){
        
        $CI = & get_instance();
        $CI->load->model('subscriber_timings_model');
        
        return $CI->subscriber_timings_model->get($condition, $orderBy, $limit, $offset, $join);
        
    }
    
    public static function get_city_by_pk($id){
        
        $CI = & get_instance();
        $CI->load->model('city_model');
        
        return $CI->city_model->fetchById($id);
    }
    
    public static function delete($where){
        
        $CI = & get_instance();
        $CI->load->model('subscriber_timings_model'); 
        
        return $CI->subscriber_timings_model->delete( $where);
        
    }
    
    public static function get_subs_timings($id)
    {
        
        $CI = & get_instance();
        $CI->load->model('subscriber_timings_model'); 
        
        $where = array(
            TBL_SEHA_SUBS_TIMING.'.subs_id' => $id
        );
        
        $order_by = array(
          TBL_SEHA_SUBS_TIMING.'.id' => 'ASC'  
        );
        
        return $CI->subscriber_timings_model->get( $where, $order_by);
    }

    public function isOpenNow($userId)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_timings_model');

        return $CI->subscriber_timings_model->isOpenNow($userId);
    }
    
}