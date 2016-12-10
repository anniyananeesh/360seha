<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Region_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_REGION;
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
     * Getting regions details from database when city name passed
     * @params $city String name
     * 
     * returns db records
     */
    public function get_regions_by_city_name($city)
    {
        $this->db->select(TBL_REGION.'.reg_name, '.TBL_REGION.'.id')
                 ->from(TBL_REGION)
                 ->where(TBL_CITY.".name LIKE '".$city."%'");
        if(RTL)
        {
            $this->db->where(TBL_REGION.".lang = 'ar'");
        }else{
            $this->db->where(TBL_REGION.".lang = 'en'");
        }
            
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_REGION.'.city_pk','LEFT');
        
        $query = $this->db->get();
        return $query->result_array();
    }
 
}