<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends PublicController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->data['page'] = 'offers';

        //Load side ad banner from this->database randomly
    	$this->load->model(SITE_MODELS.'ads_model', 'modelAdsAlias');
    	$this->data['sideAdBanner'] = $this->modelAdsAlias->fetchRowFields( array('image','url'), array('show_status'=>1,'ad_area'=>2),array('id' => 'RANDOM'));
    	
        $this->load->view($this->layout, $this->data);
    } 

}