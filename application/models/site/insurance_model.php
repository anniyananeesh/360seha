<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Insurance_model extends Base_model
{
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_GENERAL_INSURANCE;
        $this->primary_key = 'ins_id';
    }
    
    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null)
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset);
    }

}