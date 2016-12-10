<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Slide_dept_model extends Base_model {
 
    public $table;
    
    public function __construct() 
    {
        parent::__construct();
        $this->table = TBL_SLIDES_DEPT;
    } 
 
    //Set depts
    public function setBannerDepts($save)
    {
    	$this->db->insert_batch($this->table, $save);
    }

    //Remove depts by banner
    public function delete($id)
    {
    	$where = array('banner_id' => $id);
        return parent::delete($where);
    }

    //Get depts from app banners
    public function getDeptsFromBannerId($id)
    {	
    	$where = array('banner_id' => $id);
    	$fields= array('dept_id');
    	$data = parent::fetchFields($fields, $where, array(), array());

    	if($data)
    	{
    		$retArray = array();

    		foreach ($data as $key => $value) 
    		{
    			array_push($retArray, $value->dept_id);
    		} 

    		return (!empty($retArray)) ? $retArray : array();

    	}
    	else
    	{
    		return array();
    	}
    }

    //Get depts from app banners
    public function getDeptsNameFromBannerId($id)
    {	
    	$where = array($this->table.'.banner_id' => $id);
    	$fields= array(TBL_DEPTS.'.dept_title');

    	$join = array( 
            array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.$this->table.'.dept_id', 'join_type' => 'inner')
        );

    	$data = parent::fetchFields($fields, $where, array(), null, null, $join);

    	if($data)
    	{
    		$retArray = array();

    		foreach ($data as $key => $value) 
    		{
    			array_push($retArray, $value->dept_title);
    		} 

    		return (!empty($retArray)) ? $retArray : array();

    	}
    	else
    	{
    		return array();
    	}
    }

}