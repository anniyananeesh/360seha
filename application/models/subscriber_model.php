<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Subscriber_model extends Base_model {
    
    
    public $table;
    public $primary_key;
    
    public function __construct() {
        
        parent::__construct();
        $this->table = TBL_SUBSCRIBERS;
        $this->primary_key = 'user_id';

    }
    
    public function get_geo_users( $lat, $long)
    {
        $sql = "CALL geodist ($lat, $long)";
        $sp_data = $this->db->query($sql);
        return $sp_data->result();
    }
    
    public function get_subscribers_medical_centers($where, $fields)
    {
        $this->db->select($fields);
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCurrentMrkrClickCnt($userId)
    {
        $this->db->select(TBL_SUBSCRIBERS.'.subs_marker_click');
        $this->db->from($this->table);
        $this->db->where(TBL_SUBSCRIBERS.'.user_id = '.$userId);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_subscribers($condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array(), $fields = array())
    {
        
        $where = array();
        if(empty($condition)) {
            //$where = array($this->table.'.application_status !=' => 0);
        }
 
        if(!empty($fields))
        {
            $this->db->select($fields);
        }
        
        $keys = array_keys($condition);
        
        if(in_array('where_in', $keys)) {
            $where_in_condition = $condition['where_in'];
            $this->db->where_in(key($where_in_condition), $where_in_condition[key($where_in_condition)]);
            unset($condition['where_in']);
        }
        
        if(!empty($condition)) {
            $where = $condition;
        }  

        $this->db->group_by(TBL_SUBSCRIBERS.'.user_id');
        
        $orderBy = (!empty($orderBy)) ? $orderBy : array($this->table.'.'.$this->primary_key => 'DESC');
        $result = parent::fetchAll($where, $orderBy, $limit, $offset, $join);
        return (!empty($result)) ? $result : false;
    }

    public function get_subscribers_by_search($post = array())
    {
 
        $this->db->select("*")
                 ->from($this->table);

        if($post['subs_title'] != "")
        {
            $title = $post['subs_title'];
            $this->db->where($this->table.".subs_title LIKE '%$title%'");
        }

        if($post['subs_type'] != "")
        {
            $type = $post['subs_type'];
            $this->db->where($this->table.".subs_type = '$type'");
        }

        $this->db->join(TBL_CATEGORY,TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        $this->db->join(TBL_REGION,TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join(TBL_CITY,TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');

        $this->db->order_by($this->table.'.'.$this->primary_key,'DESC');

        $query = $this->db->get();

        return ($query->num_rows()>0) ? $query->result() : FALSE;
         
    }

    /*
    Get services meta tags by subscriber
    */
    public function get_meta_tags($where)
    {
        if(RTL)
        {
            $this->db->select(TBL_SUBSCRIBERS.'.meta_ar as meta');
        }else{
            $this->db->select(TBL_SUBSCRIBERS.'.meta_en as meta');
        }
        $this->db->from(TBL_SUBSCRIBERS)
                 ->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    
    /*
     * 
     * Fetch record by param passed
     * 
     * @param 
     * 
     */
    public function fetchRow($where = array(), $join = array(), $orderBy = array()) {
        return parent::fetchRow($where, $orderBy, $join);
    }
    
    /*
     * 
     * Save language details to database
     * @param $save 
     * @param $where
     */
    public function save($data, $where = array()) {
        return parent::save($data, $where);
    }
    
    /*
     * 
     * Fetch by pk see base_model
     * @params $id 
     * Primary key
     * 
     */
    public function fetchById($id, $join = array()) {
        return parent::fetchById($id, $join);
    }
    
    /*
     * Delete a row from table
     * @param $id
     * 
     * primary key     * 
     */
    public function delete($where = array()) {
        return parent::delete($where);
    }
    
    /*
     * Get all featured items from table random with limit items
     * @params $limit integer count
     * see more base model
     * 
     */
    public function get_featured_items($limit)
    {
        
        $random = rand ( 1 , 6);
        $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                        . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                        . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                        . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                        . ''.TBL_SUBSCRIBERS.'.subs_review, '
                        . ''.TBL_SUBSCRIBERS.'.description, '
                        . ''.TBL_SUBSCRIBERS.'.description_ar, '
                        . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                        . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                        . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                        . ''.TBL_SUBSCRIBERS.'.description, '
                        . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                        . ''.TBL_SUBSCRIBERS.'.subs_review, '
                        . ''.TBL_SUBSCRIBERS.'.subs_state, '
                        . ''.TBL_SUBSCRIBERS.'.is_featured, '
                        . ''.TBL_SUBSCRIBERS.'.subs_type, '
                        . ''.TBL_SUBSCRIBERS.'.subs_country, '
                        . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                        . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                        . ''.TBL_SUBSCRIBERS.'.city, '
                        . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat,'
                        . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                        . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                        . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                        . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                        . ''.TBL_SUBSCRIBERS.'.subs_place, '
                        . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                        . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                        . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                        . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                        . ''.TBL_SUBSCRIBERS.'.subs_cat_id, '
                        . ''.TBL_SUBSCRIBERS.'.subs_address_1, '
                        . ''.TBL_SUBSCRIBERS.'.subs_address_2, '
                        . ''.TBL_SUBSCRIBERS.'.link_profile_to, '
                        . ''.TBL_SUBSCRIBERS.'.account_type, '
                        . ''.TBL_CITY.'.name, '
                        . ''.TBL_REGION.'.reg_name, '
                        . ''.TBL_CATEGORY.'.name as cat_name', FALSE);

            $this->db->from(TBL_SUBSCRIBERS);

            $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
            $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
            $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');

            $this->db->where( TBL_SUBSCRIBERS.".subs_type = $random");
            $this->db->where("(".TBL_SUBSCRIBERS.".is_featured = 1 && ".TBL_SUBSCRIBERS.".show_featured_home = 1)");
            $this->db->order_by(TBL_SUBSCRIBERS.'.user_id', 'RANDOM');
            $this->db->limit($limit);

            $query = $this->db->get();
            return $query->result();  
    }
    
    public function has_featured_result($random)
    {
        $this->db->select(TBL_SUBSCRIBERS.'.user_id')
                ->from(TBL_SUBSCRIBERS);
        $this->db->where( TBL_SUBSCRIBERS.".subs_type = $random");
        $this->db->where("(".TBL_SUBSCRIBERS.".is_featured = 1)");
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
    }
    
    public function get_nearest_location( $lat = null, $long = null, $limit = null, $cat = NULL, $children = array(), $has_cords = true, $q = '', $has_emergency = false) 
    {
 
        $limit = ($limit != NULL) ? $limit : 0;
 
        $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.description_ar, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat,'
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_1, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_2, '
                    . ''.TBL_SUBSCRIBERS.'.link_profile_to, '
                    . ''.TBL_SUBSCRIBERS.'.account_type, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_WALL.'.wall_id, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_CATEGORY.'.name as cat_name', FALSE);
        
        $this->db->from(TBL_SUBSCRIBERS);
                
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT'); 

        $this->db->join( TBL_WALL, TBL_WALL.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');     
        
        $this->db->where("(".TBL_SUBSCRIBERS.".subs_type != 1) AND ".TBL_SUBSCRIBERS.".published = 1 AND ".TBL_SUBSCRIBERS.".show_on_map = 1");
        $this->db->order_by(TBL_SUBSCRIBERS.".profile_visits", "desc");  
        $this->db->group_by(TBL_SUBSCRIBERS.".user_id"); 

        $query = $this->db->get();
        return $query->result();
        
    }
    
    
    public function get_nearest_pharmacies( $lat = null, $long = null, $limit = null, $cat = NULL, $children = array(), $has_cords = true, $q = '', $has_emergency = false) 
    {

        //$post = $this->q2array($q);
        
        if($has_cords)
        {
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state,'
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, ' 
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_1, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_2, '
                    . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( subs_lat_id ) ) * 
                    cos( radians( subs_long_id ) - radians('.$long.') ) + sin( radians('.$lat.') ) * 
                    sin( radians( subs_lat_id ) ) ) ) AS distance, 
                    '.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id',FALSE);
            
            $this->db->having('distance < 8'); 
        }else{
            
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat,'
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_1, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_2, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_CATEGORY.'.name as cat_name', FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS);

        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');     
        
        $this->db->where(TBL_SUBSCRIBERS.".subs_type = 2");
        
        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
            
        $this->db->order_by(TBL_SUBSCRIBERS.".profile_visits", "desc"); 
            
        $query = $this->db->get();
        return $query->result();
        
    }
 
    public function q2array($qry)
    {
        $result = array();
        //string must contain at least one = and cannot be in first position
        if(strpos($qry,'=')) {

         if(strpos($qry,'?')!==false) {
            $q = parse_url($qry);
            $qry = $q['query'];
          }
        }else {
            return false;
        }

        foreach (explode('&', $qry) as $couple) {
            
            list ($key, $val) = explode('=', $couple);
            $result[$key] = $val;
        }

        return empty($result) ? false : $result;
    }
        
    public function find($params, $children = array()) 
    {  

        $params['sort'] = (isset($params['sort'])) ? $params['sort'] : 'featured';
        $params['offset'] = (isset($params['offset'])) ? $params['offset'] : 30;
        $params['limit'] = (isset($params['limit'])) ? $params['limit'] : 30;
        
        if($this->session->userdata('coords'))
        {
            $cords = $this->session->userdata('coords');
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_CITY.'.name, ' 
                    . ''.TBL_WALL.'.wall_id, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, ( 6371 * acos( cos( radians('.$cords['lat'].') ) * cos( radians( subs_lat_id ) ) * 
                cos( radians( subs_long_id ) - radians('.$cords['long'].') ) + sin( radians('.$cords['lat'].') ) * 
                sin( radians( subs_lat_id ) ) ) ) AS distance, 
                    '.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id',FALSE);
            
            if( isset($params['d']) && $params['d'] != 'near' && $params['d'] != '')
            {
                $this->db->having('distance < '.$params['d']);
            }
            
        }else{
            
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city,'
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_WALL.'.wall_id, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id', FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS);
        
        if(isset($params['spl']) && $params['spl'] != '')
        {
            $this->db->where(TBL_CATEGORY.".seoname LIKE '".$params['spl']."' ");
        }
        
        $this->db->where(TBL_CATEGORY.".id_category = ".TBL_SUBSCRIBERS.".subs_cat_id");
            
        if(isset($params['s']) && $params['s'] != '')
        {
            $this->db->where(TBL_CITY.".name = '".$params['s']."' ");
        }
        
        if(isset($params['g']) && $params['g'] != '' && $params['g'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_gender = '".$params['g']."' ");
        }
            
        if(isset($params['he']) && $params['he'] != 'Any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".has_emergency = '".$params['he']."' ");
        }
        
        if(isset($params['spk']) && $params['spk'] != 'All')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages LIKE '".$params['spk']."' || ".TBL_SUBSCRIBERS.".subs_languages = 'All')");
        }
        
        if(isset($params['spk']) && $params['spk'] == 'All')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages = 'English' || ".TBL_SUBSCRIBERS.".subs_languages = 'Arabic' || ".TBL_SUBSCRIBERS.".subs_languages = 'All') ");
        }
        
        switch($params['sort'])
        {
            case 'featured':
                $this->db->order_by(TBL_SUBSCRIBERS.".user_id", "desc");
            break;
        
            case 'popularity':
                $this->db->order_by(TBL_SUBSCRIBERS.".profile_visits", "desc");
            break;
        
            case 'name':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_title", "asc");
            break;
        
            case 'date':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_created", "desc");
            break;
        
            case 'review':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_review", "desc");
            break;
        
        }
            
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');

        $this->db->join( TBL_WALL, TBL_WALL.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');     
        
        $this->db->where(TBL_SUBSCRIBERS.".subs_type = 1");  
        
        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        
        
        $this->db->limit($params['offset'], $params['limit']);
        
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_total_subscribers_by_date($date){

        $start_day = date('Y-m-d h:i:s', strtotime("midnight", $date));
        $end_day = date('Y-m-d h:i:s', strtotime("tomorrow", (strtotime($start_day) - 1 )));
        
        $this->db->select('COUNT('.TBL_SUBSCRIBERS.'.user_id) as regn');
        $this->db->where(TBL_SUBSCRIBERS.".subs_created BETWEEN '".$start_day."' AND '".$end_day."'");
        $this->db->from(TBL_SUBSCRIBERS);
        $query = $this->db->get();
        
        $rst = $query->result();
        $rst = $rst[0];
        return (int) $rst->regn;
        
    }
    
    public function find_visiting_subscribers($params, $children = array()) 
    {  
        //$this->output->enable_profiler(TRUE);
        $params['sort'] = (isset($params['sort'])) ? $params['sort'] : 'featured';
        $params['offset'] = (isset($params['offset'])) ? $params['offset'] : 30;
        $params['limit'] = (isset($params['limit'])) ? $params['limit'] : 30;

        if($this->session->userdata('coords'))
        {
            $cords = $this->session->userdata('coords');
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_from, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_to, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, ( 6371 * acos( cos( radians('.$cords['lat'].') ) * cos( radians( subs_lat_id ) ) * 
                cos( radians( subs_long_id ) - radians('.$cords['long'].') ) + sin( radians('.$cords['lat'].') ) * 
                sin( radians( subs_lat_id ) ) ) ) AS distance, 
                    '.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id',FALSE);
            
            
        }else{
            
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city,'
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_from, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_to, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id', FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS);
        
        if(isset($params['spl']) && $params['spl'] != '')
        {
            $this->db->where(TBL_CATEGORY.".seoname LIKE '".$params['spl']."' ");
        }

        if(isset($params['s']) && $params['s'] != '')
        {
            $this->db->where(TBL_CITY.".name = '".$params['s']."' ");
        }
        
        if(isset($params['spk']) && $params['spk'] != 'All')
        {
            $this->db->where(" (".TBL_SUBSCRIBERS.".subs_languages LIKE '".$params['spk']."' || ".TBL_SUBSCRIBERS.".subs_languages = 'All') ");
        }
        
        if(isset($params['dpd1']) && $params['dpd1'] != "")
        {
            $start_date = explode('/', $params['dpd1']);
            $start_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
            
        }else{
            $start_date = null;
        }
        
        if(isset($params['dpd2']) && $params['dpd2'] != "")
        {
            $end_date = explode('/', $params['dpd2']);
            $end_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
            
        }else{
            $end_date = null;
        }
            
        if($start_date != NULL && $end_date != NULL)
        {
            $this->db->where( "('$start_date' >= ".TBL_SUBSCRIBERS.".visit_timing_from AND '$end_date' <= ".TBL_SUBSCRIBERS.".visit_timing_to)");  
        }
        
        switch($params['sort'])
        {
            case 'featured':
                $this->db->order_by(TBL_SUBSCRIBERS.".user_id", "desc");
            break;
        
            case 'popularity':
                $this->db->order_by(TBL_SUBSCRIBERS.".profile_visits", "desc");
            break;
        
            case 'name':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_title", "asc");
            break;
        
            case 'date':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_created", "desc");
            break;
        
            case 'review':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_review", "desc");
            break;
        
        }
            
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        
        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        
        $this->db->where(TBL_SUBSCRIBERS.".subs_type = 1 AND ".TBL_SUBSCRIBERS.".is_visiting = 1");  
        $this->db->limit($params['offset'], $params['limit']);
        
        $this->db->order_by(TBL_SUBSCRIBERS.".profile_visits", "desc");
        
        $query = $this->db->get();
        return $query->result();
        
    }
    
    
    /*
     * See subscriber service for more details
     */
    public function get_latest_subscribers()
    {
        
        $tday = date('Y-m-d');
        $start = date('Y-m-d',strtotime($tday . "-10 days"));

        if($this->session->userdata('coords'))
        {
            $cords = $this->session->userdata('coords');
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_from, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_to, '
                    . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, ( 6371 * acos( cos( radians('.$cords['lat'].') ) * cos( radians( subs_lat_id ) ) * 
                cos( radians( subs_long_id ) - radians('.$cords['long'].') ) + sin( radians('.$cords['lat'].') ) * 
                sin( radians( subs_lat_id ) ) ) ) AS distance, 
                    '.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id',FALSE);
            
            
        }else{
            
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city,'
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_from, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_to, '
                    . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id', FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS);
        
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        
        $this->db->where(TBL_SUBSCRIBERS.".subs_created BETWEEN '$start' AND '$tday'");  
        $this->db->where(TBL_SUBSCRIBERS.".is_visiting = 0");
        $this->db->where(TBL_SUBSCRIBERS.".subs_type = 1");
        
        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        
        
        $this->db->limit(1);
        
        $this->db->order_by(TBL_SUBSCRIBERS.'.user_id', 'RANDOM');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /*
     * Get related doctors based on the category_id and user_id
     * @params $cat_id
     * @params $user_id
     * 
     * Recordset returned
     */
    public function get_related_drs( $cat_id, $user_id)
    {
        //$this->output->enable_profiler(TRUE);
        if($this->session->userdata('coords'))
        {
            $cords = $this->session->userdata('coords');
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_from, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_to, '
                    . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, ( 6371 * acos( cos( radians('.$cords['lat'].') ) * cos( radians( subs_lat_id ) ) * 
                cos( radians( subs_long_id ) - radians('.$cords['long'].') ) + sin( radians('.$cords['lat'].') ) * 
                sin( radians( subs_lat_id ) ) ) ) AS distance, 
                    '.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id', FALSE);
            
            
        }else{
            
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city,'
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_from, '
                    . ''.TBL_SUBSCRIBERS.'.visit_timing_to, '
                    . ''.TBL_SUBSCRIBERS.'.is_visiting, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id', FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS);
        
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        
        $this->db->where(TBL_SUBSCRIBERS.".subs_cat_id = $cat_id AND ".TBL_SUBSCRIBERS.".user_id NOT IN ($user_id)");  
        $this->db->where(TBL_SUBSCRIBERS.".status = 1");
        
        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        
        
        $this->db->limit(1);
        
        $this->db->order_by(TBL_SUBSCRIBERS.'.profile_visits', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function findsm($params, $children = array()) 
    {  
        //$this->output->enable_profiler(TRUE);
        $params['sort'] = (isset($params['sort'])) ? $params['sort'] : 'featured';
        $params['offset'] = (isset($params['offset'])) ? $params['offset'] : 30;
        $params['limit'] = (isset($params['limit'])) ? $params['limit'] : 0;
        
        if($this->session->userdata('coords'))
        {
            $cords = $this->session->userdata('coords');
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '

                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, ( 6371 * acos( cos( radians('.$cords['lat'].') ) * cos( radians( subs_lat_id ) ) * 
                cos( radians( subs_long_id ) - radians('.$cords['long'].') ) + sin( radians('.$cords['lat'].') ) * 
                sin( radians( subs_lat_id ) ) ) ) AS distance, 
                    '.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id',FALSE);
            
            if( isset($params['d']) && $params['d'] != 'near' && $params['d'] != '')
            {
                $this->db->having('distance < '.$params['d']);
            }
            
        }else{
            
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id', FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS);
        
        if(isset($params['spl']) && $params['spl'] != 'any')
        {
            $this->db->where(TBL_CATEGORY.".seoname LIKE '".$params['spl']."' ");
        }
        
        $this->db->where(TBL_CATEGORY.".id_category = ".TBL_SUBSCRIBERS.".subs_cat_id");
            
        if(isset($params['loc']) && $params['loc'] != 'any')
        {
            $this->db->where(TBL_CITY.".name = '".$params['loc']."' ");
        }
        
        if(isset($params['g']) && $params['g'] != '' && $params['g'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_gender = '".$params['g']."' ");
        }
        
        if(isset($params['spk']) && $params['spk'] != 'All')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages LIKE '".$params['spk']."' || ".TBL_SUBSCRIBERS.".subs_languages = 'All')");
        }
        
        if(isset($params['spk']) && $params['spk'] == 'All')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages = 'English' || ".TBL_SUBSCRIBERS.".subs_languages = 'Arabic' || ".TBL_SUBSCRIBERS.".subs_languages = 'All') ");
        }
        
        switch($params['sort'])
        {
            case 'featured':
                $this->db->order_by(TBL_SUBSCRIBERS.".user_id", "desc");
            break;
        
            case 'popularity':
                $this->db->order_by(TBL_SUBSCRIBERS.".profile_visits", "desc");
            break;
        
            case 'name':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_title", "asc");
            break;
        
            case 'date':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_created", "desc");
            break;
        
            case 'review':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_review", "desc");
            break;
        
        }
            
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        
        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        
        
        $this->db->where(TBL_SUBSCRIBERS.".subs_type = 1");  
        $this->db->limit($params['offset'], $params['limit']);
        
        $query = $this->db->get();
        return $query->result();
        
    }
    
    
    public function search($params) 
    {  
        //$this->output->enable_profiler(TRUE);
        $params['sort'] = (isset($params['sort'])) ? $params['sort'] : 'featured';
        $params['offset'] = (isset($params['offset'])) ? $params['offset'] : 2;
        $page = (isset($params['limit'])) ? $params['limit'] : 0;
        $perpage = isset($params['per_page']) ? $params['per_page'] : 10;
        $cords = $this->session->userdata('coords');
        
        if($cords)
        {
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.description_ar, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.subs_url ,'
                    . ''.TBL_SUBSCRIBERS.'.subs_address_1, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_1_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_2, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_2_ar, '
                    . ''.TBL_SUBSCRIBERS.'.account_type, '
                    . ''.TBL_SUBSCRIBERS.'.link_profile_to, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_CITY.'.name_ar, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_WALL.'.wall_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img, ( 6371 * acos( cos( radians('.$cords['lat'].') ) * cos( radians( subs_lat_id ) ) * 
                cos( radians( subs_long_id ) - radians('.$cords['long'].') ) + sin( radians('.$cords['lat'].') ) * 
                sin( radians( subs_lat_id ) ) ) ) AS distance, 
                    '.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_CATEGORY.'.name_ar as cat_name_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id',FALSE);
            
            if( isset($params['d']) && $params['d'] != 'near' && $params['d'] != '')
            {
                $this->db->having('distance < '.$params['d']);
            }
            
        }else{
            
            $this->db->select(TBL_SUBSCRIBERS.'.user_id , '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_medical_center, '
                    . ''.TBL_SUBSCRIBERS.'.subs_primary_contact, '
                    . ''.TBL_SUBSCRIBERS.'.description, '
                    . ''.TBL_SUBSCRIBERS.'.description_ar, '
                    . ''.TBL_SUBSCRIBERS.'.profile_visits, '
                    . ''.TBL_SUBSCRIBERS.'.subs_state, '
                    . ''.TBL_SUBSCRIBERS.'.subs_review, '
                    . ''.TBL_SUBSCRIBERS.'.is_featured, '
                    . ''.TBL_SUBSCRIBERS.'.subs_type, '
                    . ''.TBL_SUBSCRIBERS.'.subs_country, '
                    . ''.TBL_SUBSCRIBERS.'.subs_experience, '
                    . ''.TBL_SUBSCRIBERS.'.subs_public_profile, '
                    . ''.TBL_SUBSCRIBERS.'.city, '
                    . ''.TBL_SUBSCRIBERS.'.subs_lat_id as lat, '
                    . ''.TBL_SUBSCRIBERS.'.subs_long_id as lon, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title as title, '
                    . ''.TBL_SUBSCRIBERS.'.subs_title_ar as title_ar, '
                    . ''.TBL_SUBSCRIBERS.'.has_emergency, '
                    . ''.TBL_SUBSCRIBERS.'.subs_timings, '
                    . ''.TBL_SUBSCRIBERS.'.subs_place, '
                    . ''.TBL_SUBSCRIBERS.'.subs_url ,'
                    . ''.TBL_SUBSCRIBERS.'.subs_address_1, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_1_ar, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_2, '
                    . ''.TBL_SUBSCRIBERS.'.subs_address_2_ar, '
                    . ''.TBL_CITY.'.name, '
                    . ''.TBL_CITY.'.name_ar, '
                    . ''.TBL_REGION.'.reg_name, '
                    . ''.TBL_SUBSCRIBERS.'.subs_profile_img,'
                    . ''.TBL_CATEGORY.'.name as cat_name, '
                    . ''.TBL_CATEGORY.'.name_ar as cat_name_ar, '
                    . ''.TBL_SUBSCRIBERS.'.account_type, '
                    . ''.TBL_SUBSCRIBERS.'.link_profile_to, '
                    . ''.TBL_WALL.'.wall_id, '
                    . ''.TBL_SUBSCRIBERS.'.subs_cat_id', FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS.','.TBL_CATEGORY);
            
        //SPEAKING
        if(isset($params['spk']) && $params['spk'] != 'all')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages LIKE '".$params['spk']."' || ".TBL_SUBSCRIBERS.".subs_languages = 'All')");
        }
        
        if(isset($params['spk']) && $params['spk'] == 'all')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages = 'English' || ".TBL_SUBSCRIBERS.".subs_languages = 'Arabic' || ".TBL_SUBSCRIBERS.".subs_languages = 'All')");
        }
        
        //SPL
        if(isset($params['spl']) && $params['spl'] != '')
        {
            $this->db->where(TBL_CATEGORY.".seoname LIKE '".$params['spl']."' ");
            $this->db->where(TBL_CATEGORY.".id_category = ".TBL_SUBS_SPECIALIZATION.".spl_id");
        }
        
        //LOC
        if(isset($params['loc']) && $params['loc'] != 'any')
        {
            $this->db->where(TBL_CITY.".name = '".$params['loc']."' ");
        }
        
        //QRY
        if(isset($params['q']) && $params['q'] != '' && !RTL)
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_title LIKE '%".$params['q']."%' ");
        }
        
        if(isset($params['q']) && $params['q'] != '' && RTL)
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_title_ar LIKE '%".$params['q']."%' ");
        }
        
        //GENDER
        if(isset($params['g']) && $params['g'] != '' && $params['g'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_gender = '".$params['g']."' ");
        }
        
        //HAS EMERGENCY
        if(isset($params['he']) && $params['he'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".has_emergency = '".$params['he']."' ");
        }
            
        //HOUSE SERVICE
        if(isset($params['hs']) && $params['hs'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".has_home_services = '".$params['hs']."' ");
        }
        
        //Specialization for medical center
        if(isset($params['serv']) && $params['serv'] != 'any')
        {
            $this->db->join( TBL_SERVICES, TBL_SERVICES.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');
            $this->db->where(TBL_SERVICES.".services_title = '".$params['serv']."' ");
        }
        
        //Space for insurance
        
        switch($params['seo'])
        {
            case 'doctors':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 1");
            break;
        
            case 'medical-center':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 3");
            break;
        
            case 'pharmacy':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 2");
            break;
        
            case 'beauty-care':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 4");
            break;
        
            case 'hospital':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 6");
            break;
        
            case 'labs':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 5");
            break;
            
            default :
        
        }

        $this->db->order_by(TBL_SUBSCRIBERS.".is_featured", "desc");
        
        switch($params['sort'])
        {
            case 'featured':
                $this->db->order_by(TBL_SUBSCRIBERS.".user_id", "desc");
            break;
        
            case 'popularity':
                $this->db->order_by(TBL_SUBSCRIBERS.".profile_visits", "desc");
            break;
        
            case 'name':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_title", "asc");
            break;
        
            case 'date':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_created", "desc");
            break;
        
            case 'review':
                $this->db->order_by(TBL_SUBSCRIBERS.".subs_review", "desc");
            break;
        
        }
        
        if($cords)
        {
            $this->db->order_by("distance", "ASC");
        }
            
        if(RTL){$lang = 'Arabic';}else{$lang = 'English';}
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        $this->db->where(TBL_SUBSCRIBERS.".published = 1");
        
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_SUBS_SPECIALIZATION, TBL_SUBS_SPECIALIZATION.'.subs_id = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');
        $this->db->join( TBL_WALL, TBL_WALL.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');   
        
        $this->db->group_by(TBL_SUBSCRIBERS.'.user_id');
        $this->db->limit($perpage, $page);
        
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function count_search($params) 
    {  
        $params['sort'] = (isset($params['sort'])) ? $params['sort'] : 'featured';
        $params['offset'] = (isset($params['offset'])) ? $params['offset'] : 30;
        $params['limit'] = (isset($params['limit'])) ? $params['limit'] : 0;
        
        if($this->session->userdata('coords'))
        {
            $cords = $this->session->userdata('coords');
            $this->db->select('COUNT('.TBL_SUBSCRIBERS.'.user_id) as count , ( 6371 * acos( cos( radians('.$cords['lat'].') ) * cos( radians( subs_lat_id ) ) * 
                cos( radians( subs_long_id ) - radians('.$cords['long'].') ) + sin( radians('.$cords['lat'].') ) * 
                sin( radians( subs_lat_id ) ) ) ) AS distance',FALSE);
            
            if( isset($params['d']) && $params['d'] != 'near' && $params['d'] != '')
            {
                $this->db->having('distance < '.$params['d']);
            }
            
        }else{
            
            $this->db->select('COUNT('.TBL_SUBSCRIBERS.'.user_id) as count',FALSE);
        }
        
        $this->db->from(TBL_SUBSCRIBERS);
        
        //SPL
        if(isset($params['spl']) && $params['spl'] != '')
        {
            $this->db->where(TBL_CATEGORY.".seoname LIKE '".$params['spl']."' ");
        }
        
        $this->db->where(TBL_CATEGORY.".id_category = ".TBL_SUBSCRIBERS.".subs_cat_id");
        
        //LOC
        if(isset($params['loc']) && $params['loc'] != 'any')
        {
            $this->db->where(TBL_CITY.".name = '".$params['loc']."' ");
        }
        
        //QRY
        if(isset($params['q']) && $params['q'] != '')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_title LIKE '%".$params['q']."%' ");
        }
        
        //GENDER
        if(isset($params['g']) && $params['g'] != '' && $params['g'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_gender = '".$params['g']."' ");
        }
        
        //HAS EMERGENCY
        if(isset($params['he']) && $params['he'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".has_emergency = '".$params['he']."' ");
        }
        
        //SPEAKING
        if(isset($params['spk']) && $params['spk'] != 'all')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages LIKE '".$params['spk']."' || ".TBL_SUBSCRIBERS.".subs_languages = 'All')");
        }
        
        if(isset($params['spk']) && $params['spk'] == 'all')
        {
            $this->db->where("(".TBL_SUBSCRIBERS.".subs_languages = 'English' || ".TBL_SUBSCRIBERS.".subs_languages = 'Arabic' || ".TBL_SUBSCRIBERS.".subs_languages = 'All')");
        }
        
        
        //HOUSE SERVICE
        if(isset($params['hs']) && $params['hs'] != 'any')
        {
            $this->db->where(TBL_SUBSCRIBERS.".has_home_services = '".$params['hs']."' ");
        }
        
        //Specialization for medical center
        if(isset($params['serv']) && $params['serv'] != 'any')
        {
            $this->db->join( TBL_SERVICES, TBL_SERVICES.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');
            $this->db->where(TBL_SERVICES.".services_title = '".$params['serv']."' ");
        }
        
        //Space for insurance
        
        switch($params['seo'])
        {
            case 'doctors':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 1");
            break;
        
            case 'medical-centers':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 3");
            break;
        
            case 'pharmacy':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 2");
            break;
        
            case 'beauty-care':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 4");
            break;
        
            case 'hospitals':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 6");
            break;
        
            case 'labs':
                $this->db->where(TBL_SUBSCRIBERS.".subs_type = 5");
            break;
            
            default :
        
        } 
            
        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';
        
        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        $this->db->where(TBL_SUBSCRIBERS.".published = 1");
        
        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_REGION, TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        
        $this->db->limit(1);
        
        $query = $this->db->get();
        $result = $query->result();
        return (isset($result[0]->count)) ? (int) $result[0]->count : 0;
        
    }

    /*
    Get medical center doctors list by name
    @params $name string data
    */
    public function get_mdl_ctr_doctors($name)
    {
        $where = array(
           TBL_SUBSCRIBERS.'.subs_medical_center' =>  $name
        );
 
        $this->db->select(TBL_SUBSCRIBERS.'.dept_fk,'.TBL_SUBSCRIBERS.'.subs_title, '.TBL_SUBSCRIBERS.'.subs_created, '.TBL_SUBSCRIBERS.'.profile_visits,'.TBL_SUBSCRIBERS.'.subs_cat_id, '.TBL_SUBSCRIBERS.'.subs_email, '.TBL_SUBSCRIBERS.'.user_id, '.TBL_SUBSCRIBERS.'.subs_languages, '.TBL_SUBSCRIBERS.'.subs_profile_img,'.TBL_SUBSCRIBERS.'.published, '.TBL_SUBSCRIBERS.'.subs_type, '.TBL_SUBSCRIBERS.'.subs_title_ar, '.TBL_SUBSCRIBERS.'.subs_public_profile, '.TBL_CATEGORY.'.name, '.TBL_CATEGORY.'.name_ar')
                 ->from(TBL_SUBSCRIBERS)
                 ->where($where);

        $this->db->join(TBL_SUBS_SPECIALIZATION, TBL_SUBS_SPECIALIZATION.'.subs_id = '.TBL_SUBSCRIBERS.'.user_id', 'INNER');
        $this->db->join(TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBS_SPECIALIZATION.'.spl_id', 'INNER');
        $this->db->group_by(TBL_SUBSCRIBERS.'.user_id');
        
        $query = $this->db->get();
        return $query->result();
    }
 
}