<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Notes_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_NOTES_PAGE;
        $this->primary_key = 'notes_id';
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
        
        $orderBy = (!empty($orderBy)) ? $orderBy : array($this->table.'.'.$this->primary_key => 'DESC');
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
     * Fetching a single record from database
     * @params $id primary key
     */
    public function fetchById($id, $join = array()) {
        return parent::fetchById($id, $join);
    }
    
    /*
     * Deleting a record from table
     * @params $id
     * 
     */
    public function delete($where = array()) {
        return parent::delete($where);
    }

    /*
    Get notes details from title passed
    @params $title

    */
    public function get_note_by_title($title)
    {
        $title = urldecode($title);
        $this->db->select(TBL_NOTES_PAGE.'.*');
        if(RTL)
        {
            $this->db->where(TBL_NOTES_PAGE.".notes_title_ar = '$title'");
        }else{
            $this->db->where(TBL_NOTES_PAGE.".notes_title = '$title'");
        }
        $this->db->from(TBL_NOTES_PAGE);
        $query = $this->db->get();
        return $query->result();
    }
}