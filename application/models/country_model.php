<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Country_model extends Base_model {
 
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_COUNTRIES;
        $this->primary_key = 'id';
    }

    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
    }

    public function fetchById($id, $join = array())
    {
        return parent::fetchById($id,$join);
    }

    public function fetchRow($where = array(), $orderBy = array(), $join = array())
    {
        return parent::fetchRow($where,$orderBy,$join);
    }

    public function isExist($param_array)
    {
        return parent::isExist($param_array);
    }

    public function countAllRecords(){
        return parent::countAllRecords();
    }

    public function countAllRecordsByCond($where = array())
    {
        return parent::countAllRecordsByCond($where);
    }

    public function delete($where = array())
    {
        return parent::delete($where);
    }

    public function save($data, $where = array())
    {
        return parent::save($data,$where);
    }

    public function lastOrderID()
    {
        return parent::lastOrderID();
    }

}