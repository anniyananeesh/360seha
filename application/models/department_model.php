<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Department_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_DEPTS;
        $this->primary_key = 'dept_id';
    }
    
    public function get($fields = array(), $condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        
        $where = array();
 
        $keys = array_keys($condition);
        if(in_array('where_in', $keys)) {
            $where_in_condition = $condition['where_in'];
            $this->db->where_in(key($where_in_condition), $where_in_condition[key($where_in_condition)]);
            unset($condition['where_in']);
        }
        
        if(!empty($condition)) {
            $where = $condition;
        } 

        //If fields array is not empty get only selected fields else select all fields.
        if(!empty($fields))
        {
            $this->fields = $fields;
        }else{
            $this->fields = array('*');
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
    Get the dept. details from the title passed
    @params $title as String
    returns the array for corresponding dept.
    */
    public function getDeptDetailsByTitle($title)
    {
        $this->db->select('*')
                 ->from($this->table)
                 ->where($this->table.".dept_title = '$title'")
                 ->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

}