<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends PublicController {

    protected $launchLayout;

    public function __construct()
    {
        parent::__construct();
        $this->launchLayout = LAUNCH_LAYOUT;
    }

    public function index()
    {

        //If the system is in maintanence mode show launch page only
        if($this->publicConfig["maintenance"]["value"] == 1)
        {
            $this->data['banner_top'] = $this->getTopAdvert();
            $this->data['content'] = 'launch/home';
            $this->load->view($this->launchLayout, $this->data);
        }else{

            $this->data['page'] = 'home';

            if($this->siteCountry)
            {
                $this->load->model(SITE_MODELS."city_model", 'modelCityAlias');
                $this->data['city'] = $this->modelCityAlias->fetchFields(array('id','name as name_en','name_ar'), array('country_fk' => (int) $this->siteCountry), array('orderby'=>'ASC'));

            }

            //Load banner for top : Leaderboard banners 728 90
            $this->data['banner_top'] = $this->getTopAdvert();
            $this->data['banner_side'] = $this->getSideAdvert();

            $this->data['siteCountry'] = $this->siteCountry;

            $site_lang = ($this->data['lan'] == 'en') ? 'English' : 'Arabic';

            //Load category from | DB
            $this->load->model(SITE_MODELS."category_model", 'categoryModelAlias');
            $this->data['category'] = $this->categoryModelAlias->fetchFields(array('name as name_en','name_ar','id_category'), array('show_status'=>1,'id_category_parent'=> NULL), array('id_category'=>'ASC'));

            $this->load->model(SITE_MODELS."articles_model", 'modelArticlesAlias');
            $this->data['articles'] = $this->modelArticlesAlias->getAllArticles(array('title as title_en','title_ar','articles_id','image_url as image', 'description as description_en', 'description_ar'), array(), $site_lang);

            $this->load->model(SITE_MODELS.'news_model','modelNewsAlias');
            $this->data['dataNews'] = $this->modelNewsAlias->getAllNews(array('news_id','news_title as news_title_en','news_title_ar'), $site_lang, 5);

            //Load the geo service
            require_once(APPPATH.'libraries/Geo_service.php');
            $geoplugin = new Geo_service();
            $geoplugin->locate($_SERVER['REMOTE_ADDR']); // $_SERVER['REMOTE_ADDR'] => production , '83.110.79.15' => developement
            $this->data['lat'] = $geoplugin->latitude;
            $this->data['long'] = $geoplugin->longitude;
            //Load the geo service

            $this->load->view('site/home', $this->data);
        }

    }

}
