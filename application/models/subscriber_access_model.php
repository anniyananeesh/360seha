<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Subscriber_access_model extends Base_model {
    
    
    public $table;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_SUBSCRIBERS_MENU_ACCESS;
        //No primary key for this table
    }
    
    public function get_subscriber_access($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        
        $where = array();
        if(empty($condition)) {
            //$where = array($this->table.'.application_status !=' => 0);
        }
        
        $keys = array_keys($condition);
        
        if(in_array('where_in', $keys)) {
            $where_in_condition = $condition['where_in'];
            $this->db->where_in(key($where_in_condition), $where_in_condition[key($where_in_condition)]);
            unset($condition['where_in']);
        }
        
        if(!empty($condition)) {
            $where = $condition;
        } 
        
        $orderBy = (!empty($orderBy)) ? $orderBy : array($this->table.'.access' => 'DESC');
        
        $result = parent::fetchAll($where, $orderBy, $limit, $offset, $join);
        return (!empty($result)) ? $result : false;
    }
    
    /*
     * 
     * Save language details to database
     * @param $save 
     * @param $where
     */
    public function save($data, $where = array()) {
        return parent::save($data, $where);
    }

    /*
     * Delete a row from table
     * @param $id
     * 
     * primary key     * 
     */
    public function delete($where = array()) {
        return parent::delete($where);
    }
    
 
}