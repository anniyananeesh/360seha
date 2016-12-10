<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Contactlist_owners_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_CONTACT_LIST_OWNERS;
    }
    
    public function get($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
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
 
        $result = parent::fetchAll($where, $orderBy, $limit, $offset, $join);
        return (!empty($result)) ? $result : false;
    }
    
    
    /*
     * Save data into databse see base_model
     * @params $save
     * @params $where 
     * 
     */
    public function save($data, $where = array()) {
        return parent::save($data, $where);
    }

    /*
     * Deleting a record from table
     * @params $id
     * 
     */
    public function delete($where = array()) {
        return parent::delete($where);
    }
 
}