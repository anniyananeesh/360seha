<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author 360Seha Team
*/
/* Comment service */

Class Comment_service{
    
    public static function saveComment($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('comment_model');
        return $CI->comment_model->save( $save, $where);
    }
    
    public static function getComments($condition = array(), $fields = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()){
        $CI = & get_instance();
        $CI->load->model('comment_model');
        return $CI->comment_model->get($condition, $fields, $orderBy, $limit, $offset, $join);
    }
    
    public static function getCommentByPk($id){
        $CI = & get_instance();
        $CI->load->model('comment_model');
        return $CI->comment_model->fetchById($id);
    }
    
    public static function removeComment($where){
        $CI = & get_instance();
        $CI->load->model('comment_model'); 
        return $CI->comment_model->delete( $where);
    }

    public static function getAllComments($subscriber)
    {
        $CI = & get_instance();
        $CI->load->model('comment_model'); 
        return $CI->comment_model->getAllComments($subscriber);
    }

    public static function getAllUserComments($subscriber = NULL)
    {
        $CI = & get_instance();
        $CI->load->model('comment_model'); 
        return $CI->comment_model->getAllUserComments($subscriber);
    }
    
}