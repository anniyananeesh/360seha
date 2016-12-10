<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends PublicController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."news_model", 'modelNameAlias');
    }

    public function index()
    {
    	$this->data['page'] = 'news';
      $site_lang = ($this->data['lan'] == 'en') ? 'English' : 'Arabic';
      $this->data['records'] = $this->modelNameAlias->getAllNews(array('news_title as title_en','news_title_ar as title_ar','news_id','news_description as description_en', 'news_description_ar as description_ar','image_url as image','created_on'), $site_lang, 1000000);
    	$this->load->view($this->layout, $this->data);
    }

    public function details($newID)
    {
    	$this->data['page'] = 'news_details';
    	$newID = $this->encrypt->decode($newID);

    	$this->data['news'] = $this->modelNameAlias->fetchRowFields(array('news_title as title_en','news_title_ar as title_ar','news_id','news_description as description_en', 'news_description_ar as description_ar','image_url as image','created_on'), array('news_id'=> $newID));
      $site_lang = ($this->data['lan'] == 'en') ? 'English' : 'Arabic';
      $this->data['otherNews'] = $this->modelNameAlias->getAllNews(array('news_title as title_en','news_title_ar as title_ar','news_id','news_description as description_en', 'news_description_ar as description_ar','image_url as image','created_on'), $site_lang, 1000000, array('news_id !='=>$newID));

    	$this->load->view($this->layout, $this->data);
    }

}
