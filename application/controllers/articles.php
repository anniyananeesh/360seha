<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends PublicController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."articles_model", 'modelNameAlias');
    }

    public function index()
    {
    	$this->data['page'] = 'articles';
      $site_lang = ($this->data['lan'] == 'en') ? 'English' : 'Arabic';
      $this->data['records'] = $this->modelNameAlias->getAllArticles(array('title as title_en','title_ar','articles_id','description as description_en','created_on','description_ar','image_url as image'), array(), $site_lang, 10000000);
    	$this->load->view($this->layout, $this->data);
    }

    public function details($articleID)
    {
    	$this->data['page'] = 'articles_details';

    	$articleID = $this->encrypt->decode($articleID);
      $site_lang = ($this->data['lan'] == 'en') ? 'English' : 'Arabic';
    	$this->data['article'] = $this->modelNameAlias->fetchRowFields(array('title as title_en','title_ar','articles_id','description as description_en','created_on','description_ar','image_url as image'), array('articles_id'=> $articleID));
      $this->data['otherArticles'] = $this->modelNameAlias->getAllArticles(array('title as title_en','title_ar','articles_id','description as description_en','created_on','description_ar','image_url as image'), array('articles_id !='=>$articleID), $site_lang, 8);

    	$this->load->view($this->layout, $this->data);
    }

}
