<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Wall_model extends Base_model {


    public $table;
    public $primary_key;
    public $fields;

    public function __construct() {

        parent::__construct();
        $this->table = TBL_WALL;
        $this->primary_key = 'wall_id';
        $this->fields = array();
    }

    public function get($condition = array(), $fields = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {


        if(!empty($fields)) {
            $this->fields = $fields;
        }

        $where = array();

        $keys = array_keys($condition);
        if(in_array('where_in', $keys)) {
            $where_in_condition = $condition['where_in'];
            $this->db->where_in(key($where_in_condition), $where_in_condition[key($where_in_condition)]);
            unset($condition['where_in']);
        }

        if(!empty($condition)) {
            $where = $condition;
        }

        $orderBy = (!empty($orderBy)) ? $orderBy : array($this->table.'.'.$this->primary_key => 'DESC');
        $result = parent::fetchAll($where, $orderBy, $limit, $offset, $join);
        return (!empty($result)) ? $result : false;
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

    /*
      Get all signboards
      @params $condition as Array
      return all signboards
    */
    public function getAllSignboards($condition = array())
    {
        if(!empty($condition))
        {
            $this->db->where($condition);
        }

        $this->db->select(TBL_SUBSCRIBERS.'.subs_title, '.$this->table.'.*')
                 ->from($this->table);

        $this->db->join(TBL_SUBSCRIBERS, TBL_SUBSCRIBERS.'.user_id = '.$this->table.'.subscriber', 'LEFT');
        return $this->db->get()->result();
    }

}
