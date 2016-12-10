<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
*/
/* Library service */

Class Slides_service{
    
    
    public static  function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('slides_model');
        
        return $CI->slides_model->save( $save, $where);
        
    }
    
    public static function get($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()){
        
        $CI = & get_instance();
        $CI->load->model('slides_model');
        
        return $CI->slides_model->get($condition, $orderBy, $limit, $offset, $join);
        
    }
    
    public static function get_slide_by_pk($id){
        
        $CI = & get_instance();
        $CI->load->model('slides_model');
        
        return $CI->slides_model->fetchById($id);
    }
    
    public static function unset_slide($id){
        
        $CI = & get_instance();
        $CI->load->model('slides_model'); 
        
        $where = array(
          TBL_SLIDES.'.id' => $id  
        );
        
        return $CI->slides_model->delete( $where);
        
    }

    public static function get_slides_by_subscriber($pk)
    {

        $where = array(
          TBL_SLIDES.'.subscriber' => $pk 
        );
        
        return self::get($where);
    }

}