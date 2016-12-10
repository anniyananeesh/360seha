<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends Base_model
{
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_COUNTRIES;
        $this->primary_key = 'id';
    }

    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
    }

    public function fetchRow($where = array(), $orderBy = array(), $join = array())
    {
        return parent::fetchRow($where, $orderBy, $join);
    }

}