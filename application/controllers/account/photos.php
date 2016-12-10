<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;
    protected $imageShowPath;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'photo_gallery_model','modelPhotoAlias');
        $this->ctrlUrl = '/account/photos';
        $this->nextUrl = '/account/videos';
        $this->imageShowPath = PHOTOS_SHOW_PATH;
    }
    
    public function index()
    {
        $this->data['page'] = 'photos';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['imageShowPath'] = $this->imageShowPath;
 
        $fields = array(
        	TBL_SUBSCRIBERS.'.published'
        );

        $userID = $this->encrypt->decode($this->user['user_id']);

        $profileData = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->data['published']  = $profileData->published;
        
        $this->data['records'] = $this->modelPhotoAlias->fetchFields(array('img_url','img_id'), array('subscriber'=> (int) $userID), array('orderby'=>'ASC'));

        $this->load->view($this->layout, $this->data);
    }

}