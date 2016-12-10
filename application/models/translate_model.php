<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Translate_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_TRANSLATIONS;
        $this->primary_key = 'id';

    }
    
    public function get_translations($condition = array(), $orderBy = array(), $limit = null, $offset = null)
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
     * Save function .. for more details see base_model
     * 
     * @params $save array with values
     */
    public function save($data, $where = array()) {
        return parent::save($data, $where);
    }
    
}