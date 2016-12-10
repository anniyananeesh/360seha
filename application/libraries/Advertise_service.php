<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
*/
/* Library service */

Class Advertise_service{
    
    /*
     * Save Advertisements
     * 
     */
    public function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('advertisement_model');
        
        return $CI->advertisement_model->save( $save, $where);
    }
    
    /*
     * Get Advertisements
     */
    public function get($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()){
        
        $CI = & get_instance();
        $CI->load->model('advertisement_model');
        
        return $CI->advertisement_model->get($condition, $orderBy, $limit, $offset, $join);
        
    }
    
    /*
     * Get single ad details from table
     */
    public function get_ad_by_pk($id){
        
        $CI = & get_instance();
        $CI->load->model('advertisement_model');
        
        return $CI->advertisement_model->fetchById($id);
    }
    
    /*
     * Remove single ad from database
     */
    public function remove_ad($id){
        
        $CI = & get_instance();
        $CI->load->model('advertisement_model'); 
        
        $where = array(
          TBL_ADS.'.id' => $id  
        );
        
        return $CI->advertisement_model->delete( $where);
        
    } 

    /*
     * Get random ads
     */
    public function random_ads( $where)
    {
        
        $order_by = array(
          TBL_ADS.'id' => 'RANDOM'  
        );
        
        $banner = $this->get( $where, $order_by, 1);
        return $banner[0];
    }
    
    /*
     * Update view count
     */
    public static function update_view($id, $views)
    {
 
        return self::save(array(
              TBL_ADS.'.views' => $views  
            ), array(
              TBL_ADS.'.id' => $id  
            ));
        
    }
    
    /*Search Advertisem,ent*/
    public function search_ads($title)
    {
        $CI = & get_instance();
        $CI->load->model('advertisement_model');
        return $CI->advertisement_model->search($title);
    }
}