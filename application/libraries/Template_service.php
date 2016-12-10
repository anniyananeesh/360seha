<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Aneesh
*/
/* Library service */

Class Template_service{
 
    public static function get_templates(){
        
        $CI = & get_instance();
        $CI->load->model('template_model');
        
        $order_by = array(
          TBL_NL_TEMPLATES.'.tpl_id' => 'ASC'  
        );
        
        return $CI->template_model->get_templates( array(), $order_by);
 
    }
    
    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('template_model');
        
        return $CI->template_model->save( $save, $where);
    }
    
    public static function get_template_content_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('template_model');
        
        return $CI->template_model->fetchById( $id);
        
    }
    
    public static function read_html_content($html)
    {
        return file_get_contents($html);        
    }
 
}