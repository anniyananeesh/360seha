<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ads_model extends Base_model
{
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_ADS;
        $this->primary_key = 'id';
    }

    public function fetchRowFields( $fields = array(), $where = array(), $orderBy = array(), $join = array())
    {
        return parent::fetchRowFields( $fields, $where, $orderBy, $join);
    }

}