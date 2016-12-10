<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;

class Signboards extends MY_Controller{

    protected $table = TBL_WALL;
    protected $ctrlUrl;
    protected $classViews = 'admin/signboards/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/signboards/';
        $this->load->library('wall_service');
        $this->load->library('subscriber_service');
    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Pinboards';
        $data['sub_title'] = 'Manage your wall posts here';
        $data['subscribers'] = $this->subscriber_service->get_subscribers(array(TBL_SUBSCRIBERS.'.published' => 1));

        if($this->input->post())
        {
        	if($this->input->post('subscriber') != "")
        	{
        		$condition = array(
	        		$this->table.'.subscriber' => $this->encrypt->decode($this->input->post('subscriber'))
	        	);
        	}else{
        		$condition = array();
        	}

        	$data['wall_items'] = $this->wall_service->getAllSignboards($condition);
        }else{
        	$data['wall_items'] = $this->wall_service->getAllSignboards();
        }

        $this->load->view($this->layout, $data);
    }

    public function add()
    {
    	$data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'New Pinboard Item';
        $data['sub_title'] = 'Manage your wall posts here';
        $data['subscribers'] = $this->subscriber_service->get_subscribers(array(TBL_SUBSCRIBERS.'.published' => 1));
        $data['error']       = false;

        if($this->input->post())
        {
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('subscriber', 'Choose subscriber', 'trim|xss_clean|required');
        	$this->form_validation->set_rules('title', 'Title English', 'trim|xss_clean');
        	$this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('description_en', 'Description English', 'trim|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description Arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('dept_id', 'Department', 'trim|required|xss_clean');
            $this->form_validation->set_rules('voucher_code', 'Voucher Code', 'trim|xss_clean');
            $this->form_validation->set_rules('dpd1', 'Offer Start date', 'trim|xss_clean');
            $this->form_validation->set_rules('dpd2', 'Offer End date', 'trim|xss_clean');
        	$this->form_validation->set_rules('userfile', 'Wall Image', 'trim|xss_clean|callback_handle_upload');

            if (empty($_FILES['userfile']['name']))
	        {
	        	$error = true;
	        	$data['error'] = 'You must select an image';
	        }

            if($this->input->post("title") == "" && $this->input->post("title_ar") == "")
            {
                $error = TRUE;
                $data['error_title'] = 'Either English/Arabic title required';
            }

            if($this->input->post("description_en") == "" && $this->input->post("description_ar") == "")
            {
                $error = TRUE;
                $data['error_description'] = 'Either English/Arabic description required';
            }

            if($this->input->post('has_points') == 1)
            {
                $this->form_validation->set_rules('points', 'Pinboard points', 'trim|xss_clean|required');
                $this->form_validation->set_rules('expiry', 'Pinboard expiry date', 'trim|xss_clean|required');
                $data['error'] = true;
            }

	        $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error)
            {
                $dateExpiry = NULL;

                if($this->input->post('has_points') == 1)
                {
                    $dateExpiry = explode('/', $this->input->post('expiry'));
                    $dateExpiry = $dateExpiry[2].'-'.$dateExpiry[1].'-'.$dateExpiry[0];
                    $dateExpiry = strtotime($dateExpiry);
                }

            	$subs_type = $this->subscriber_service->getSubscriberType($this->encrypt->decode($this->input->post('subscriber')));

            	$save = array(
            		$this->table.'.title_en' => ($this->input->post('title') != "") ? $this->input->post('title') : NULL,
            		$this->table.'.title_ar' => ($this->input->post('title_ar') != "") ? $this->input->post('title_ar') : NULL,
                    $this->table.'.description_en' => ($this->input->post('description_en') != "") ? $this->input->post('description_en') : NULL,
                    $this->table.'.description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar') : NULL,
                    $this->table.'.type' => (int) $subs_type[0]->subs_type,
            		$this->table.'.subscriber' => (int) $this->encrypt->decode($this->input->post('subscriber')),
                    $this->table.'.dept_id' => $this->input->post('dept_id'),
                    $this->table.'.voucher_code' => ($this->input->post('voucher_code') != "") ? $this->input->post('voucher_code') : NULL,
                    $this->table.'.has_points' => $this->input->post('has_points'),
                    $this->table.'.offer_starts' => ($this->input->post('dpd1')) ? date('Y-m-d', strtotime($this->input->post('dpd1'))) : NULL,
                    $this->table.'.offer_ends' => ($this->input->post('dpd2')) ? date('Y-m-d', strtotime($this->input->post('dpd2'))) : NULL,
                    $this->table.'.points' => ($this->input->post('has_points') == 1) ? $this->input->post('points') : NULL,
                    $this->table.'.expiry' => ($this->input->post('has_points') == 1) ? date('Y-m-d', $dateExpiry) : NULL,

            		$this->table.'.created_on' => date('Y-m-d h:i:s'),
            		$this->table.'.updated_on' => date('Y-m-d h:i:s')
            	);

            	if($_POST['userfile'] != '' && $_POST['thumbfile'] != NULL)
            	{
            		$save[$this->table.'.image_url'] =  $_POST['userfile'];
            		$save[$this->table.'.thumb_url'] = $_POST['thumbfile'];
            	}

            	$this->wall_service->save($save);
            	$this->session->set_flashdata('message', 'New pinboard item added!');
                redirect($this->ctrlUrl);
            }
        }

        $this->load->view($this->layout, $data);
    }

    public function edit($id = "")
    {
    	$data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Update Pinboard Item';
        $data['sub_title'] = 'Manage your wall posts here';
        $data['subscribers'] = $this->subscriber_service->get_subscribers(array(TBL_SUBSCRIBERS.'.published' => 1));

        $id = $this->encrypt->decode($id);
        $data['error']       = false;
        $data["record"] = $this->wall_service->get_wall_item_by_pk($id);

        //Get all departments for a user
        $this->load->model(SITE_MODELS.'department_user_model', 'modelUserDeptAlias');
        $data['departments'] = $this->modelUserDeptAlias->getUserDepts($data["record"]->subscriber);

        $error = FALSE;

        if($this->input->post())
        {
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('subscriber', 'Choose subscriber', 'trim|xss_clean|required');
        	$this->form_validation->set_rules('title', 'Title English', 'trim|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('voucher_code', 'Voucher Code', 'trim|xss_clean');
            $this->form_validation->set_rules('description_en', 'Description English', 'trim|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description Arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('dept_id', 'Department', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dpd1', 'Offer Start date', 'trim|xss_clean');
            $this->form_validation->set_rules('dpd2', 'Offer End date', 'trim|xss_clean');
        	$this->form_validation->set_rules('userfile', 'Wall Image', 'trim|xss_clean|callback_handle_upload');

            if($this->input->post('has_points') == 1)
            {
                $this->form_validation->set_rules('points', 'Pinboard points', 'trim|xss_clean|required');
                $this->form_validation->set_rules('expiry', 'Pinboard expiry date', 'trim|xss_clean|required');
                $data['error'] = true;
            }

            if($this->input->post("title") == "" && $this->input->post("title_ar") == "")
            {
                $error = TRUE;
                $data['error_title'] = 'Either English/Arabic title required';
            }

            if($this->input->post("description_en") == "" && $this->input->post("description_ar") == "")
            {
                $error = TRUE;
                $data['error_description'] = 'Either English/Arabic description required';
            }

	        $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error)
            {
                $dateExpiry = NULL;

                if($this->input->post('has_points') == 1)
                {
                    $dateExpiry = explode('/', $this->input->post('expiry'));
                    $dateExpiry = $dateExpiry[2].'-'.$dateExpiry[1].'-'.$dateExpiry[0];
                    $dateExpiry = strtotime($dateExpiry);
                }

            	$subs_type = $this->subscriber_service->getSubscriberType($this->encrypt->decode($this->input->post('subscriber')));

            	$save = array(
            		$this->table.'.title_en' => ($this->input->post('title') != "") ? $this->input->post('title') : NULL,
                    $this->table.'.title_ar' => ($this->input->post('title_ar') != "") ? $this->input->post('title_ar') : NULL,
                    $this->table.'.description_en' => ($this->input->post('description_en') != "") ? $this->input->post('description_en') : NULL,
                    $this->table.'.description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar') : NULL,
                    $this->table.'.type' => (int) $subs_type[0]->subs_type,
            		$this->table.'.subscriber' => (int) $this->encrypt->decode($this->input->post('subscriber')),
                    $this->table.'.dept_id' => $this->input->post('dept_id'),
                    $this->table.'.voucher_code' => ($this->input->post('voucher_code') != "") ? $this->input->post('voucher_code') : NULL,
                    $this->table.'.has_points' => $this->input->post('has_points'),
                    $this->table.'.points' => ($this->input->post('has_points') == 1) ? $this->input->post('points') : NULL,
                    $this->table.'.expiry' => ($this->input->post('has_points') == 1) ? date('Y-m-d', $dateExpiry) : NULL,
                    $this->table.'.offer_starts' => ($this->input->post('dpd1')) ? date('Y-m-d', strtotime($this->input->post('dpd1'))) : NULL,
                    $this->table.'.offer_ends' => ($this->input->post('dpd2')) ? date('Y-m-d', strtotime($this->input->post('dpd2'))) : NULL,
            		$this->table.'.created_on' => date('Y-m-d h:i:s'),
            		$this->table.'.updated_on' => date('Y-m-d h:i:s')
            	);

            	if(isset($_POST['userfile']) && $_POST['userfile'] != '' && $_POST['thumbfile'] != NULL)
            	{
            		$save[$this->table.'.image_url'] =  $_POST['userfile'];
            		$save[$this->table.'.thumb_url'] =  $_POST['thumbfile'];
            	}

            	$where = array(
            		$this->table.'.wall_id' => $id
            	);

            	$this->wall_service->save($save,$where);

            	$this->session->set_flashdata('message', 'Pinboard item updated!');
                redirect($this->ctrlUrl);
            }
        }

        $this->load->view($this->layout, $data);
    }

    public function status($id,$status)
    {
    	$id = $this->encrypt->decode($id);
        $record = $this->wall_service->get_wall_item_by_pk($id);

        if(!$record)
        {
        	redirect(ERROR_404);
            exit(1);
        }

        $save = array(
        	$this->table.'.status' => (int) $status
    	);

        $where = array(
        	$this->table.'.wall_id' => $id
       	);

       	$this->wall_service->save($save, $where);
      	$this->session->set_flashdata('message', 'Status of Wall Post => <strong>'.$record->title_en.'</strong> updated!');
      	redirect($this->ctrlUrl);

    }

    public function delete($id)
    {
    	$id = $this->encrypt->decode($id);
        $record = $this->wall_service->get_wall_item_by_pk($id);

        if(!$record)
        {
        	redirect(ERROR_404);
            exit(1);
        }

 		unlink(UPLOAD_FOLDER.'subscribers/wall/'.$record->image_url);
 		unlink(UPLOAD_FOLDER.'subscribers/wall/'.$record->thumb_url);

        $where = array(
        	$this->table.'.wall_id' => $id
       	);

       	$this->wall_service->remove_item($where);

      	$this->session->set_flashdata('message', 'Wall Post => <strong>'.$record->title_en.'</strong> has been removed!');
      	redirect($this->ctrlUrl);
    }

    public function handle_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/wall/';
        $config['allowed_types'] =  'jpg|jpeg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 640;
        $config['max_height'] = 640;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $_POST['userfile'] = $upload_data['file_name'];
                $_POST['thumbfile'] = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];

                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load(UPLOAD_FOLDER.'subscribers/wall/'.$_POST['userfile']);

                $resized = $img->resize(285, 285);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/wall/'.$_POST['thumbfile']);

                return true;
            }
            else
            {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        }
        else
        {
          return true;
        }

    }

    public function send($id)
    {

        $id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchById($id);
        if(!$record){ redirect(ERROR_404); exit(1);}

        $message = ($record->description_en == NULL) ? strip_tags($record->description_ar): strip_tags($record->description_en);
        $title = ($record->title_en == NULL) ? $record->title_ar: $record->title_en;

        $config = new Config();
        $config->setApplicationId(ONESIGNAL_APP_ID);
        $config->setApplicationAuthKey(ONESIGNAL_AUTH_KEY);
        $config->setUserAuthKey(ONESIGNAL_USER_KEY);

        $api = new OneSignal($config);
        $ImageUrl = base_url().'/subscribers/wall/';

        $response = $api->notifications->add([
            'contents' => [
                'en' => stripslashes($message)
            ],
            'headings'=> [
                'en' => $title
            ],
            'big_picture' => ($record->image_url != NULL) ? $ImageUrl.$record->image_url : '',
            'included_segments' => ['All'],
            'data' => [
                'pushType' => 'pinboards',
                'url' => '#/app/pinboards'
            ]
        ]);

        $this->session->set_flashdata('message', 'Pinboard: <strong>'.$record->title_en.'</strong> has been send as notification!');
        redirect($this->ctrlUrl);

    }

}
