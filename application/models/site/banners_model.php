<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Banners_model extends Base_model {
 
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        
        parent::__construct();
        $this->table = TBL_BANNERS;
        $this->primary_key = 'id';
    } 

    public function fetchFields($fields = array(), $where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchFields($fields, $where, $orderBy, $limit, $offset, $join);
    }
    
}