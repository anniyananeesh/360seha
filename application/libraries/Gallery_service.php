<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Aneesh
*/
/* Library service */

Class Gallery_service{
 
    /*
     * Get all images saved onto the gallery
     * For more doc ... See base_model
     * 
     */
    public static function get_img_gallery( $where = array(), $orderBy = array(), $limit = null, $offset = null){
        
        $CI = & get_instance();
        $CI->load->model('img_gallery_model');
        
        $order_by = array(
          TBL_IMG_GALLERY.'.img_id' => 'DESC'  
        );
        
        return $CI->img_gallery_model->get( $where, $order_by);
 
    }
    
    public static function save_img($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('img_gallery_model');
        
        return $CI->img_gallery_model->save( $save, $where);
    }
    
    public static function get_img_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('img_gallery_model');
        
        return $CI->img_gallery_model->fetchById( $id);
    }
    
    public static function unset_img($where)
    {
        $CI = & get_instance();
        $CI->load->model('img_gallery_model');
        
        return $CI->img_gallery_model->delete($where);
    }
    
    /*
     * Get all videos saved onto the gallery
     * For more doc ... See base_model
     * 
     */
    public static function get_vid_gallery( $where = array(), $orderBy = array(), $limit = null, $offset = null){
        
        $CI = & get_instance();
        $CI->load->model('video_gallery_model');
        
        $order_by = array(
          TBL_VID_GALLERY.'.vid_id' => 'DESC'  
        );
        
        return $CI->video_gallery_model->get( $where, $order_by);
 
    }
    
    /*
     * Save video details
     * @params $save
     * @params $where
     * 
     */
    public static function save_vid($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('video_gallery_model');
        
        return $CI->video_gallery_model->save( $save, $where);
    }
    
    /*
     * Get video details from primary key passed
     * @params $id
     */
    public static function get_vid_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('video_gallery_model');
        
        return $CI->video_gallery_model->fetchById( $id);
    }
    
    /*
     * Unset the video detail from table
     * @params $where
     * 
     */
    public static function unset_vid($where)
    {
        $CI = & get_instance();
        $CI->load->model('video_gallery_model');
        
        return $CI->video_gallery_model->delete($where);
    }
}