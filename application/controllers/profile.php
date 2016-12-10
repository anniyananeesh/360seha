<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends PublicController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'subscriber_model', 'modelNameAlias');
        $this->load->model(SITE_MODELS.'category_model', 'modelCategoryAlias');
        $this->load->model(SITE_MODELS.'social_media_model', 'modelSMediaAlias');
        $this->load->model(SITE_MODELS.'subscriber_timing_model', 'modelTimingAlias');
        $this->load->model(SITE_MODELS.'insurance_user_model', 'modelInsuranceAlias');
        $this->load->model(SITE_MODELS.'photo_gallery_model', 'modelPhotosAlias');
        $this->load->model(SITE_MODELS.'video_gallery_model', 'modelVideosAlias');
        $this->load->model(SITE_MODELS.'doctors_model', 'modelDrAlias');
        $this->load->model(SITE_MODELS.'department_user_model', 'modelDeptAlias');
    }

    public function index($profileName)
    {
        $this->data['page'] = 'profile';

     		$fields = array(
     			TBL_SUBSCRIBERS.'.user_id',
                TBL_SUBSCRIBERS.'.subs_primary_contact',
                TBL_SUBSCRIBERS.'.description_en_long as description_long_en',
                TBL_SUBSCRIBERS.'.description_en_long_ar as description_long_ar',
                TBL_SUBSCRIBERS.'.profile_visits',
                TBL_SUBSCRIBERS.'.likes',
                TBL_SUBSCRIBERS.'.is_featured',
                TBL_SUBSCRIBERS.'.account_type',
                TBL_SUBSCRIBERS.'.subs_email',
                TBL_SUBSCRIBERS.'.subs_public_profile',
                TBL_SUBSCRIBERS.'.subs_title as title_en',
                TBL_SUBSCRIBERS.'.subs_access',
                TBL_SUBSCRIBERS.'.subs_title_ar as title_ar',
                TBL_SUBSCRIBERS.'.has_emergency',
                TBL_SUBSCRIBERS.'.subs_profile_img',
                TBL_CITY.'.name',
                TBL_SUBSCRIBERS.'.subs_country',
                TBL_SUBSCRIBERS.'.subs_state',
                TBL_SUBSCRIBERS.'.subs_cat_id',
                TBL_CATEGORY.'.name as cat_name_en',
                TBL_CATEGORY.'.name_ar as cat_name_ar',
                TBL_SUBSCRIBERS.'.subs_address_1 as address1_en',
                TBL_SUBSCRIBERS.'.subs_address_1_ar as address1_ar',
                TBL_SUBSCRIBERS.'.subs_address_2 as address2_en',
                TBL_SUBSCRIBERS.'.subs_address_2_ar as address2_ar',
                TBL_SUBSCRIBERS.'.subs_lat_id as latitude',
                TBL_SUBSCRIBERS.'.subs_long_id as longitude',
                TBL_IMG_GALLERY.'.img_thumb as image'
     		);

     		$join = array(
        		array('table' => TBL_CATEGORY, 'condition' => TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'join_type' => 'LEFT'),
                array('table' => TBL_CITY, 'condition' => TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'join_type' => 'LEFT'),
                array('table' => TBL_IMG_GALLERY, 'condition' => TBL_IMG_GALLERY.'.subscriber = '.TBL_SUBSCRIBERS.'.user_id', 'join_type' => 'LEFT')
        	);

     		$this->data['profileData'] = $this->modelNameAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.published'=>1, TBL_SUBSCRIBERS.'.subs_public_profile'=>urldecode($profileName)), array(TBL_IMG_GALLERY.'.orderby'=>'ASC'), $join);
     		$this->data['socialMedia'] = $this->modelSMediaAlias->fetchRowFields(array('social_fb_link','social_tweet_link','social_inst_link','social_ytube_link','	social_google_plus','social_linked_in'), array('subscriber'=>$this->data['profileData']->user_id));

     		//Check if the subscriber is open now
     		$this->data['isOpen'] = $this->modelTimingAlias->isOpenNow($this->data['profileData']->user_id);
     		$this->data['openCloseTimings'] = $this->modelTimingAlias->getTodayOpenCloseTimings($this->data['profileData']->user_id);

     		//Get all doctors for this subscriber
     		$fieldsDoctors = array(
     			TBL_DOCTORS.'.id',
          TBL_DOCTORS.'.name_en',
          TBL_DOCTORS.'.name_ar',
          TBL_DOCTORS.'.specialization_en',
          TBL_DOCTORS.'.specialization_ar',
          TBL_DOCTORS.'.image1',
          TBL_DOCTORS.'.url'
     		);

        //Get all doctors
        $this->data['dr_image_show_path'] = DOCTORS_SHOW_PATH;
     		$this->data['doctors'] =  $this->modelDrAlias->fetchFields($fieldsDoctors, array(TBL_DOCTORS.'.is_active' => 1, TBL_DOCTORS.'.subscriber' => $this->data['profileData']->user_id));

     		//Get all photos
     		$this->data['photos'] =  (array) $this->modelPhotosAlias->fetchFields(array('img_url as data'), array('subscriber'=> $this->data['profileData']->user_id,'img_show_status'=>1),array('orderby'=>'ASC'));
        $this->data['menuAccess'] = (!empty($this->data['profileData']->subs_access)) ? unserialize($this->data['profileData']->subs_access) : array();

        //Get all departments for this user
        $this->data['departments'] = $this->modelDeptAlias->getUserDepts($this->data['profileData']->user_id);

        $this->load->view($this->layout, $this->data);

    }

}
