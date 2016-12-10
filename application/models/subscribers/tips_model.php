<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Tips_model extends Base_model {

	protected $table;
	protected $primary_key;

	public function __construct()
	{
		$this->table = TBL_TIPS;
		$this->primary_key = 'tips_id';
	}

	public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()) {
		return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
	}

	/*
     * Save data into databse see base_model
     * @params $save
     * @params $where 
     * 
     */
    public function save($data, $where = array()) {
        return parent::save($data, $where); 
    }
    
    /*
     * Fetching a single record from database
     * @params $id primary key
     */
    public function fetchById($id, $join = array()) {
        return parent::fetchById($id, $join);
    }
    
    /*
     * Deleting a record from table
     * @params $id
     * 
     */
    public function delete($where = array()) {
        return parent::delete($where);
    }

}