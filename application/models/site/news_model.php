<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends Base_model
{
    public $table;
    public $primary_key;

    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_GENERAL_NEWS;
        $this->primary_key = 'news_id';
    }

    public function fetchAll($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $result = parent::fetchAll($where, $orderBy, $limit, $offset, $join);
        return (!empty($result)) ? $result : false;
    }

    /*
     * Fetching a single record from database
     * @params $id primary key
     */
    public function fetchById($id, $join = array())
    {
        return parent::fetchById($id, $join);
    }

    public function fetchFields($fields = array(), $where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchFields($fields, $where, $orderBy, $limit, $offset, $join);
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
       * Deleting a record from table
       * @params $id
       *
       */
      public function delete($where = array()) {
          return parent::delete($where);
      }

      public function getAllNews($fields, $lang, $limit, $where = array())
      {
         $this->db->select((empty($fields)) ? '*' : $fields)
                  ->from($this->table)
                  ->where("show_status = 1")
                  ->where("(publish_on = '$lang' OR publish_on = 'Both')")
                  ->order_by('news_id', 'DESC')
                  ->limit($limit);

         if(!empty($where))
         {
            $this->db->where($where);
         }

         $query = $this->db->get();
         return ($query->num_rows() > 0) ? $query->result() : FALSE;
      }

}
