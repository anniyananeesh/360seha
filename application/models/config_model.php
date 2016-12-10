<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Config_model extends Base_model {
    
    
    public $table;
    //public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_CONFIG;
        //$this->primary_key = 'cat_id';

    }
    
    /**
     * Application lists. By default it outputs result with submitted and under settings.
     * @param $condition
     * @param $orderBy
     * @param $limit
     * @param $offset
     */
    public function get_settings($condition = array(), $orderBy = array(), $limit = null, $offset = null)
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
        
        $orderBy = (!empty($orderBy)) ? $orderBy : array($this->table.'.group_name' => 'DESC');
        $result = parent::fetchAll($where, $orderBy, $limit, $offset);
        return (!empty($result)) ? $result : false;
    }
    
    /**
     * Insert and update
     * @see application/models/base_model::save()
     */
    public function save($data, $where = array())
    {
        parent::save($data, $where);
    }
 
}