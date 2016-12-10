<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Our_offers_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_OFFERS;
        $this->primary_key = 'offer_id';
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
     * Fetch a single row by params
     * @params $where
     * @params $order_by
     * @params $join
     * 
     * For more doc .. See base_model
     * 
     */
    public function fetchRow($where = array(), $orderBy = array(), $join = array()) {
        return parent::fetchRow($where, $orderBy, $join);
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
    Get offer details by title passed
    @params $title String
    */
    public function get_offer_details_by_title($title)
    {
        $title = urldecode($title);
        $this->db->select(TBL_OFFERS.'.*');
        if(RTL)
        {
            $this->db->where(TBL_OFFERS.".offer_title_ar = '$title'");
        }else{
            $this->db->where(TBL_OFFERS.".offer_title = '$title'");
        }
        $this->db->from(TBL_OFFERS);
        $query = $this->db->get();
        return $query->result();
    }
}