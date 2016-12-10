<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_access_model extends Base_model
{
   
    public $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_SUBSCRIBERS_MENU_ACCESS;
    }
    
    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchAll($where, $orderBy, $limit, $offset, $join);
    }

    public function getUserAccess($userID)
    {
        $where = array(
            'subs_id' => $userID
        );

        $menuAccessArray = array();

        $menuAccess = self::fetchAll($where);

        if($menuAccess)
        {
           foreach ($menuAccess as $menu)
            {
                array_push($menuAccessArray, $menu->access);            
            } 
        }
        
        return $menuAccessArray;

    }

}