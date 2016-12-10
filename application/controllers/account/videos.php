<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'video_gallery_model', 'modelNameAlias');
        $this->ctrlUrl = '/account/videos';
        $this->nextUrl = '/account/insurance';
    }
    
    public function index()
    {
        $this->data['page'] = 'videos';
        $this->data['nextUrl'] = $this->nextUrl;
 
        $fields = array(
        	TBL_SUBSCRIBERS.'.published'
        );

        $userID = $this->encrypt->decode($this->user['user_id']);

        $profileData = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->data['published']  = $profileData->published;

        $this->data['videos'] = $this->modelNameAlias->fetchFields(array('vid_url','vid_id'), array('subscriber' => $userID));

        if($this->input->post())
        {
            $videoArray = $this->input->post("video");

            if(count($videoArray) > 0)
            {
                $saveArray = array();

                $this->modelNameAlias->removeVideos($userID);

                foreach ($videoArray as $key => $value)
                {
                    if(!empty($value))
                    {
                        $url = $this->ytubeEmbedURL($value);
                        $ytubeID = $this->ytudeVideoID($value);
                        $thumbURL = 'http://img.youtube.com/vi/'.$ytubeID.'/hqdefault.jpg';

                        array_push($saveArray, array(
                            'subscriber' => (int) $userID,
                            'vid_url' => $ytubeID,
                            'has_thumb' => 0,
                            'thumb_url' => $thumbURL,
                            'created_on' => date('Y-m-d H:i:s'),
                            'updated_on' => date('Y-m-d H:i:s')
                         ));
                    }
                    
                }

                $this->modelNameAlias->saveVideos($saveArray);

                $this->session->set_flashdata('message', 'Videos added successfully');
                redirect($this->ctrlUrl); 

            }else{

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'No videos has been found';

            }

        }

        $this->load->view($this->layout, $this->data);
    }

    private function ytubeEmbedURL($string)
    {
        $search     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
        $replace    = "youtube.com/v/$1";    
        $url = preg_replace($search,$replace,$string);
        return $url;
    }

    private function ytudeVideoID($link)
    {
        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
        return $my_array_of_vars['v'];
    }

}