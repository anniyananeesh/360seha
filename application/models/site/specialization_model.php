<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Specialization_model extends Base_model
{
    public $table;
 
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_SPECIALIZATIONS;
    }

    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
    } 

    public function fetchFields($fields = array(), $where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchFields($fields, $where, $orderBy, $limit, $offset, $join);
    }
    
}