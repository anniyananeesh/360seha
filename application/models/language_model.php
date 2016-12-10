<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Language_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_LANGUAGES;
        $this->primary_key = 'lang_id';

    }
    
    public function get_languages($condition = array(), $orderBy = array(), $limit = null, $offset = null)
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
        
        $orderBy = (!empty($orderBy)) ? $orderBy : array($this->table.'.'.$this->primary_key => 'DESC');
        $result = parent::fetchAll($where, $orderBy, $limit, $offset);
        return (!empty($result)) ? $result : false;
    }
    
    /*
     * 
     * Fetch record by param passed
     * 
     * @param 
     * 
     */
    public function fetchRow($where = array(), $orderBy = array(), $join = array()) {
        return parent::fetchRow($where, $orderBy, $join);
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
     * 
     * Fetch by pk see base_model
     * @params $id 
     * Primary key
     * 
     */
    public function fetchById($id, $join = array()) {
        return parent::fetchById($id, $join);
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