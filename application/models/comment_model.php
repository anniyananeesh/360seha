<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Comment_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    public $fields;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_COMMENTS;
        $this->primary_key = 'id';
        $this->fields = array();
    }
    
    public function get($condition = array(), $fields = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
 
        if(!empty($fields)) {
            $this->fields = $fields;
        }

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
    Get all signboards
    @params $condition as Array
    return all signboards
    */
    public function getAllComments($subscriber)
    {
        $this->db->select(TBL_PATIENTS.'.full_name,'.TBL_PATIENTS.'.email,'.TBL_PATIENTS.'.location,'.$this->table.'.*')
                 ->from($this->table)
                 ->where($this->table.'.subscriber = '.$subscriber);

        $this->db->join(TBL_PATIENTS, TBL_PATIENTS.'.id = '.$this->table.'.patient_id', 'LEFT');
        return $this->db->get()->result();
    }

    /*
        Get all user comments for all subscribers
        @params $subscriber as Foreign Key for subscriber
        return all user comments as array
    */
    public function getAllUserComments($subscriber = NULL)
    {
        $this->db->select( TBL_SUBSCRIBERS.'.subs_title, '.TBL_PATIENTS.'.full_name,'.TBL_PATIENTS.'.email,'.TBL_PATIENTS.'.location,'.$this->table.'.*')
                 ->from($this->table);

        if($subscriber != NULL)
        {
            $this->db->where($this->table.'.subscriber = '.$subscriber);
        }

        $this->db->join(TBL_SUBSCRIBERS, TBL_SUBSCRIBERS.'.user_id = '.$this->table.'.subscriber', 'LEFT');
        $this->db->join(TBL_PATIENTS, TBL_PATIENTS.'.id = '.$this->table.'.patient_id', 'LEFT');
        return $this->db->get()->result();
    }
 
}