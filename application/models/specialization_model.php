<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Specialization_model extends Base_model {

    public $table;
    
    /*
     * Parent class constructs initialized here 
     */
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_SUBS_SPECIALIZATION;
    }
    
    /*
     * Get Specializations from TBL_SUBS_SPECIALIZATION based on condition
     * @params $condition array
     * return array if records and false if no records
     * 
     * see base model for more doc 
     */
    public function get($condition = array())
    {
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
        $result = parent::fetchAll($where);
        $result = (!empty($result)) ? $result : false;
        $frmt_array = array();
        if($result)
        {
            foreach($result AS $r){ array_push($frmt_array, $r->spl_id);}
        }
        return $frmt_array;        
    }
    
    /*
     * Set Specializations from TBL_SUBS_SPECIALIZATION based on condition
     * @params $save array
     * @params $where array
     * return true if successfully written and false if not
     * 
     * see base model for more doc 
     */
    public function set( $save, $where = array())
    {
        return $this->db->insert_batch($this->table, $save); 
    }

    /*
     * Set Specializations from TBL_SUBS_SPECIALIZATION based on condition
     * @params $save array
     * return true if successfully written and false if not
     * 
     * see base model for more doc 
     */
    public function setOne($save)
    {
        return $this->db->insert($this->table, $save); 
    }
    
    /*
     * Deleting a record from table
     * @params $id
     * 
     */
    public function delete($where = array()) {
        return parent::delete($where);
    }
    
    public function get_spl_by_usr($user_id)
    {
        $frmt_array = array();
        $this->db->select(TBL_CATEGORY.".name,"
                    .TBL_CATEGORY.".name_ar")
                 ->from(TBL_SUBS_SPECIALIZATION);
        
        $this->db->where(TBL_SUBS_SPECIALIZATION.".subs_id = $user_id");
        $this->db->join( TBL_CATEGORY, TBL_SUBS_SPECIALIZATION.'.spl_id = '.TBL_CATEGORY.".id_category", "LEFT");

        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            
            foreach($result AS $r)
            {
                if(RTL)
                    array_push($frmt_array, $r->name_ar);
                else
                    array_push($frmt_array, $r->name);
            }
            
            return (count($frmt_array) > 1) ? implode(', ', $frmt_array) : $frmt_array[0];
            
        }else{
            return false;
        }
        
    }
    
    public function get_spl_by_usr_all($user_id)
    {
        $this->db->select(TBL_CATEGORY.".id_category,".TBL_CATEGORY.".name,"
                    .TBL_CATEGORY.".name_ar")
                 ->from(TBL_SUBS_SPECIALIZATION);
        
        $this->db->where(TBL_SUBS_SPECIALIZATION.".subs_id = $user_id");
        $this->db->join( TBL_CATEGORY, TBL_SUBS_SPECIALIZATION.'.spl_id = '.TBL_CATEGORY.".id_category", "LEFT");
        $query = $this->db->get();
        
        if($query->num_rows() > 0){return $query->result();}else{return false;}
        
    }
 
}