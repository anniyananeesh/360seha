<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Wall_service{
    
    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('wall_model');
        return $CI->wall_model->save( $save, $where);
    }
    
    public static function get($condition = array(), $fields = array(), $orderBy = array(), $limit = null, $offset = null)
    {
        $CI = & get_instance();
        $CI->load->model('wall_model');
        return $CI->wall_model->get($condition, $fields, $orderBy, $limit, $offset);
    }
    
    public static function get_wall_item_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('wall_model');
        return $CI->wall_model->fetchById($id);
    }
    
    public static function remove_item($where)
    {
        $CI = & get_instance();
        $CI->load->model('wall_model'); 
        return $CI->wall_model->delete( $where);
    }

    public static function get_wall_items_by_user($userId)
    {
        $CI = & get_instance();
        $CI->load->model('wall_model');

        $condition = array(
            TBL_WALL.'.subscriber' => $userId
        ); 
        return $CI->wall_model->get($condition);
    }

    //TODO Get all signboards for all subscribers
    public static function getAllSignboards($condition = array())
    {
        $CI = & get_instance();
        $CI->load->model('wall_model');
        return $CI->wall_model->getAllSignboards($condition); 
    }
    //TODO Add a new signboard , Update , Change status
    //TODO Delete a signboard
    
}