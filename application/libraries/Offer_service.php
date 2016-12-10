<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
*/
/* Library service */

Class Offer_service{

    public static function get_offers($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('offers_model');
        
        return $CI->offers_model->get($condition, $orderBy, $limit, $offset, $join);
        
    }
    
    /*
     * Save user credentials 
     * @params $save
     * @params $where = array()
     * 
     * For more doc ... see base_model
     */
    public static function find($params = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('offers_model');
        return $CI->offers_model->find($params); 
    }
    
    /*
     * Get user details by primary key
     * @params $id
     * 
     * For more doc ... see base_model
     * 
     */
    public static function get_offer_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('offers_model');
        
        return $CI->offers_model->fetchById( $id);         
    }
    
    
    /*
     * Delete user data from table 
     * @params $where 
     * 
     * For more doc ... see base_model
     *    */
    public static function get_offer_row($where, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('offers_model');
        
        return $CI->offers_model->fetchRow($where, array(), $join);          
    }
    
    
    /*
     * Check for offers count and check if there are any active offers
     * @params nothing
     */
    public static function offer_count()
    {
        $CI = & get_instance();
        $CI->load->model('offers_model');
        
        return $CI->offers_model->offer_count();
    }
}