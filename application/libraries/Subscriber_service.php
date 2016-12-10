<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Subscriber_service{
 
    public static function get_subscribers( $condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        $order_by = array(
          TBL_SUBSCRIBERS.'.user_id' => 'DESC'  
        );
        return $CI->subscriber_model->get_subscribers( $condition, $order_by, $limit, $offset, $join);
 
    }

    static public function getCommentCount($pk)
    {
        $CI = & get_instance();
        $CI->db->select(TBL_SUBSCRIBERS.'.comments')
               ->from(TBL_SUBSCRIBERS)
               ->where(TBL_SUBSCRIBERS.'.user_id = '.$pk)
               ->limit(1);
        return $CI->db->get()->result();
    }
 
    static public function updateCommentCount($commentCnt,$pk)
    {
        $save = array(
            TBL_SUBSCRIBERS.'.comments' => $commentCnt
        );

        $where = array(
            TBL_SUBSCRIBERS.'.user_id' => $pk
        );

        return self::save($save,$where);
    }

    static public function getLikesCount($pk)
    {
        $CI = & get_instance();
        $CI->db->select(TBL_SUBSCRIBERS.'.likes')
               ->from(TBL_SUBSCRIBERS)
               ->where(TBL_SUBSCRIBERS.'.user_id = '.$pk)
               ->limit(1);
        $query = $CI->db->get()->result();
        return $query[0];
    }

    static public function updateLikesCount($likesCnt,$pk)
    {
        $save = array(
            TBL_SUBSCRIBERS.'.likes' => $likesCnt
        );

        $where = array(
            TBL_SUBSCRIBERS.'.user_id' => $pk
        );

        return self::save($save,$where);
    }
    
    static public function get_subscribers_medical_centers($condition = '', $fields = array()){
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        return $CI->subscriber_model->get_subscribers_medical_centers( $condition, $fields);
    }

    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        return $CI->subscriber_model->save( $save, $where);
    }
    
    public static function get_subscriber_row($where = array(), $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        return $CI->subscriber_model->fetchRow($where, $join);
    }
    
    public static function get_subscriber_by_pk($id, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
            
        if(empty($join))
        {
            $join = array(
                array('table' => TBL_CATEGORY, 'condition' => TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'join_type' => 'inner')
            );
        }
        
        return $CI->subscriber_model->fetchById( $id, $join);
        
    }
    
    /*
     * Delete subscriber details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function delete($where)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        
        return $CI->subscriber_model->delete($where);        
    }
    
    public static function read_html_content($html)
    {
        return file_get_contents($html);        
    }
    
    /*
     * Check if the username is already taken or not
     * @params $where
     * 
     * For more doc .. see base_model
     */
    public function has_username($where)
    {
        $user = $this->get_subscribers($where);
        
        if($user AND count($user) > 0)
        {
            return true;
        }else{
            
            return false;
        }
    }
    
    /*
     * Check if the profile url is already taken or not
     * @params $where
     * 
     * For more doc .. see base_model
     */
    public function has_profileurl($where)
    {
        $user = $this->get_subscribers($where);
        
        if($user AND count($user) > 0)
        {
            return true;
        }else{
            
            return false;
        }
    }
    
    /*
     * 
     * Set subscriber menu access
     * $params $save
     * 
     * For more doc -- see base_model
     */
    public static function set_subscriber_menu_access($save, $where = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('subscriber_access_model');
        
        return $CI->subscriber_access_model->save( $save, $where);
    }
    
    /*
     * Unset all menu access provided to the subscriber
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_subscriber_menu_access($where)
    {
        
        $CI = & get_instance();
        $CI->load->model('subscriber_access_model');
        
        return $CI->subscriber_access_model->delete($where);
    }
    
    /*
     * Get all menu access provided to the subscriber
     * @params $subscriber_id
     * 
     * For more doc ... see base_model
     */
    public static function get_subscriber_menu_access($subscriber_id)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_access_model');
        
        $where = array(
            
            TBL_SUBSCRIBERS_MENU_ACCESS.'.subs_id' => $subscriber_id
        );
        
        $menu_access_arr = array();
        $menu_arr = $CI->subscriber_access_model->get_subscriber_access($where);

        if($menu_arr)
        {
           foreach ($menu_arr as $menu)
            {
                array_push($menu_access_arr, $menu->access);            
            } 
        }
        
        return $menu_access_arr;
    }
    
    /*
     * Reset n update the password
     * $params $id => Primary key of subscriber
     * @params $username => Subscribers username for password encryption
     * 
     * For more doc ... see base_model
     */
    public function rst_user_pwd( $id, $username){
        
        $CI = & get_instance();
        $CI->load->model('auth_model');
        
        $rndm_pwd = $CI->auth_model->generate_random_password();
        $uniq_token = $CI->auth_model->generate_unique_token($username);
        $pwd_hash = $CI->auth_model->generate_password_hash( $rndm_pwd, $uniq_token);
        
        $save = array(
          TBL_SUBSCRIBERS.'.subs_pwd_hash' => $pwd_hash,
          TBL_SUBSCRIBERS.'.subs_uniq_token' => $uniq_token,
          TBL_SUBSCRIBERS.'.r_password' => $rndm_pwd
        );
        
        $where = array(
          TBL_SUBSCRIBERS.'.user_id' => $id
        );
        
        $this->save( $save, $where);
        
        return $rndm_pwd;
			
    }
    
    /*
     * Set a subscriber as featured
     * @params $id -> Subscriber primary key
     * @params $status -> Subscriber featured status
     *
     * For more doc ... see base_model 
     */
    public function set_featured_status($id , $status)
    {
        
        $save = array(
          TBL_SUBSCRIBERS.'.is_featured' => $status
        );
        
        $where = array(
          TBL_SUBSCRIBERS.'.user_id' => $id
        );
        
        return $this->save( $save, $where);
    }
    
    /*
     * Get subscriber page settings accrodingly
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_subscriber_page_settings($subscriber_id)
    {
        
        $CI = & get_instance();
        $CI->load->model('subscriber_page_setting_model');
        
        $where = array(
            TBL_PAGE_SETTINGS.'.subscriber' => $subscriber_id
        );
        
        return $CI->subscriber_page_setting_model->fetchRow($where);
    }
    
    /*
     * Get subscriber about us page content settings\
     * @params $subscriber_id
     * 
     * 
     * For more doc .. See base_model
     */
    public static function get_subscriber_about_page($subscriber_id)
    {
        
        $CI = & get_instance();
        $CI->load->model('subscriber_about_page_model');
        
        $where = array(
            TBL_ABOUT_PAGE_SETTINGS.'.subscriber' => $subscriber_id
        );
        
        return $CI->subscriber_about_page_model->fetchRow($where);
    }
    
    /*
     * Has subscriber page setting
     * @params $where
     * 
     * For more doc ... see base_model
     */
    public static function has_page_setting($where, $page)
    {
        
        $CI = & get_instance();
        
        switch($page)
        {
            
            case TBL_PAGE_SETTINGS:
                
                $CI->load->model('subscriber_page_setting_model');
                $config = $CI->subscriber_page_setting_model->get( $where);
                
            break;
        
            case TBL_ABOUT_PAGE_SETTINGS:
                
                $CI->load->model('subscriber_about_page_model');
                $config = $CI->subscriber_about_page_model->get( $where);
            break;
        
            case TBL_CONTACT_US_PAGE:
                
                $CI->load->model('subscriber_contact_page_model');
                $config = $CI->subscriber_contact_page_model->get( $where);
            break;
        
            default:
                return false;
        }
        
 
        if($config && count($config) > 0)
        {
            return true;
        }else{
            
            return false;
        }
        
    }
    
    /*
     * Set page setting
     * @params $save
     * @params $where 
     * @params $page
     * 
     * For more doc ... see base_model
     */
    public static function set_page_setting($save, $page, $where = array())
    {
        
        $CI = & get_instance();
        
        switch ($page)
        {
            
            case TBL_PAGE_SETTINGS:
                
                $CI->load->model('subscriber_page_setting_model');
                return $CI->subscriber_page_setting_model->save( $save, $where);
            break;
        
            case TBL_ABOUT_PAGE_SETTINGS:
                
                $CI->load->model('subscriber_about_page_model');
                return $CI->subscriber_about_page_model->save( $save, $where);
            break;
        
            case TBL_CONTACT_US_PAGE:
                
                $CI->load->model('subscriber_contact_page_model');
                return $CI->subscriber_contact_page_model->save( $save, $where);
            break;
        
            default:
                
        }
        
    }
    
    /*
    * Get subscriber page settings
    * @params $subscriber_id
    * @params $page
    * 
    * For more doc .. See base_model
    */
    public static function get_subscriber_page( $subscriber, $page)
    {
            
        $CI = & get_instance();
        
        switch ($page)
        {
            
            case TBL_PAGE_SETTINGS:
                
                $CI->load->model('subscriber_about_page_model');
        
                $where = array(
                    TBL_ABOUT_PAGE_SETTINGS.'.subscriber' => $subscriber
                );
        
                return $CI->subscriber_about_page_model->fetchRow($where);
                
            break;
        
            case TBL_ABOUT_PAGE_SETTINGS:
                
                $CI->load->model('subscriber_about_page_model');
        
                $where = array(
                    TBL_ABOUT_PAGE_SETTINGS.'.subscriber' => $subscriber
                );
        
                return $CI->subscriber_about_page_model->fetchRow($where);
            break;
        
            case TBL_CONTACT_US_PAGE:
                
                $CI->load->model('subscriber_contact_page_model');
        
                $where = array(
                    TBL_CONTACT_US_PAGE.'.subscriber' => $subscriber
                );
        
                return $CI->subscriber_contact_page_model->fetchRow($where);
            break;
        
            default:
                
        }    
    }
    
    /*
     * Get doctors from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_doctors($where)
    {
        
        $CI = & get_instance();
        $CI->load->model('our_doctors_model');
        
        return $CI->our_doctors_model->get($where);
    }
    
    
    /*
     * Save doctor details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_doctor($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('our_doctors_model');
        
        return $CI->our_doctors_model->save( $save, $where);   
    }
    
    /*
     * Get doctor details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_doctor_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('our_doctors_model');
        
        return $CI->our_doctors_model->fetchById( $id); 
    }
    
    /*
     * Unset doctor details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_doctor($where)
    {
        $CI = & get_instance();
        $CI->load->model('our_doctors_model');
        
        return $CI->our_doctors_model->delete($where);        
    }
    
    /*
     * Get services from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_services($pk)
    {
        
        $CI = & get_instance();
        $CI->load->model('specialization_model');
        
        return $CI->specialization_model->get_spl_by_usr_all($pk);
    }

    /*
     * Get services from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_services_subscribers($where = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('our_services_model');
        
        return $CI->our_services_model->get($where);
    }

    /*
     * Get services meta tags from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_services_meta_tags($where = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        
        $meta_tags = $CI->subscriber_model->get_meta_tags($where);
        $format_meta = array();
        if($meta_tags)
        {
            foreach ($meta_tags as $mt) {

                $meta_array = unserialize($mt->meta);

                if(is_array($meta_array))
                {
                    foreach ($meta_array as $key) {

                       if($key != "") 
                       {
                         array_push($format_meta, $key);
                       }
                       
                    }
                }
                
            }
        }

        return $format_meta;
    }
    
    /*
     * Save services details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_service($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('our_services_model');
        
        return $CI->our_services_model->save( $save, $where);   
    }
    
    /*
     * Get services details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_service_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('our_services_model');
        
        return $CI->our_services_model->fetchById( $id); 
    }
    
    /*
     *  Unset services details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_service($where)
    {
        $CI = & get_instance();
        $CI->load->model('our_services_model');
        
        return $CI->our_services_model->delete($where);    
    }
    
    /*
     * Get offers from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_offers($where, $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('our_offers_model');
            
        return $CI->our_offers_model->get($where, $orderBy, $limit, $offset, $join);
    }
    
    /*
     * Save offer details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_offer($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('our_offers_model');
        
        return $CI->our_offers_model->save( $save, $where);   
    }
    
    /*
     * Get offer details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_offer_by_pk($id, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('our_offers_model');
        
        return $CI->our_offers_model->fetchById( $id, $join); 
    }

    /*
    Get offer details by title passed
    @params $title String
    */
    public function get_offer_details_by_title($title)
    {
        $CI = & get_instance();
        $CI->load->model('our_offers_model');
        
        return $CI->our_offers_model->get_offer_details_by_title($title); 
    }
    
    /*
     *  Unset offer details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_offer($where)
    {
        $CI = & get_instance();
        $CI->load->model('our_offers_model');
        
        return $CI->our_offers_model->delete($where);    
    }
    
    /*
     * Get latest enabled offer from database
     * @params Userid
     */
    public static function get_latest_offer($user_id)
    {
        $CI = & get_instance();
        $CI->load->model('our_offers_model');
        
        $condition = array(
          TBL_OFFERS.'.subscriber' => $user_id  
        );
        $order_by = array(
          TBL_OFFERS.'.offer_id' => 'DESC'
        );
        
        $res = $CI->our_offers_model->get( $condition, $order_by, 1);
        if($res){
            return $res[0];
        }else{
            return false;
        }
    }
    
    /*
     * Get notes from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_clients($where)
    {
        
        $CI = & get_instance();
        $CI->load->model('insurance_client_model');
        
        return $CI->insurance_client_model->get($where);
    }
    
    
    /*
     * Save note details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_client($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('insurance_client_model');
        
        return $CI->insurance_client_model->save( $save, $where);   
    }
    
    /*
     * Get note details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_client_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('insurance_client_model');
        
        return $CI->insurance_client_model->fetchById( $id); 
    }
    
    /*
     * Unset note details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_client($where)
    {
        $CI = & get_instance();
        $CI->load->model('insurance_client_model');
        
        return $CI->insurance_client_model->delete($where);        
    }
    
    
    /*
     * Get notes from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_notes( $where, $join = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('notes_model');
        
        return $CI->notes_model->get($where);
    }
    
    
    /*
     * Save note details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_note($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('notes_model');
        
        return $CI->notes_model->save( $save, $where);   
    }
    
    /*
     * Get note details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_note_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('notes_model');
        
        return $CI->notes_model->fetchById( $id); 
    }
    
    /*
     * Unset note details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_note($where)
    {
        $CI = & get_instance();
        $CI->load->model('notes_model');
        
        return $CI->notes_model->delete($where);        
    }
    
    /*
     * Get note details from title passed
     * @params $title String
     * 
     * For more doc .. See base_model
     */     
    public static function get_note_by_title($title)
    {
        $CI = & get_instance();
        $CI->load->model('notes_model');
        
        return $CI->notes_model->get_note_by_title($title); 
    }

    /*
     * Get featured items only from databse from entire list
     * @params $limit integer value for limt 
     * this returns an array of random records
     */
    static public function get_featured_items($limit)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        
        return $CI->subscriber_model->get_featured_items($limit); 
    }
    
    
    public function get_nearest_location( $lat, $long, $count, $get_cords_only = true, $children = array(), $seo = "", $q, $emergency = false)
    {

        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        $CI->load->model('category_model'); 
        
        $cords =  $CI->subscriber_model->get_nearest_location( $lat, $long, $count, $seo, $children, true, $q, $emergency);
        $ret = array();
        
        if($get_cords_only)
        {
            
            foreach ($cords as $c)
            {
                
                $description = (strlen($c->description) > 130) ? substr( $c->description, 0, 130).'...' : $c->description;
            
                $html = '<div class="marker_info none" id="marker_info">'
                        . '<div class="info" id="info">';
                
                if($c->subs_profile_img != NULL || $c->subs_profile_img != '')
                {
                    $html .= '<img src="'.base_url().'uploads/subscribers/profile/'.$c->subs_profile_img.'" class="logotype" alt=""/>';
                }else{
                    $html .= '<img src="'.ACTIVE_THEME.'assets/img/442/default/'.$c->subs_type.'.svg" class="logotype" alt=""/>';
                }

                $html .= '<h2>'.$c->title.'<span></span></h2>'
                        . '<span>'.$description.'</span>';
                
                $contact = $this->get_subscriber_page($c->user_id, TBL_CONTACT_US_PAGE);
                $profile_url = '';
                                                
                switch ($c->link_profile_to){

                    case 'self':
                        $profile_url = base_url().''.$c->subs_public_profile;
                    break;

                    case 'fb':
                        $profile_url = $contact->social_fb_link;
                    break;

                    case 'twitter':
                        $profile_url = $contact->social_tweet_link;
                    break;

                    case 'instagram':
                        $profile_url = $contact->social_inst_link;
                    break;

                    case 'ytube':
                        $profile_url = $contact->social_ytube_link;
                    break;

                    case 'gplus':
                        $profile_url = $contact->social_google_plus;
                    break;

                    case 'lkndin':
                        $profile_url = $contact->social_linked_in;
                    break;

                    default:
                        $profile_url = base_url().''.$c->subs_public_profile;                                                

                }
                                                
                if($c->account_type == 0 || $c->is_featured == 1)
                {
                    $html .= '<a href="'.$profile_url.'" target="_blank" class="green_btn">More info</a>';
                }
                
                $html .= '<span class="arrow"></span>'
                    .'</div></div>';
                
                $icon = $this->getGmapIcon($c, 'svg');
                
                $val = array(
                    'user' => $c->user_id,
                    'lat' => $c->lat,
                    'lon' => $c->lon,
                    'title' => $c->title,
                    'html' => $html,
                    'is_featured' => $c->is_featured,
                    'profile' => base_url().$c->subs_public_profile,
                    'icon' => $icon

                );
                
                array_push($ret, $val);
                
            } 
            
            return $ret;
            
        }
        
    }

    public function get_gmap_default_caticon($subs)
    {
        $where = array(
            TBL_OFFERS.".subscriber" => $subs->user_id
        );

        $offers = $this->get_offers($where);

        switch($subs->subs_type)
        {
            
            
            case "3": 
 
                
                $icon = 'medical-center-normal.svg';
                
                if(!$offers && $subs->has_emergency == 1)
                {
                    $icon = 'medical-center-24.svg';
                } 
                
                if($offers && $subs->has_emergency == 1){
                    $icon = 'medical-center-both.svg';
                }
                
                if($offers && $subs->has_emergency == 0){
                    $icon = 'medical-center-offer.svg';
                }
                
            break;
            
            case "6":  
                
                $icon = 'hospital-normal-icon.svg';
                
                if(!$offers && $subs->has_emergency == 1)
                {
                    $icon = 'hospital-24-icon.svg';
                } 
                
                if($offers && $subs->has_emergency == 1){
                    $icon = 'hospital-both.svg';
                }
                
                if($offers && $subs->has_emergency == 0){
                    $icon = 'hospital-offer.svg';
                }
                
            break;
            
            case "4":  
                
                $icon = 'beauty-center-icon.svg';
            
                if($offers){
                    $icon = 'beauty-center-offer.svg';
                }
                
            break;
            
            case "5": 
            
                $icon = 'lab-normal-icon.svg';
            
            break;
        
            case "2": 
                
                $icon = 'icon-pharm-normal.svg';
                
                if($subs->has_emergency == 1)
                {
                    $icon = 'icon-pharm-24.svg';
                } 
                
            break;
        
            default : $icon = 'medical-center-normal.png';
                
        }
        
        return base_url().'themes/default/assets/img/default/'.$icon;


    }
     
    public function get_gmap_caticon($subs)
    {
        $where = array(
            TBL_OFFERS.".subscriber" => $subs->user_id
        );

        $offers = $this->get_offers($where);

        $img = explode(".", $subs->subs_profile_img);
 
        if($offers)
        {
            $icon = 'gmap/'.$img[0].'_offer.png';
        }else if($offers && $subs->has_emergency == 1){
            $icon = 'gmap/'.$img[0].'_both.png'; 
        }else if($subs->has_emergency == 1){
            $icon = 'gmap/'.$img[0].'_emergency.png'; 
        }else{
            $icon = 'gmap/'.$img[0].'_normal.png'; 
        }
        
        return base_url().'uploads/subscribers/'.$icon;
    }
    
    
    public function get_master_parent($cat_id)
    {
        $parent_arr = array();
        
        $CI = & get_instance();
        $CI->load->library('category_service');
        
        while($CI->category_service->has_parent($cat_id)){
        
            $parent = $CI->category_service->get_category_by_pk($cat_id);
            $cat_id = $parent->id_category_parent;
            array_push($parent_arr, $parent->seoname);
        }
                                        
        $parent_arr = array_reverse($parent_arr);                                    
        return $parent_arr[0];
        
    }
    
    /*
     * Get product from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_products($where)
    {
        
        $CI = & get_instance();
        $CI->load->model('our_product_model');
        
        return $CI->our_product_model->get($where);
    }

    /*
    Get current marker click count
    @params $user_id Integer
    see mdoel for more doc
    */
    public static function getCurrentMrkrClickCnt($usrId)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        
        $count = $CI->subscriber_model->getCurrentMrkrClickCnt($usrId); 

        if($count[0]->subs_marker_click)
        {
            return (int) $count[0]->subs_marker_click;
        }else{
            return 0;
        }
    }

    /*
    Set current marker click count
    @params $count Integer
    @params $usrId Integer
    see mdoel for more doc
    */
    public static function SetMrkrClickCnt($count, $usrId)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');

        $save = array(
            TBL_SUBSCRIBERS.'.subs_marker_click' => $count
        );

        $where = array(
            TBL_SUBSCRIBERS.'.user_id' => $usrId
        );
        
        return $CI->subscriber_model->save($save,$where);
    }
    
    /*
     * Save product details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_product($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('our_product_model');
        
        return $CI->our_product_model->save( $save, $where);   
    }
    
    /*
     * Get product details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_product_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('our_product_model');
        
        return $CI->our_product_model->fetchById( $id); 
    }
    
    /*
     *  Unset product details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_product($where)
    {
        $CI = & get_instance();
        $CI->load->model('our_product_model');
        
        return $CI->our_product_model->delete($where);    
    }
    
    
    /*
     * Get testimonials from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_testimonials($where)
    {
        
        $CI = & get_instance();
        $CI->load->model('testimonials_model');
        
        return $CI->testimonials_model->get($where);
    }
    
    
    /*
     * Save testimonial details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_testimonial($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('testimonials_model');
        
        return $CI->testimonials_model->save( $save, $where);   
    }
    
    /*
     * Get testimonial details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_testimonial_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('testimonials_model');
        
        return $CI->testimonials_model->fetchById( $id); 
    }
    
    /*
     * Unset testimonial details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_testimonial($where)
    {
        $CI = & get_instance();
        $CI->load->model('testimonials_model');
        
        return $CI->testimonials_model->delete($where);        
    }
    
    /*
     * Get reviews from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function get_reviews($where, $join = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('review_model');
        return $CI->review_model->get($where);
    }
    
    /*
     * Save review details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_review($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('review_model');
        
        return $CI->review_model->save( $save, $where);   
    }
    
    /*
     * Has review enabled
     * $params $subscriber
     * 
     * For more doc .. See base_model
     */
    public function has_review_enabled($id)
    {
        $subs = $this->get_subscriber_by_pk($id);

        if($subs && $subs->enable_review == 1)
        {
            return true;
        }else{
            
            return false;
        }
        
    }
    
    /*
     * Get review details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_review_by_pk($id, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('review_model');
        
        return $CI->review_model->fetchById( $id, $join); 
    }
    
    /*
     * Unset review details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_review($where)
    {
        $CI = & get_instance();
        $CI->load->model('review_model');
        
        return $CI->review_model->delete($where);        
    }
    
    /*
     * Get subscriber's category name
     * 
     * @params $subscriber_id
     */
    public function get_subsciber_category($subscriber)
    {
        $subs = $this->get_subscriber_by_pk($subscriber);
        
        if($subs){
            
            return $subs->name;
        }else{
            return '';
        }
        
    }
    
    /*
     * Search subscribers froim parameters
     * 
     * @params $get
     * For more doc --- See base_model
     */
    public function find_subscribers($params)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        $CI->load->library('category_service');
        
        if(isset($params['c']))
        {
            $where = array(
              TBL_CATEGORY.'.seoname' => $params['c']
            );

            $record = $CI->category_service->get_category_by_params($where);
            $children = $CI->category_service->get_children($record->id_category);
        }
        
        $child_arr = array();
        
        if(isset($children) && $children)
        {
            foreach ($children as $child)
            {
                array_push($child_arr, $child->id_category);
            }
        }

        return $CI->subscriber_model->find( $params, $child_arr);
    }
    
    /*
     * Search visiting drs list
     * @params $params GET ARRAY
     * Global
     * 
     */
    public function find_visit_subscribers($params)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        $CI->load->library('category_service');
        
        $where = array(
          TBL_CATEGORY.'.seoname' => 'doctors'
        );

        $record = $CI->category_service->get_category_by_params($where);
        $children = $CI->category_service->get_children($record->id_category);
        
        $child_arr = array();
        
        if(isset($children) && $children)
        {
            foreach ($children as $child)
            {
                array_push($child_arr, $child->id_category);
            }
        }

        return $CI->subscriber_model->find_visiting_subscribers( $params, $child_arr);
    }
    
    /*
     * Output stars based on rating
     * 
     */
    public static function get_stars_rating($number, $class = 'text-yellow')
    {    
        $rate = '';
        if($number == 0)
        {
            for($i = 1; $i <= 5; $i++)
            {
                $rate .= '<i class="fa fa-star-o text-muted"></i>';
            }
            
        }else{
            // Make it integer:
            $stars = round( $number * 2, 0, PHP_ROUND_HALF_UP);
            
            // Add full stars:
            $i = 1;
            while ($i <= $stars - 1) {
                $rate .= '<i class="fa fa-star '.$class.' "></i>';
                $i += 2;
            }
            // Add half star if needed:
            if ( $stars & 1 ) $rate .= '<i class="fa fa-star-half-full '.$class.' "></i>';
        }
        return $rate;
    }
    
    /*
     * Gte visit counter
     * @params $subscriber
     */
    public function get_visit_count($subscriber)
    {
        $subs = $this->get_subscriber_by_pk($subscriber);
        
        if($subs){
            
            return $subs->profile_visits;
        }else{
            return 0;
        }
    }
    
    /*
     * Set visit counter
     * @params $subscriber
     */
    public function set_visit_count($subscriber, $count)
    {
        $save = array(
            TBL_SUBSCRIBERS.'.profile_visits' => $count
        );
        
        $where = array(
            TBL_SUBSCRIBERS.'.user_id' => $subscriber
        ); 
        
        return $this->save($save, $where);
    }
    
    
    /*
     * Get current review from dfatabae
     * @params $subscriber
     */
    public function get_current_review($subscriber)
    {
        $subs = $this->get_subscriber_by_pk($subscriber);
        
        if($subs){
            
            return $subs->subs_review;
        }else{
            return 0;
        }
    }
    
    /*
     * Save newsletter subscription as new email
     */
    public function save_newsletter_subscription($email)
    {
        $CI = & get_instance();
        $CI->load->model('newsletter_subscription_model');
        $msg = array();
        
        $save = array(
            
          TBL_NEWSLETTER_SUBSCRIPTIONS.'.reg_email' => $email,  
          TBL_NEWSLETTER_SUBSCRIPTIONS.'.created_at' => date('Y-m-d h:i:s'),
          TBL_NEWSLETTER_SUBSCRIPTIONS.'.updated_at' => date('Y-m-d h:i:s')
        );
            
        if($CI->newsletter_subscription_model->save($save))
        {
            $msg['message'] = 'Email added to subscription';
            $msg['error'] = false;
        }else{
            
            $msg['message'] = 'Something went wrong';
            $msg['error'] = true;
        }
        
        return $msg;
    }
    
    /*
     * Check Subsriber login area
     * 
     */
    public function _auth($post)
    {
        $CI = & get_instance();
        $CI->load->model('auth_model');
        $CI->load->library('encrypt');
        $CI->load->library('session');
        
        $uname = $CI->security->xss_clean($post['username']);
        $password = $CI->security->xss_clean($post['password']);
        
        $where = array( TBL_SUBSCRIBERS.'.subs_username' => $uname);
        $subs = $this->get_subscriber_row($where);
        
        if(count($subs) > 0 && $subs)
        {
            
            if($CI->auth_model->generate_password_hash($password, $subs->subs_uniq_token) == $subs->subs_pwd_hash)
            {
                if($subs->status == 1)
                {
                    $data['subs_logged'] = array(

                        'user_id' => $CI->encrypt->encode($subs->user_id),
                        'name' => $subs->subs_title,
                        'username' => $subs->subs_username,
                        'subs_type' => $subs->subs_type,
                        'subs_image' => $subs->subs_profile_img,
                        'subscriber' => $subs->user_id,
                        'type' => 'subscriber',
                        'validated' => true
                    ); 
                    
                    $CI->session->set_userdata($data); 
                    
                    return 'logged';//User logged
                    
                }else{
                    
                    return 'blocked'; //Status blocked
                }
            }else{
                return 'password'; // issue with the password typed;
            }
        }else{
            
            return 'user'; //No user has been found;
        }
        
    }
    
    public static function save_query($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('enquiry_model');
        
        return $CI->enquiry_model->save( $save, $where);
    }
    
    public static function get_query( $condition = array(), $orderBy = array(), $limit = 5, $offset = null, $join = array()){
        
        $CI = & get_instance();
        $CI->load->model('enquiry_model');
        
        $order_by = array(
          TBL_ENQUIRIES.'.id' => 'DESC'  
        );
        
        return $CI->enquiry_model->get( $condition, $order_by, $limit, $offset, $join);
 
    }
    
    public function get_last_days_graph_json( $days, $minTick){
        
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        
        $d = array();
        for($i = 0; $i < (int) $days; $i++){

            $date = strtotime('-'. $i .' days');
            $total = $CI->subscriber_model->get_total_subscribers_by_date($date);
            $date = date("Y-m-d", $date);
            array_push($d, array( strtotime($date." UTC") * 1000, $total));
        }

        return array_reverse($d);
    }
    
    /*
     * Get all visit doctors enabled by admin in site home news partial
     * @params 
     * see base_model for more doc
     */
    public static function get_all_visit_drs()
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model'); 
        
        $where = array(
            TBL_SUBSCRIBERS.'.is_visiting' => 1
        );
        
        $order_by = array(
          TBL_SUBSCRIBERS.'.user_id' => 'DESC'  
        );
        
        $fields = array( TBL_SUBSCRIBERS.'.subs_title', TBL_SUBSCRIBERS.'.subs_medical_center', TBL_SUBSCRIBERS.'.visit_timing_from', TBL_SUBSCRIBERS.'.visit_timing_to', TBL_CATEGORY.'.name as cat_name', TBL_CATEGORY.'.name_ar as cat_name_ar');
        $join = array(
            
            array('table' => TBL_CATEGORY, 'condition' => TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'join_type' => 'inner')
        );
        
        return $CI->subscriber_model->get_subscribers( $where, $order_by, null, null, $join, $fields);
    }
    
    /*
     * Get all latest doctors added from database
     * @params 
     * see base_model for more documentation
     */
    public static function get_all_latest_drs()
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model'); 
        
        return $CI->subscriber_model->get_latest_subscribers();
    }
    
    /*
     * Get all related doctors from database upon category and id passed
     * @params 
     * see base_model for more documentation
     */
    public static function get_all_related_drs( $cat_id, $user_id)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model'); 
        
        return $CI->subscriber_model->get_related_drs( $cat_id, $user_id);
    }
    
    
    /*
     * Search subscribers from parameters
     * 
     * @params $get
     * For more doc --- See base_model
     */
    public function search($params)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        
        return $CI->subscriber_model->search( $params);
    }
    
    /*
     * Count all record set retrierved for this particular search
     * @params $GET query string
     * return count in Integer type
     */
    public function count_search($params)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        
        return $CI->subscriber_model->count_search( $params);
    }
    
    /*
     * Get doctors from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public function get_mdl_ctr_doctors($name)
    {

        $CI = & get_instance();
        $CI->load->model('subscriber_model');
 
        return $CI->subscriber_model->get_mdl_ctr_doctors($name);
    }
    
    public function get_original_price($service_fk)
    {
        $service = $this->get_service_by_pk($service_fk);
        return ($service) ? $service->price : 0;
    }

    /*
     * Get Social Media Settings for a particular subscriber
     * @params $user_id
     * return array if has any values or false if not
     */
    public function get_social_media_settings_by_user($user_id)
    {
        $CI = & get_instance();
        $CI->load->model('smedia_model');
        
        $where = array(
            TBL_SUBSCRIBERS_SMEDIA.'.subscriber' => $user_id
        );
        
        $order_by = array(
            TBL_SUBSCRIBERS_SMEDIA.'.id' => 'DESC'  
        );
        
        $result = $CI->smedia_model->get($where, $order_by, 1);
        
        if($result)
            return $result[0];
        else
            return false;
        
    }

    /*
     * Save the social media settingfs of a subscriber onto table
     * @params $save array
     * @params $where array and is null
     * return true if properly written / false if not
     */
    public function save_smedia_settings($save, $where)
    {
            
        $CI = & get_instance();
        $CI->load->model('smedia_model');
            
        return $CI->smedia_model->save( $save, $where);

    }
    
    /*
     * Check if has already social media settings
     * @params $user_id
     * return array if has any social media settigns else false
     */
    public function has_social_media_settings($user_id)
    {
        $sm_settings = $this->get_social_media_settings_by_user($user_id);
        if($sm_settings)
        {
            return true;
        }else{
            return false;
        }
    }
    
    /*
     * Change account type
     * @params $user_id
     * @params $status
     */
    public function change_account_type($user_id, $status)
    {
        $CI = & get_instance();
        $CI->load->library('encrypt');
        
        $where = array(
            TBL_SUBSCRIBERS.'.user_id' => $CI->encrypt->decode($user_id)
        );
            
        $save = array(
          TBL_SUBSCRIBERS.'.account_type' => $status  
        );
        
        return $this->save($save, $where);
    }
    
    /*
     * Update linked account forwarding
     * @params $user
     * @params $val
     */
    public function update_account_link( $user, $val)
    {
        $CI = & get_instance();
        $CI->load->library('encrypt');
        
        $where = array(
            TBL_SUBSCRIBERS.'.user_id' => $CI->encrypt->decode($user)
        );
            
        $save = array(
          TBL_SUBSCRIBERS.'.link_profile_to' => $val  
        );
        
        return $this->save($save, $where);
    }
   
    static public function get_logo($subs_title)
    {
        $where = array(
          TBL_SUBSCRIBERS.'.subs_title' => $subs_title
        );
        
        $subs = self::get_subscribers($where, array(), 1);
        if($subs && $subs[0]->subs_profile_img != NULL)
        {
            return base_url().'uploads/subscribers/profile/'.$subs[0]->subs_profile_img;
        }else{
            
            return ACTIVE_THEME.'assets/img/442/default/'.$subs[0]->subs_type.".svg";
        }
    }
    
    public static function get_user_by_details($name)
    {
        $where = array(
          TBL_SUBSCRIBERS.'.subs_title' => $name
        );
        return self::get_subscribers($where, array(), 1);
    }
    
    public function get_profile_url($user)
    {
        $contact = $this->get_subscriber_page($user->user_id, TBL_CONTACT_US_PAGE);
        $profile_url = '';
        
        switch ($user->link_profile_to){
            case 'self':
                $profile_url = base_url().''.$user->subs_public_profile;
            break;
            case 'fb':
                $profile_url = $contact->social_fb_link;
            break;
            case 'twitter':
                $profile_url = $contact->social_tweet_link;
            break;
            case 'instagram':
                $profile_url = $contact->social_inst_link;
            break;
            case 'ytube':
                $profile_url = $contact->social_ytube_link;
            break;
            case 'gplus':
                $profile_url = $contact->social_google_plus;
            break;
            case 'lkndin':
                $profile_url = $contact->social_linked_in;
            break;
            default:
                $profile_url = base_url().''.$user->subs_public_profile; 
        }
        return $profile_url;
    }
    
    public function get_services_all($where)
    {
        $CI = & get_instance();
        $CI->load->model('our_services_model');
        
        return $CI->our_services_model->get_services_all($where);
    }

    public function get_service_by_title($title)
    {
        $CI = & get_instance();
        $CI->load->model('our_services_model');
        
        return $CI->our_services_model->get_service_by_title($title);
    }

    /*
     * Get articles from table
     * @params $subscriber_id
     * 
     * For more doc ... See base_model
     */
    public static function get_articles( $where, $join = array())
    {
        
        $CI = & get_instance();
        $CI->load->model('articles_model');
        
        return $CI->articles_model->get($where, array(), null, null, $join);
    }
    
    
    /*
     * Save note details to table
     * @params $save
     * @params $where
     * 
     * 
     * For more doc .. See base_model
     */
    public static function save_article($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('articles_model');
        
        return $CI->articles_model->save( $save, $where);   
    }
    
    /*
     * Get note details from primary key passed
     * @params $id
     * 
     * For more doc .. See base_model
     */     
    public static function get_article_by_pk($id)
    {
        $CI = & get_instance();
        $CI->load->model('articles_model');
        
        return $CI->articles_model->fetchById( $id); 
    }

    /*
     * Get articles details from title passed
     * @params $title String
     * 
     * For more doc .. See base_model
     */     
    public static function get_article_by_title($title)
    {
        $CI = & get_instance();
        $CI->load->model('articles_model');
        
        return $CI->articles_model->get_article_by_title($title); 
    }
    
    /*
     * Unset note details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_article($where)
    {
        $CI = & get_instance();
        $CI->load->model('articles_model');
        
        return $CI->articles_model->delete($where);        
    }


    /*
    Get marker svgs based on the subscriber found
    */
    public function getGmapIcon($subs, $fileType)
    {
 
        switch($subs->subs_type)
        {
            
            case "4": 
                
                $icon = 'beauty-center-gmap-icon.'.$fileType; 
                
                if($subs->wall_id != NULL){
                    $icon = 'beauty-center-gmap-icon-offer.'.$fileType;
                }
                
            break;
            
            case "3": 
 
                $icon = 'mdl-normal-icon.'.$fileType;
                
                if($subs->wall_id == NULL && $subs->has_emergency == 1)
                {
                    $icon = 'mdl-icon-24.'.$fileType;
                } 
                
                if($subs->wall_id != NULL && $subs->has_emergency == 1){
                    $icon = 'mdl-normal-icon-both.'.$fileType;
                }
                
                if($subs->wall_id != NULL && $subs->has_emergency == 0){
                    $icon = 'mdl-normal-icon-offer.'.$fileType;
                }
                
            break;
            
            case "6":  
                
                $icon = 'hospital-normal-icon.'.$fileType;
                
                if($subs->wall_id == NULL && $subs->has_emergency == 1)
                {
                    $icon = 'hospital-24-icon.'.$fileType;
                } 
                
                if($subs->wall_id != NULL && $subs->has_emergency == 1){
                    $icon = 'hospitall-normal-icon-both.'.$fileType;
                }
                
                if($subs->wall_id != NULL && $subs->has_emergency == 0){
                    $icon = 'hospitall-normal-icon-offer.'.$fileType;
                }
                
            break;
            
            case "4":  
                
                $icon = 'beauty-center-gmap-icon.'.$fileType;
            
                if($subs->wall_id != NULL){
                    $icon = 'beauty-center-gmap-icon-offer.'.$fileType;
                }
                
            break;
            
            case "5": 
            
                $icon = 'lab-normal-icon.'.$fileType;
            
            break;
        
            case "2": 
                
                $icon = 'icon-pharm-normal.'.$fileType;
                
                if($subs->has_emergency == 1)
                {
                    $icon = 'icon-pharm-24.'.$fileType;
                } 
                
            break;
        
            default : $icon = 'icn-gmap-medical-ctr.'.$fileType;
                
        }
        
        return base_url().'themes/default/assets/img/223/gmap/'.$icon;
    }

    /*
    Get subscriber type from subscriber primary key
    */
    public function getSubscriberType($pk)
    {
        $CI = & get_instance();

        $CI->db->select(TBL_SUBSCRIBERS.'.subs_type')
               ->from(TBL_SUBSCRIBERS)
               ->where(TBL_SUBSCRIBERS.'.user_id = '.$pk);
        return $CI->db->get()->result();   
    }


    /*Departments details starts here */

    //Get all departments based on an array
    public function getAllDepts($fields = array(), $condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('department_model');

        return $CI->department_model->get($fields, $condition, $orderBy, $limit, $offset, $join);
    }
 
    //Get Department details
    public function getDeptById($id)
    {
        $CI = & get_instance();
        $CI->load->model('department_model');

        return $CI->department_model->fetchById($id);
    }

    //Save department details to database
    public function saveDeptDetails($save,$where)
    {
        $CI = & get_instance();
        $CI->load->model('department_model');

        return $CI->department_model->save($save,$where);
    }

    //Delete department details
    public function deleteDeptDetails($where)
    {
        $CI = & get_instance();
        $CI->load->model('department_model');

        return $CI->department_model->delete($where);
    }

    //TODO Get department details by dept. title
    public function getDeptDetailsByTitle($title)
    {
        $CI = & get_instance();
        $CI->load->model('department_model');

        return $CI->department_model->getDeptDetailsByTitle($title);
    }

    //Search subscribers from index
    public function GetSubscribersBySearch($post)
    {
        $CI = & get_instance();
        $CI->load->model('subscriber_model');
        return $CI->subscriber_model->get_subscribers_by_search($post);
    }

}