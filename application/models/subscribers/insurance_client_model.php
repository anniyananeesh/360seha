<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Insurance_client_model extends Base_model {

	protected $table;
    protected $fields;

	public function __construct()
	{
		$this->table = TBL_CLIENT_INSURANCE;

        $this->fields = array(
            $this->table.'.ins_id', 
            $this->table.'.created_on',
            TBL_GENERAL_INSURANCE.'.ins_title as insurance_title',
            TBL_GENERAL_INSURANCE.'.image_url as logo'
        );
	}

	public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()) {
		return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
	}

    public function fetchRow($where = array(), $orderBy = array(), $join = array()) {
        return parent::fetchRow($where, $orderBy, $join);
    }

	/*
     * Save data into databse see base_model
     * @params $save
     * @params $where 
     * 
     */
    public function save($data, $where = array()) {

        if(!empty($data))
        {
            foreach ($data as $key => $value) {

                $where = array(
                   $this->table.'.ins_id' => $value['seha_subscriber_insurance.ins_id'],
                   $this->table.'.subs_id' => $value['seha_subscriber_insurance.subs_id']
                );

                if(!$this->isExist($where))
                {
                  parent::save($value);  
                } 
            }
        }else{
            return FALSE;
        }
        //return parent::save($data, $where); 
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

    public function isExist($where){
        return parent::isExist($where);
    }

}