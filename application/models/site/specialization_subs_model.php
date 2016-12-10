<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Specialization_subs_model extends Base_model
{
    public $table;
 
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_SUBS_SPECIALIZATION;
    }

    public function removeSplzns( $deptID, $userID)
    {
        $where = array(
            'subs_id' => $userID,
            'dept_id' => $deptID
        );

        return parent::delete($where);
    }


    public function saveSplzns($save)
    {
        return $this->db->insert_batch($this->table, $save);
    }

    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
    }

    public function fetchFields($fields = array(), $where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchFields($fields, $where, $orderBy, $limit, $offset, $join);
    }

}