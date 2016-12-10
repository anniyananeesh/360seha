<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
*/
/* Library service */

Class User_service{

    public static function get_users($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('user_model');
        
        return $CI->user_model->get_users($condition, $orderBy, $limit, $offset, $join);
        
    }
    
    /*
     * Save user credentials 
     * @params $save
     * @params $where = array()
     * 
     * For more doc ... see base_model
     */
    public static function save( $save, $where = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('user_model');
        
        return $CI->user_model->save( $save, $where); 
    }
    
    /*
     * Get user details by primary key
     * @params $id
     * 
     * For more doc ... see base_model
     * 
     */
    public static function get_user_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('user_model');
        
        return $CI->user_model->fetchById( $id);         
    }
    
    /*
     * Get user details by condition
     * @params $id
     * 
     * For more doc ... see base_model
     * 
     */
    public static function get_user_by_row($where)
    {
        $CI = & get_instance();
        $CI->load->model('user_model');
        
        return $CI->user_model->fetchRow( $where);         
    }
    
    
    /*
     * Delete user data from table 
     * @params $where 
     * 
     * For more doc ... see base_model
     *    */
    public static function delete($where)
    {
        $CI = & get_instance();
        $CI->load->model('user_model');
        
        return $CI->user_model->delete($where);          
    }
    
    
    /*
     * Reset n update the password
     * 
     */
    public static function rst_user_pwd( $id, $username){
        
        $CI = & get_instance();
        $CI->load->model('auth_model');
        
        $rndm_pwd = $CI->auth_model->generate_random_password();
        $uniq_token = $CI->auth_model->generate_unique_token($username);
        $pwd_hash = $CI->auth_model->generate_password_hash( $rndm_pwd, $uniq_token);
        
        $save = array(
          TBL_USERS.'.password' => $pwd_hash,
          TBL_USERS.'.unique_token' => $uniq_token,
          TBL_USERS.'.r_password' => $rndm_pwd
        );
        
        $where = array(
          TBL_USERS.'.user_id' => $id
        );
 
        $CI->load->model('user_model');
        $CI->user_model->save( $save, $where); 
        
        return $rndm_pwd;
			
    }
    
    /*
     * Check if the username is already taken or not
     * @params $where
     * 
     * For more doc .. see base_model
     */
    public static function has_username($where)
    {
        $user = $this->get_users($where);
        
        if($user AND count($user) > 0)
        {
            return true;
        }else{
            
            return false;
        }
    }
    
    /*
     * Save user group onto table 
     * @params $save
     * @params $where
     * 
     * For doc see base_model
     */
    public static function set_user_group( $save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('user_group_model');
        
        return $CI->user_group_model->save( $save, $where);        
    }
    
    /*
     * Get user groups from table 
     * @params $condition
     * @params $orderBy
     * @params $limit
     * @params $offset
     * @params $join -> hidden here , if you want to add join just add a new param to the function
     * 
     * For doc see base_model
     */
    public static function get_user_groups( $condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('user_group_model');
        
        return $CI->user_group_model->get_groups($condition, $orderBy, $limit, $offset, $join);        
    }
    
    /*
     * Get user groups from table using pk
     * @params $condition
     * @params $orderBy
     * @params $limit
     * @params $offset
     * @params $join -> hidden here , if you want to add join just add a new param to the function
     * 
     * For doc see base_model
     */
    public static function get_user_group_by_id($id)
    {
        $CI = & get_instance();
        $CI->load->model('user_group_model');
        
        return $CI->user_group_model->fetchById($id);        
    }
    
    /*
     * Delete user group from table . before deleting check if there is any user attached to this group 
     * @params $where
     * 
     * For doc see base_model
     */
    public static function delete_user_group($where)
    {
        $CI = & get_instance();
        $CI->load->model('user_group_model');
        
        return $CI->user_group_model->delete($where);         
    }
    
    /*
     * Change the status of the user group as per params passed
     * @params $save
     * @params $where
     * 
     * Both the params are must . Should have values in it
     * For doc see base_model
     */
    public static function change_user_grp_status( $save, $where)
    {
        return $this->set_user_group($save, $where);        
    }
    
    /*
     * Setting up the user permissions here
     * 
     * @params $save
     */
    public static function set_user_perms($save)
    {
        $CI = & get_instance();
        $CI->load->model('group_permission_model');
        
        return $CI->group_permission_model->save($save);
    }
    
    /*
     * Getting up the user permissions here
     * 
     * @params $where
     */
    public static function get_user_perms($where)
    {
        $CI = & get_instance();
        $CI->load->model('group_permission_model');
        
        $permissions = $CI->group_permission_model->get_permissions($where);
        
        $neated_arr = array();
        
        foreach($permissions as $p)
        {
            
            array_push($neated_arr, $p->permission_title);
        }
        
        return $neated_arr;
        
    }
    
    /*
     * Check if user has access
     * @params $user_id
     * @params $action
     * 
     */
    public function has_user_access($user_id, $action)
    {

        $usr = $this->get_user_by_pk($user_id);
        
        if($usr)
        {
            if($usr->is_master == 1) return true;
            
            $CI = & get_instance();
            $CI->load->model('group_permission_model');
            
            $where = array(
                TBL_USER_PERMISSIONS.'.grp_id' => $usr->grp_id,
                TBL_USER_PERMISSIONS.'.permission_title' => $action
            );
            
            $perms = $CI->group_permission_model->get_permissions($where);
            
            if($perms){
                
                return true;
            }else{
                
                return false;
            }
            
        }else{
            
            return false;
        }
        
    }
    
    /*
     * Delete all permissions of aprticular group
     * @#params $where
     * 
     * For doc see base_model
     */
    public static function unset_permissions($where)
    {
        $CI = & get_instance();
        $CI->load->model('group_permission_model');
        
        return $CI->group_permission_model->delete($where);
    }

}