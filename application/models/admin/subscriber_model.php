<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriber_model extends Base_model
{
    public $table;
    public $primary_key;

    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_SUBSCRIBERS;
        $this->primary_key = 'user_id';
    }

    public function fetchRowFields($fields = array(), $where = array(), $orderBy = array(), $join = array()) 
    {
        return parent::fetchRowFields($fields, $where, $orderBy, $join);
    }

    public function save($save, $where = array())
    {
        return parent::save($save, $where);
    }
    
}  