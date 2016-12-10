<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Subscription_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        parent::__construct();
        $this->table = TBL_FOLLOW;
    }
    
    public function get($condition = array())
    {

        if(!empty($condition)) {
            $where = $condition;
        } 
        $result = parent::fetchAll($where);
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
     * Check if the validating user is already registered
     * @params $params Array
     * 
     */
    public function isAlreadyRegistered($params) {

        $this->db->select(TBL_FOLLOW.'.subs_id')
                 ->from(TBL_FOLLOW)
                 ->where(array(TBL_FOLLOW.'.follower_email' => $params['follower_email'], TBL_FOLLOW.'.subs_id'=>$params['subs_id']))
                 ->limit(1);

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? true : false;
    }
 
}