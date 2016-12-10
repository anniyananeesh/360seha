<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends Base_model
{
    public $table;
    public $primary_key;

    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_ARTICLES;
        $this->primary_key = 'articles_id';
    }

    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
    }

    public function getAllArticles($fields, $where = array(), $lang, $limit)
    {
      //array('title as title_en','title_ar','articles_id','image_url as image',
        //  'description as description_en', 'description_ar')
        $this->db->select((empty($fields)) ? '*' : $fields)
                 ->from($this->table)
                 ->where("show_status = 1")
                 ->where("(publish_on = '$lang' OR publish_on = 'Both')")
                 ->order_by('articles_id', 'DESC')
                 ->limit(2);

        if(!empty($where))
        {
            $this->db->where($where);
        }

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : FALSE;

    }

}
