<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriber_model extends Base_model
{
    public $table;
    public $primary_key;

    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_SUBSCRIBERS;
        $this->primary_key = 'user_id';
    }

    public function fetchById($id, $join = array())
    {
        return parent::fetchById($id, $join);
    }

    public function fetchFields($fields = array(), $where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        return parent::fetchFields($fields, $where, $orderBy, $limit, $offset, $join);
    }

    public function fetchAll($where = array(), $orderBy = array(), $limit = null, $offset = null, $join = array())
    {
        $result = parent::fetchAll($where, $orderBy, $limit, $offset, $join);
        return (!empty($result)) ? $result : false;
    }

    public function fetchRowFields($fields = array(), $where = array(), $orderBy = array(), $join = array())
    {
        return parent::fetchRowFields($fields, $where, $orderBy, $join);
    }

    public function save($save, $where = array())
    {
        return parent::save($save, $where);
    }

    public function delete($where = array())
    {
        return parent::delete($where);
    }

    public function isExist($param)
    {
        return parent::isExist($param);
    }

    public function findSubscribers($params, $limit, $offset)
    {

        $select = array(
            TBL_SUBSCRIBERS.'.user_id',
            TBL_SUBSCRIBERS.'.subs_primary_contact',
            TBL_SUBSCRIBERS.'.profile_visits',
            TBL_SUBSCRIBERS.'.likes',
            TBL_SUBSCRIBERS.'.is_featured',
            TBL_SUBSCRIBERS.'.subs_public_profile',
            TBL_SUBSCRIBERS.'.subs_title as title_en',
            TBL_SUBSCRIBERS.'.subs_title_ar as title_ar',
            TBL_SUBSCRIBERS.'.has_emergency',
            TBL_SUBSCRIBERS.'.subs_address_1 as address_line1_en',
            TBL_SUBSCRIBERS.'.subs_address_1_ar as address_line1_ar',
            TBL_SUBSCRIBERS.'.subs_address_2 as address_line2_en',
            TBL_SUBSCRIBERS.'.subs_address_2_ar as address_line2_ar',
            TBL_SUBSCRIBERS.'.account_type',
            TBL_SUBSCRIBERS.'.subs_profile_img',
            TBL_IMG_GALLERY.'.img_thumb as image',
            TBL_CITY.'.name',
            TBL_SUBSCRIBERS.'.subs_cat_id'
        );

        if((isset($params['_lat']) && $params['_lat'] != '') && (isset($params['_lng']) && $params['_lng'] != ''))
        {
            array_push( $select, '( 6371 * acos( cos( radians('.$params['_lat'].') ) * cos( radians( subs_lat_id ) ) *
                cos( radians( subs_long_id ) - radians('.$params['_lng'].') ) + sin( radians('.$params['_lat'].') ) *
                sin( radians( subs_lat_id ) ) ) ) AS distance');
        }

        $this->db->select( $select, FALSE);

        if((isset($params['_dt']) && $params['_dt'] != '') && ((isset($params['_lat']) && $params['_lat'] != '') && (isset($params['_lng']) && $params['_lng'] != '')))
        {
            $this->db->having('distance < '.$params['_dt']);
        }

        $this->db->from(TBL_SUBSCRIBERS);

        //Get country from session
        $countryID = $this->session->userdata('siteCountry');

        if($countryID && $countryID != NULL)
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_country = '".$countryID."' ");
        }

        if(isset($params['city']) && $params['city'] != '')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_state = '".$params['city']."' ");
        }

        if(isset($params['category']) && $params['category'] != '')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_cat_id = '".$params['category']."' ");
        }

        if(isset($params['he']) && $params['he'] == 'Y')
        {
            $this->db->where(TBL_SUBSCRIBERS.".has_emergency = 1");
        }

        if(isset($params['q']) && $params['q'] != '')
        {
            $q = $params['q'];
            $this->db->where("((".TBL_SUBSCRIBERS.".subs_title LIKE '%$q%' OR ".TBL_SUBSCRIBERS.".subs_title_ar LIKE '%$q%') OR (".TBL_SUBSCRIBERS.".description_en_long LIKE '%$q%' OR ".TBL_SUBSCRIBERS.".description_en_long_ar LIKE '%$q%') OR (".TBL_CITY.".name LIKE '%$q%' OR ".TBL_CITY.".name_ar LIKE '%$q%') OR (".TBL_SUBSCRIBERS.".subs_address_1 LIKE '%$q%' OR ".TBL_SUBSCRIBERS.".subs_address_1_ar LIKE '%$q%' OR (" . TBL_DEPTS . ".dept_title LIKE '%$q%' OR " . TBL_DEPTS . ".dept_title_ar LIKE '%$q%')))");
        }

        if(isset($params['specialization']) && $params['specialization'] != '')
        {
            $this->db->where(TBL_USER_DEPTS.".dept_id = '".$params['specialization']."' ");
        }

        if(isset($params['insurance']) && $params['insurance'] != '')
        {
            $this->db->where(TBL_CLIENT_INSURANCE.".ins_id = '".$params['insurance']."' ");
        }

        if(isset($params['sort']) && $params['sort'] != '')
        {
            switch($params['sort'])
            {
                    case 'featured':
                        $this->db->order_by(TBL_SUBSCRIBERS.".is_featured", "desc");
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
        }

        if((isset($params['_dt']) && $params['_dt'] != '') && ((isset($params['_lat']) && $params['_lat'] != '') && (isset($params['_lng']) && $params['_lng'] != '')))
        {
            $this->db->order_by('distance','ASC');
        }

        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        $this->db->join( TBL_USER_DEPTS, TBL_USER_DEPTS.'.user_id = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');
        $this->db->join( TBL_CLIENT_INSURANCE, TBL_CLIENT_INSURANCE.'.subs_id = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');
        $this->db->join( TBL_IMG_GALLERY, TBL_IMG_GALLERY.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');
        $this->db->join( TBL_DEPTS, TBL_DEPTS.'.dept_id = '.TBL_USER_DEPTS.'.dept_id', 'LEFT');

        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';

        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        $this->db->where(TBL_SUBSCRIBERS.".published = 1");
        $this->db->group_by(TBL_SUBSCRIBERS.'.user_id');
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result();

    }

    public function countSubscribers($params)
    {
        $select = array(
            TBL_SUBSCRIBERS.'.user_id'
        );

        if((isset($params['_lat']) && $params['_lat'] != '') && (isset($params['_lng']) && $params['_lng'] != ''))
        {
            array_push( $select, '( 6371 * acos( cos( radians('.$params['_lat'].') ) * cos( radians( subs_lat_id ) ) *
                cos( radians( subs_long_id ) - radians('.$params['_lng'].') ) + sin( radians('.$params['_lat'].') ) *
                sin( radians( subs_lat_id ) ) ) ) AS distance');
        }

        $this->db->select( $select, FALSE);

        if((isset($params['_dt']) && $params['_dt'] != '') && ((isset($params['_lat']) && $params['_lat'] != '') && (isset($params['_lng']) && $params['_lng'] != '')))
        {
            $this->db->having('distance < '.$params['_dt']);
        }

        $this->db->from(TBL_SUBSCRIBERS);

        if(isset($params['country']) && $params['country'] != '')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_country = '".$params['country']."' ");
        }

        if(isset($params['city']) && $params['city'] != '')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_state = '".$params['city']."' ");
        }

        if(isset($params['category']) && $params['category'] != '')
        {
            $this->db->where(TBL_SUBSCRIBERS.".subs_cat_id = '".$params['category']."' ");
        }

        if(isset($params['he']) && $params['he'] == 'Y')
        {
            $this->db->where(TBL_SUBSCRIBERS.".has_emergency = 1");
        }

        if(isset($params['q']) && $params['q'] != '')
        {
            $q = $params['q'];
            $this->db->where("((".TBL_SUBSCRIBERS.".subs_title LIKE '%$q%' OR ".TBL_SUBSCRIBERS.".subs_title_ar LIKE '%$q%') OR (".TBL_SUBSCRIBERS.".description_en_long LIKE '%$q%' OR ".TBL_SUBSCRIBERS.".description_en_long_ar LIKE '%$q%') OR (".TBL_CITY.".name LIKE '%$q%' OR ".TBL_CITY.".name_ar LIKE '%$q%') OR (".TBL_SUBSCRIBERS.".subs_address_1 LIKE '%$q%' OR ".TBL_SUBSCRIBERS.".subs_address_1_ar LIKE '%$q%'))");
        }

        if(isset($params['specialization']) && $params['specialization'] != '')
        {
            $this->db->where(TBL_SUBS_SPECIALIZATION.".spl_id = '".$params['specialization']."' ");
        }

        if(isset($params['insurance']) && $params['insurance'] != '')
        {
            $this->db->where(TBL_CLIENT_INSURANCE.".ins_id = '".$params['insurance']."' ");
        }

        if(isset($params['sort']) && $params['sort'] != '')
        {
            switch($params['sort'])
            {
                    case 'featured':
                        $this->db->order_by(TBL_SUBSCRIBERS.".is_featured", "desc");
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
        }

        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_CATEGORY, TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'LEFT');
        $this->db->join( TBL_SUBS_SPECIALIZATION, TBL_SUBS_SPECIALIZATION.'.subs_id = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');
        $this->db->join( TBL_CLIENT_INSURANCE, TBL_CLIENT_INSURANCE.'.subs_id = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');

        if(RTL)
            $lang = 'Arabic';
        else
            $lang = 'English';

        $this->db->where("(".TBL_SUBSCRIBERS.".publish_on = 'All' || ".TBL_SUBSCRIBERS.".publish_on = '$lang')");
        $this->db->where(TBL_SUBSCRIBERS.".published = 1");
        $this->db->group_by(TBL_SUBSCRIBERS.'.user_id');

        $query = $this->db->get();
        return (int) $query->num_rows();

    }

    public function generateUniqToken($username)
    {
        $token = time() . rand(10, 5000) . sha1(rand(10, 5000)) . md5(__FILE__);
        $token = str_shuffle($token);
        $token = sha1($token) . md5(microtime()) . md5($username);
        return $token;
    }

    public function generatePwdHashKey($password, $token)
    {
        return md5(md5($token) . md5($password));
    }

    public function generateRandomPwdString($length = 12)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    public function getNearbyUsers( $lat = null, $long = null, $rad = null)
    {

        $this->db->select(array(TBL_SUBSCRIBERS.'.profile_visits as views', TBL_SUBSCRIBERS.'.account_type as type', TBL_SUBSCRIBERS.'.user_id', TBL_SUBSCRIBERS.'.subs_long_id as longitude', TBL_SUBSCRIBERS.'.subs_lat_id as latitude', TBL_SUBSCRIBERS.'.subs_title as title_en', TBL_SUBSCRIBERS.'.subs_title_ar as title_ar', TBL_SUBSCRIBERS.'.subs_address_1 as address_en', TBL_SUBSCRIBERS.'.subs_address_1_ar as address_ar', TBL_SUBSCRIBERS.'.is_featured', TBL_CITY.'.name as city_en', TBL_CITY.'.name_ar as city_ar', '( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( subs_lat_id ) ) *
                    cos( radians( subs_long_id ) - radians('.$long.') ) + sin( radians('.$lat.') ) *
                    sin( radians( subs_lat_id ) ) ) ) AS distance', TBL_SUBSCRIBERS.'.subs_public_profile as url', TBL_SUBSCRIBERS.'.subs_cat_id as category', TBL_SUBSCRIBERS.'.has_emergency as emergency', TBL_SUBSCRIBERS.'.subs_profile_img as logo', TBL_IMG_GALLERY.'.img_thumb as image', TBL_SUBSCRIBERS.'.profile_visits as views'));

        $this->db->having('distance < ' . $rad);

        $this->db->from(TBL_SUBSCRIBERS);

        $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
        $this->db->join( TBL_IMG_GALLERY, TBL_IMG_GALLERY.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');

        $this->db->where(TBL_SUBSCRIBERS.".published = 1");
        $this->db->order_by(TBL_SUBSCRIBERS.".is_featured", "DESC");

        $query = $this->db->get();
        return ($query->num_rows()) ? $query->result() : FALSE;

    }

    public function getUserDetails($userId)
    {
      $this->db->select(array(TBL_SUBSCRIBERS.'.profile_visits as views', TBL_SUBSCRIBERS.'.account_type as type', TBL_SUBSCRIBERS.'.user_id', TBL_SUBSCRIBERS.'.subs_long_id as longitude', TBL_SUBSCRIBERS.'.subs_lat_id as latitude', TBL_SUBSCRIBERS.'.subs_title as title_en', TBL_SUBSCRIBERS.'.subs_title_ar as title_ar', TBL_SUBSCRIBERS.'.subs_address_1 as address_en', TBL_SUBSCRIBERS.'.subs_address_1_ar as address_ar', TBL_SUBSCRIBERS.'.is_featured', TBL_CITY.'.name as city_en', TBL_CITY.'.name_ar as city_ar', TBL_SUBSCRIBERS.'.subs_public_profile as url', TBL_SUBSCRIBERS.'.subs_cat_id as category', TBL_SUBSCRIBERS.'.has_emergency as emergency', TBL_SUBSCRIBERS.'.subs_profile_img as logo', TBL_IMG_GALLERY.'.img_thumb as image', TBL_SUBSCRIBERS.'.profile_visits as views'));
      $this->db->from(TBL_SUBSCRIBERS);

      $this->db->join( TBL_CITY, TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'LEFT');
      $this->db->join( TBL_IMG_GALLERY, TBL_IMG_GALLERY.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'LEFT');

      $this->db->where(TBL_SUBSCRIBERS.".user_id = " . $userId);

      $query = $this->db->get();

      if($query->num_rows() > 0)
      {
          $result = $query->result();
          return $result[0];
      }else {
        return FALSE;
      }

    }

}
