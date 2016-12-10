<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Appointments_model extends Base_model
{

    public $table;
    public $primary_key;

    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_APPOINTMENTS;
        $this->primary_key = 'id';
    }

    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
		return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
    }

    public function fetchFields($fields = array(), $where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
		return parent::fetchFields($fields, $where, $orderBy, $limit, $offset, $join);
    }

    /*
     * Save data into databse see base_model
     * @params $save
     * @params $where
    */
    public function save($data, $where = array())
    {
        return parent::save($data, $where);
    }

    /*
     * Fetching a single record from database
     * @params $id primary key
    */
    public function fetchById($id, $join = array())
    {
        return parent::fetchById($id, $join);
    }

    /*
     * Deleting a record from table
     * @params $id
    */
    public function delete($where = array())
    {
        return parent::delete($where);
    }

}
