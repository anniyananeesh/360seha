<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Articles_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_ARTICLES;
        $this->primary_key = 'articles_id';
    }
    
    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
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

    /*
    Get articles details from title passed
    @params $title

    */
    public function get_article_by_title($title)
    {
        $title = urldecode($title);
        $this->db->select(TBL_ARTICLES.'.*');
        if(RTL)
        {
            $this->db->where(TBL_ARTICLES.".title_ar = '$title'");
        }else{
            $this->db->where(TBL_ARTICLES.".title = '$title'");
        }
        $this->db->from(TBL_ARTICLES);
        $query = $this->db->get();
        return $query->result();
    }
}