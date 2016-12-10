<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Doctors_model extends Base_model
{
    public $table;
    public $primary_key;

    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_DOCTORS;
        $this->primary_key = 'id';
    }

    public function fetchAll($condition = array(), $orderBy = array(), $limit = null, $offset = null)
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset);
    }

    public function fetchRowFields( $fields = array(), $where = array(), $orderBy = array(), $join = array())
    {
        return parent::fetchRowFields( $fields, $where, $orderBy, $join);
    }

    public function fetchRow($where = array(), $orderBy = array(), $join = array())
    {
        return parent::fetchRow($where, $orderBy, $join);
    }

    public function fetchById($id, $join = array())
    {
        return parent::fetchById($id, $join);
    }

    public function save($save, $where = array())
    {
        return parent::save($save, $where);
    }

    public function delete($where = array())
    {
        return parent::delete($where);
    }

}
