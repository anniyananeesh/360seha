<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
*/
/* Library service */

Class Location_service{
 
    public static function get_locations($condition = array(), $orderBy = array(), $limit = null, $offset = null){
        
        $CI = & get_instance();
        $CI->load->model('location_model');
        
        $order_by = array(
          TBL_LOCATIONS.'.title' => 'ASC'  
        );
        
        return $CI->location_model->get_locations( $condition, $order_by, $limit, $offset);
    }
    
}