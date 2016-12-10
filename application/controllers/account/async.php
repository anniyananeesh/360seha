<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Async extends CI_Controller
{
    protected $user;

    public function __construct()
    {
        parent::__construct(); 
        $this->user = $this->session->userdata('user_logged');
    }

    private function checkRequest()
    {
    	if (!$this->input->is_ajax_request())
		{ 
         	exit('Oops! asynchronous request should be a json ');            
        }
    }

    public function show_week_hours()
    {
        $data = array();
        $this->load->view('user/partials/show-weekhrs', $data);
    }

    public function upload()
    {
        error_reporting(E_ALL | E_STRICT);
        require(APPPATH.'libraries/UploadHandler.php');
        $upload_handler = new UploadHandler(array('upload_dir' => SUBS_IMAGE_UP_PATH,'upload_url' => SUBS_PHOTO_SHOW_PATH, 'script_url' => HOST_URL.'/account/async/image_delete/'));

        $this->load->model(SITE_MODELS.'photo_gallery_model','modelPhotoAlias');

        require_once(APPPATH.'third_party/WideImage/WideImage.php');
        $img = WideImage::load(SUBS_IMAGE_UP_PATH . $upload_handler->response['files'][0]->name);

        $thumbImg = $img->resize(300, 300, 'inside');
        $resized = $thumbImg->crop('center', 'center', 100, 100);
        $resized->saveToFile(SUBS_IMAGE_UP_PATH . 'thumbs/' . $upload_handler->response['files'][0]->name);

        $save = array(
            'img_url' => $upload_handler->response['files'][0]->name,
            'img_thumb' => $upload_handler->response['files'][0]->name,
            'img_show_status' => 1,
            'subscriber' => (int) $this->encrypt->decode($this->user['user_id']),
            'created_on' => date('Y-m-d H:i:s'),
            'updated_on' => date('Y-m-d H:i:s')
        );

        $this->modelPhotoAlias->save($save);
    }

    public function image_delete()
    {
        $file = $_GET['file'];

        if(file_exists(SUBS_IMAGE_UP_PATH.$file) && $file != NULL)
        {
            $this->load->model(SITE_MODELS.'photo_gallery_model','modelPhotoAlias');
            
            unlink(SUBS_IMAGE_UP_PATH.$file);

            $where = array(
                'img_url' => $file
            );

            $this->modelPhotoAlias->delete($where);

            echo json_encode(array(SUBS_PHOTO_SHOW_PATH.$file => true));
        }else{
            echo json_encode(array(false));
        }
    }

    public function save_image_order($imgID, $order)
    {
        $this->load->model(SITE_MODELS.'photo_gallery_model','modelPhotoAlias');

        $save = array(
            'orderby' => $order,
        );

        $where = array(
            'img_id' => $imgID
        );

        $this->modelPhotoAlias->save($save,$where);

        echo json_encode(array('code'=>200,'message'=>'ORDER_SAVED','error'=>FALSE));

    }

    public function subscriber_services($lan, $userID, $deptID)
    {
        $this->load->model(SITE_MODELS."specialization_model", 'modelNameAlias');
        $this->load->model(SITE_MODELS."specialization_subs_model", "modelSubsSplAlias");

        $data['records'] = $this->modelNameAlias->fetchFields(array('title_en','title_ar','id'), array('dept_id' => $deptID));
        $data['lan'] = $lan; 

        $userSpl = $this->modelSubsSplAlias->fetchFields(array('spl_id'), array('subs_id'  => $userID));
        $userSplFilterArray = array(); 

        foreach ($userSpl as $key => $value)
        {
            array_push($userSplFilterArray, $value->spl_id);
        } 
        
        $data['userSplznsMain'] = $userSplFilterArray;

        $this->load->view('user/partials/services-list', $data);
    }

}