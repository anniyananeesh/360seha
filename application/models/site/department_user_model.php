<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Department_user_model extends Base_model
{
	protected $table;

	public function __construct()
	{
		$this->table = TBL_USER_DEPTS;
	}

	public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
		return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
	}

    public function saveDept($save)
    {
        return $this->db->insert_batch($this->table, $save);
    }

    public function removeDept($userID)
    {
    	$where = array(
    		'user_id' => $userID
    	);

        return parent::delete($where);
    }

    public function getUserDepts($userID)
    {
        $this->db->select(array(TBL_DEPTS.'.dept_title as title_en', TBL_DEPTS.'.dept_title_ar as title_ar', TBL_DEPTS.'.dept_id as id'))
                 ->from($this->table)
                 ->where($this->table.'.user_id = ' . $userID);

        $this->db->join(TBL_DEPTS, TBL_DEPTS.'.dept_id = '.$this->table.'.dept_id', 'LEFT');
        $result = $this->db->get();

        if($result->num_rows() > 0)
        {
            return $result->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function getUserDeptsId($userID)
    {
        $this->db->select(array(TBL_USER_DEPTS.'.dept_id as id'))
                 ->from($this->table)
                 ->where($this->table.'.user_id = ' . $userID);

        $result = $this->db->get();

        if($result->num_rows() > 0)
        {
            $result = $result->result();

            $ret_array = array();

            foreach ($result as $key => $value)
            {
                array_push($ret_array, $value->id);
            }

            return (!empty($ret_array)) ? $ret_array : FALSE;

        }
        else
        {
            return FALSE;
        }
    }

}
