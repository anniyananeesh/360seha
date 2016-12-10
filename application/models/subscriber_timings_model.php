<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Subscriber_timings_model extends Base_model {
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_SEHA_SUBS_TIMING;
        $this->primary_key = 'id';
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
     * 
     * Fetch record by param passed
     * 
     * @param 
     * 
     */
    public function fetchRow($where = array(), $join = array()) {
        return parent::fetchRow($where, $join);
    }
    
    
    /*
     * Deleting a record from table
     * @params $id
     */
    public function delete($where = array()) {
        return parent::delete($where);
    }
    
    /*
    Check if the subscriber is currently open or not
    @params $userId 
    returns boolean
    */
    public function isOpenNow($userId)
    {

        $this->load->library('time_service');
        $day = $this->time_service->getWeekDayInteger(date('l'), false);

        $sql = "SELECT ".TBL_SUBSCRIBERS.".user_id FROM ".TBL_SUBSCRIBERS." WHERE ".TBL_SUBSCRIBERS.".user_id IN (SELECT subs_id FROM ".TBL_SEHA_SUBS_TIMING." WHERE (".$day." BETWEEN ".TBL_SEHA_SUBS_TIMING.".start_weekday AND ".TBL_SEHA_SUBS_TIMING.".end_weekday) AND CURTIME() BETWEEN `open_time` AND `close_time` ) AND ".TBL_SUBSCRIBERS.".user_id = ".$userId." LIMIT 1";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
    }
}