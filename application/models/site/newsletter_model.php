<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_model extends Base_model
{
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_NEWSLETTER_SUBSCRIPTIONS;
    }
    
    public function fetchAll($condition = array(), $orderBy = array(), $limit = null, $offset = null)
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
        
        $result = parent::fetchAll($where, $orderBy, $limit, $offset);
        return (!empty($result)) ? $result : false;
    }

    public function isExist($param_array)
    {
        return parent::isExist($param_array);
    }

    public function save($save)
    {
        return parent::save($save);
    }
}