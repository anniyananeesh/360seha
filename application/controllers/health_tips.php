<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Health_tips extends PublicController
{
	protected $imageShowPath;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."tips_model", 'modelTipsAlias');
        $this->imageShowPath = TIPS_SHOW_PATH;
    }
    
    public function index()
    {
    	$this->data['page'] = 'health_tips';
    	$this->data['imageShowPath'] = $this->imageShowPath;

    	$this->data['records'] = $this->modelTipsAlias->fetchFields(array('tips_title as tips_title_en','tips_title_ar','tips_id','image_url'), array('show_status'=>1), array('tips_id'=>'DESC'));

    	$this->load->view($this->layout, $this->data);
    }

    public function details($tipID)
    {
    	$this->data['page'] = 'health_tips_details';
    	$this->data['imageShowPath'] = $this->imageShowPath;

    	$tipID = $this->encrypt->decode($tipID);

    	$this->data['tip'] = $this->modelTipsAlias->fetchRowFields(array('tips_title as tips_title_en','tips_title_ar','tips_id','image_url','tips_description as tips_description_en','tips_description_ar'), array('tips_id'=> $tipID));

    	$this->load->view($this->layout, $this->data);
    }

}