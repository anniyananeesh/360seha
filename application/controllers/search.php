<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends PublicController
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(SITE_MODELS.'subscriber_model', 'modelNameAlias');
        $this->load->model(SITE_MODELS.'category_model', 'modelCategoryAlias');
        $this->load->model(SITE_MODELS.'city_model', 'modelCityAlias');
    	  $this->load->model(SITE_MODELS.'insurance_model', 'modelInsuranceAlias');
        $this->load->model(SITE_MODELS.'department_model', 'modelDeptAlias');

        $this->load->library('pagination');
    }

    public function index()
    {
        $this->data = $this->pagination_code();
        $this->data['page'] = 'search';

        $where_country = array('country_fk' => $this->siteCountry);

        $this->data['departments'] = $this->modelDeptAlias->fetchFields(array('dept_title as title_en', 'dept_title_ar as title_ar', 'dept_id as id'), array('show_status' => 1));

        $this->load->model(SITE_MODELS.'specialization_model', 'modelSpecializationAlias');

 		    $this->data['city'] = $this->modelCityAlias->fetchFields(array('name as name_en','name_ar','id'), $where_country, array('orderby'=>'ASC'));
 		    $this->data['insuranceList'] = $this->modelInsuranceAlias->fetchFields(array('ins_title as ins_title_en','ins_title_ar','ins_id'), array('show_status'=>1), array('ins_id'=>'ASC'));

 		    //Load side ad banner from database randomly
    	  $this->load->model(SITE_MODELS.'ads_model', 'modelAdsAlias');
    	  $this->data['sideAdBanner'] = $this->modelAdsAlias->fetchRowFields( array('image','url'), array('show_status'=>1,'ad_area'=>2),array('id' => 'RANDOM'));

        $this->load->model(SITE_MODELS.'photo_gallery_model','modelPhotoAlias');
        $this->load->view($this->layout, $this->data);
    }

    public function pagination_code()
    {
        $page_number = (isset($_GET['page'])) ? $_GET['page'] : 1;

        $page_url = $config['base_url'] = HOST_URL.'/search/?'.http_build_query($_GET);
        $config['uri_segment'] = 3;
        $config['per_page'] = 8;
        $config['num_links'] = 5;
        if(empty($page_number)) $page_number = 1;
        $offset = ($page_number-1) * $config['per_page'];

        $config['use_page_numbers'] = TRUE;

        $this->data['subscribers'] = $this->modelNameAlias->findSubscribers( $_GET, $config['per_page'], $offset);
        $config['total_rows'] = $this->data['count_ads'] = $this->modelNameAlias->countSubscribers( $_GET);

        $page_url = HOST_URL.'/search/?'.http_build_query($_GET).'&page='.$page_number;

        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="'.$page_url.'">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['first_link'] = '<i class="ion-ios-arrow-left"></i>';
        $config['last_link'] = '<i class="ion-ios-arrow-right"></i>';
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $this->pagination->cur_page = $offset;

        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
   		  return $this->data;
    }

}
