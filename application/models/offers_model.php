<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Offers_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    public $fields;
    
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
    
    public function find($params, $children = array()) 
    {  
        $params['i'] = (isset($params['i'])) ? $params['i'] : 'recent';
            
        $this->db->select(TBL_OFFERS.'.*, '
                . ''.TBL_SUBSCRIBERS.'.subs_type, '
                . ''.TBL_SUBSCRIBERS.'.subs_title, '
                . ''.TBL_SUBSCRIBERS.'.subs_title_ar, '
                . ''.TBL_SUBSCRIBERS.'.subs_country,'
                . ''.TBL_CATEGORY.'.*, '
                . ''.TBL_CITY.'.name as city,'
                . ''.TBL_CITY.'.name_ar as city_ar,'
                . ''.TBL_REGION.'.reg_name as region', FALSE);
        
        $this->db->from(TBL_OFFERS.', '.TBL_SUBSCRIBERS);
        
        if(isset($params['spl']) && $params['spl'] != '')
        {
            $this->db->where(TBL_OFFERS.".subs_type = '".$params['spl']."' ");
        }
        
        if(isset($params['loc']) && $params['loc'] != '' && !RTL)
        {
            $this->db->where(TBL_CITY.".name = '".$params['loc']."' ");
        }
        
        if(isset($params['loc']) && $params['loc'] != '' && RTL)
        {
            $this->db->where(TBL_CITY.".name_ar = '".$params['loc']."' ");
        }
            
        switch($params['i'])
        {
            case 'recent':
                $time = date('Y-m-d', strtotime("+3 day"));
                $this->db->where("DATE(".TBL_OFFERS.".offer_ends) <= '".$time."'");
            break;
        
            case 'next-week':
                $time = date('Y-m-d', strtotime("+7 day")); 
                $this->db->where("DATE(".TBL_OFFERS.".offer_ends) <= '".$time."'");
            break;
        
            case 'month':
                $time = date('Y-m-d', strtotime("+30 day")); 
                $this->db->where("DATE(".TBL_OFFERS.".offer_ends) <= '".$time."'");
            break;
        
            case 'long':
                $time = date('Y-m-d', strtotime("+31 day")); 
                $this->db->where("DATE(".TBL_OFFERS.".offer_ends) >= '".$time."'");
            break;
            default :
        }
        
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT'); 
        $this->db->join(TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_OFFERS.'.service_fk', 'left');
        
        $this->db->where(TBL_OFFERS.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id');
        $query = $this->db->get();
        
        return $query->result();
        
    }
    
    public function offer_count()
    {
        return $this->db->count_all($this->table);
    }
    
}