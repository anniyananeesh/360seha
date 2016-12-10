<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Insurance_user_model extends Base_model
{
	protected $table;

	public function __construct()
	{
		$this->table = TBL_CLIENT_INSURANCE;
	}

	public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
		return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
	}

    public function saveInsurance($save)
    {
        return $this->db->insert_batch($this->table, $save);
    }

    public function removeInsurance($userID)
    {
    	$where = array(
    		'subs_id' => $userID
    	);
    	
        return parent::delete($where);
    }

}