<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;

class Offers extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;
	protected $isPublished;
	protected $userMainTitle;
	protected $imageUpPath;
	protected $imageShowPath;
  protected $table;
	protected $join;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/offers_model', 'modelNameAlias');
				$this->load->model('site/department_user_model', 'modelUserDeptAlias');

        $this->ctrlUrl = '/account/offers';
        $this->nextUrl = '/account/details';

        $fields = array(TBL_SUBSCRIBERS.'.published', TBL_SUBSCRIBERS.'.subs_title');
        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));

        $this->isPublished = $record->published;

        $this->imageUpPath = UPLOAD_FOLDER.'subscribers/wall/';
        $this->imageShowPath = OFFERS_IMG_SHOW_PATH;
        $this->table = TBL_WALL;

				//If no access is given to this user , then redirect to basic setup window.
				if(!empty($this->data['menuAccess']) && !in_array('offers', $this->data['menuAccess']))
				{
						$this->session->set_flashdata('message', 'No access');
						redirect('account/basic');
						return;
				}

				$this->join = array(
					array('table' => TBL_DEPTS, 'condition' => TBL_DEPTS.'.dept_id = '.$this->table.'.dept_id', 'join_type' => 'LEFT')
				);

    }

    public function index()
    {

      $this->data['page'] = 'offers/index';
      $this->data['nextUrl'] = $this->nextUrl;
      $this->data['ctrlUrl'] = $this->ctrlUrl;
      $this->data['published'] = $this->isPublished;
      $this->data['imageShowPath'] = $this->imageShowPath;

      $this->data['records'] = $this->modelNameAlias->fetchFields(
                                                      array(TBL_DEPTS.'.dept_title as dept_title_en', TBL_DEPTS.'.dept_title_ar', $this->table.'.wall_id', $this->table.'.title_en', $this->table.'.title_ar', $this->table.'.thumb_url', $this->table.'.status', $this->table.'.voucher_code'),
                                                      array($this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id'])),
                                                      array($this->table.'.created_on'=>'DESC'), null, null, $this->join);

      $this->load->view($this->layout, $this->data);

    }

		public function add()
		{
				$this->data['page'] = 'offers/add';
				$this->data['ctrlUrl'] = $this->ctrlUrl;
				$this->data['published'] = $this->isPublished;
				$error = FALSE;

				//Get all departments with this user
				$this->data['departments'] = $this->modelUserDeptAlias->getUserDepts((int) $this->encrypt->decode($this->user['user_id']));

				if($this->input->post())
				{
						$this->data['post'] = $this->input->post();

						$this->load->library('form_validation');
						$this->form_validation->set_rules('name_en', 'Offer title', 'trim|required|xss_clean');
						$this->form_validation->set_rules('name_ar', 'Offer title arabic', 'trim|required|xss_clean');
						$this->form_validation->set_rules('department', 'Department', 'trim|required|xss_clean');
						$this->form_validation->set_rules('voucher_code', 'Voucher code', 'trim|xss_clean');
						$this->form_validation->set_rules('description_en', 'Description', 'trim|xss_clean');
						$this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|xss_clean');
						$this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');

						if (empty($_FILES['userfile']['name']))
						{
								$this->data["Error"] = "Y";
								$this->data['MSG'] = 'You must select an image';
								$error  = TRUE;
						}

						$this->form_validation->set_message('required', '%s required');
						$this->form_validation->set_error_delimiters('', '');

						if($this->form_validation->run() == TRUE && !$error)
						{

								 $save = array(
									  $this->table.'.title_en' => ($this->input->post('name_en') != "") ? $this->input->post('name_en') : NULL,
									  $this->table.'.title_ar' => ($this->input->post('name_ar') != "") ? $this->input->post('name_ar') : NULL,
								    $this->table.'.description_en' => ($this->input->post('description_en') != "") ? $this->input->post('description_en') : NULL,
									  $this->table.'.description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar') : NULL,
									  $this->table.'.subscriber' => (int) $this->encrypt->decode($this->user['user_id']),
								    $this->table.'.dept_id' => $this->input->post('department'),
								    $this->table.'.voucher_code' => ($this->input->post('voucher_code') != "") ? $this->input->post('voucher_code') : NULL,
										$this->table.'.status' => 1,
									  $this->table.'.created_on' => date('Y-m-d h:i:s'),
									  $this->table.'.updated_on' => date('Y-m-d h:i:s')
								 );

								 if($this->uploadFile['userfile'] != '' && $this->uploadFile['thumbfile'] != NULL)
								 {
									  $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
									  $save[$this->table.'.thumb_url'] = $this->uploadFile['thumbfile'];
								 }

								 $id = $this->modelNameAlias->save($save);

								 $this->session->set_flashdata('message', 'News added!');
								 redirect($this->ctrlUrl);

					  }

			}

			$this->load->view($this->layout, $this->data);

		}

		public function edit($id)
		{
				$this->data['page'] = 'offers/edit';
				$this->data['ctrlUrl'] = $this->ctrlUrl;
				$this->data['published'] = $this->isPublished;

				$id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchRowFields(array('wall_id','title_en as name_en','title_ar as name_ar','thumb_url', 'description_en','description_ar','dept_id as department', 'voucher_code'),
                                                        array('wall_id' => $id, 'subscriber' => $this->encrypt->decode($this->user['user_id'])));

				//Get all departments with this user
				$this->data['departments'] = $this->modelUserDeptAlias->getUserDepts((int) $this->encrypt->decode($this->user['user_id']));

				$post['name_en'] = $record->name_en;
        $post['name_ar'] = $record->name_ar;
        $post['description_en'] = $record->description_en;
        $post['description_ar'] = $record->description_ar;
				$post['department'] = $record->department;
				$post['voucher_code'] = $record->voucher_code;
        $this->data['post'] = $post;

        $this->data['image'] = $record->thumb_url;
        $this->data['imageShowPath'] = $this->imageShowPath;

				if($this->input->post())
				{
						$this->data['post'] = $this->input->post();

						$this->load->library('form_validation');
						$this->form_validation->set_rules('name_en', 'Offer title', 'trim|required|xss_clean');
						$this->form_validation->set_rules('name_ar', 'Offer title arabic', 'trim|required|xss_clean');
						$this->form_validation->set_rules('department', 'Department', 'trim|required|xss_clean');
						$this->form_validation->set_rules('voucher_code', 'Voucher code', 'trim|xss_clean');
						$this->form_validation->set_rules('description_en', 'Description', 'trim|xss_clean');
						$this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|xss_clean');
						$this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');

						if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

						$this->form_validation->set_message('required', '%s required');
						$this->form_validation->set_error_delimiters('', '');

						if($this->form_validation->run() == TRUE)
						{

								 $save = array(
									  $this->table.'.title_en' => ($this->input->post('name_en') != "") ? $this->input->post('name_en') : NULL,
									  $this->table.'.title_ar' => ($this->input->post('name_ar') != "") ? $this->input->post('name_ar') : NULL,
								    $this->table.'.description_en' => ($this->input->post('description_en') != "") ? $this->input->post('description_en') : NULL,
									  $this->table.'.description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar') : NULL,
									  $this->table.'.subscriber' => (int) $this->encrypt->decode($this->user['user_id']),
								    $this->table.'.dept_id' => $this->input->post('department'),
								    $this->table.'.voucher_code' => ($this->input->post('voucher_code') != "") ? $this->input->post('voucher_code') : NULL,
										$this->table.'.status' => 1,
									  $this->table.'.created_on' => date('Y-m-d h:i:s'),
									  $this->table.'.updated_on' => date('Y-m-d h:i:s')
								 );

								 if($this->uploadFile['userfile'] != '' && $this->uploadFile['thumbfile'] != NULL)
								 {
									  $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
									  $save[$this->table.'.thumb_url'] = $this->uploadFile['thumbfile'];
								 }

								 $where = array(
                 		$this->table.'.wall_id' => $id
                 );

								 $this->modelNameAlias->save( $save, $where);

								 $this->session->set_flashdata('message', 'Offer updated!');
								 redirect($this->ctrlUrl);

					  }

			}

			$this->load->view($this->layout, $this->data);

		}

		public function delete($id)
    {
    	  $id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchRowFields(array('image_url','thumb_url'), array('wall_id'=>$id));

        if(empty($record))
        {
        	$this->session->set_flashdata('message', 'No record found!');
        	redirect($this->ctrlUrl);
        }else{

        	if(file_exists($this->imageUpPath.$record->image_url)) { unlink($this->imageUpPath.$record->image_url);}
          if(file_exists($this->imageUpPath.$record->thumb_url)) { unlink($this->imageUpPath.$record->thumb_url);}

        	$this->modelNameAlias->delete(array('wall_id' => $id));

        	$this->session->set_flashdata('message', 'Offer deleted!');
        	redirect($this->ctrlUrl);

        }

    }

    public function status($id, $status)
    {
      $id = $this->encrypt->decode($id);
      $record = $this->modelNameAlias->fetchRowFields(array('wall_id'), array('wall_id'=>$id));

      if(empty($record))
      {
        $this->session->set_flashdata('message', 'No record found!');
        redirect($this->ctrlUrl);
      }else{

        $save = array();
        $statusTxt = '';

        if($status == 'Y')
        {
           $save = array('status' => 1);
           $statusTxt = 'enabled';
        }else{
           $save = array('status' => 0);
           $statusTxt = 'disabled';
        }

        $this->modelNameAlias->save( $save, array('wall_id' => $id));

        $this->session->set_flashdata('message', 'Offer ' . $statusTxt);
        redirect($this->ctrlUrl);

      }

    }

		public function handle_upload()
		{
				$config['upload_path'] = $this->imageUpPath;
				$config['allowed_types'] =  'jpg|jpeg|png';
				$config['max_size'] = 1024;
				$config['max_width'] = 1280;
				$config['max_height'] = 1280;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
				{
						if ($this->upload->do_upload('userfile'))
						{
								$upload_data    = $this->upload->data();
								$this->uploadFile['userfile'] = $upload_data['file_name'];
								$this->uploadFile['thumbfile'] = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];

								require_once(APPPATH.'third_party/WideImage/WideImage.php');
								$img = WideImage::load($this->imageUpPath . $this->uploadFile['userfile']);

								$resized = $img->resize(640, 640, 'outside');
								$resized->saveToFile($this->imageUpPath . $this->uploadFile['userfile']);

								$resizedThumb = $img->resize(200, 200, 'fill');
								$resizedThumb->saveToFile($this->imageUpPath . $this->uploadFile['thumbfile']);

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

        if(empty($record)){

					redirect(ERROR_404);
					exit(1);
				}

        $message = ($record->description_en == NULL) ? strip_tags($record->description_ar): strip_tags($record->description_en);
        $title = ($record->title_en == NULL) ? $record->title_ar: $record->title_en;

        $config = new Config();
        $config->setApplicationId(ONESIGNAL_APP_ID);
        $config->setApplicationAuthKey(ONESIGNAL_AUTH_KEY);
        $config->setUserAuthKey(ONESIGNAL_USER_KEY);

        $api = new OneSignal($config);

        $response = $api->notifications->add([
            'contents' => [
                'en' => stripslashes($message)
            ],
            'headings'=> [
                'en' => $title
            ],
            'big_picture' => ($record->image_url != NULL) ? $this->imageShowPath.$record->image_url : '',
            'included_segments' => ['All'],
            'data' => [
                'pushType' => 'pinboards',
                'url' => '#/app/pinboards'
            ]
        ]);

        $this->session->set_flashdata('message', 'Offer: <strong>'.$record->title_en.'</strong> has been send as notification!');
        redirect($this->ctrlUrl);

    }

}
