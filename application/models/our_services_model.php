<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Our_services_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_SERVICES;
        $this->primary_key = 'services_id';
    }
    
    public function get($condition = array(), $orderBy = array(), $limit = null, $offset = null)
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
    Get all services of a particular medical center
    @params array $where
    returns the collection
    */
    public function get_services_all($where)
    {
        if(RTL)
        {
            $this->db->select(TBL_SERVICES.'.services_title_ar as title,'.TBL_SERVICES.'.services_description_ar as description,'.TBL_SERVICES.'.services_id, '.TBL_SERVICES.'.services_image');
        }else{
            $this->db->select(TBL_SERVICES.'.services_title as title,'.TBL_SERVICES.'.services_description as description,'.TBL_SERVICES.'.services_id, '.TBL_SERVICES.'.services_image');
        }
        $this->db->from(TBL_SERVICES)
                 ->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    /*
    Get service details by title
    @params $title 
    returns the service details
    */
    public function get_service_by_title($title)
    {
        $title = urldecode($title);
        
        if(RTL)
        {
            $this->db->where(TBL_SERVICES.".services_title_ar = '$title'");
        }else{
            $this->db->where(TBL_SERVICES.".services_title = '$title'");
        }
        $this->db->from(TBL_SERVICES);
        $query = $this->db->get();
        return $query->result();
    }
}