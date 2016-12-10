<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;
	protected $isPublished;
	protected $userMainTitle;
	protected $imageUpPath;
	protected $imageShowPath;
  protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/news_model', 'modelNameAlias');

        $this->ctrlUrl = '/account/news';
        $this->nextUrl = '/account/details';

        $fields = array(TBL_SUBSCRIBERS.'.published', TBL_SUBSCRIBERS.'.subs_title');
        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));

        $this->isPublished = $record->published;

        $this->imageUpPath = UPLOAD_FOLDER.'news/';
        $this->imageShowPath = NEWS_SHOW_PATH;
        $this->table = TBL_GENERAL_NEWS;

				if(!empty($this->data['menuAccess']) && !in_array('news', $this->data['menuAccess']))
				{
					$this->session->set_flashdata('message', 'No access');
					redirect('account/basic');
					return;
				}

    }

    public function index()
    {
	      $this->data['page'] = 'news/index';
	      $this->data['nextUrl'] = $this->nextUrl;
	      $this->data['ctrlUrl'] = $this->ctrlUrl;
	      $this->data['published'] = $this->isPublished;
	      $this->data['imageShowPath'] = $this->imageShowPath;

	      $this->data['records'] = $this->modelNameAlias->fetchFields(
	                                                      array($this->table.'.news_id', $this->table.'.news_title as title_en', $this->table.'.news_title_ar as title_ar', $this->table.'.thumb_url', $this->table.'.show_status'),
	                                                      array($this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id'])),
	                                                      array('created_on'=>'DESC'));

	      $this->load->view($this->layout, $this->data);
    }

    public function add()
    {
    	  $this->data['page'] = 'news/add';
        $this->data['ctrlUrl'] = $this->ctrlUrl;
        $this->data['published'] = $this->isPublished;
        $error = FALSE;

        if($this->input->post())
        {
        	$this->data['post'] = $this->input->post();

          $this->load->library('form_validation');
          $this->form_validation->set_rules('name_en', 'News title', 'trim|required|xss_clean');
          $this->form_validation->set_rules('name_ar', 'News title arabic', 'trim|required|xss_clean');
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
                 $this->table.'.news_title' => ($this->input->post('name_en') != "") ? $this->input->post('name_en'): NULL,
                 $this->table.'.news_title_ar' => ($this->input->post('name_ar') != "") ? $this->input->post('name_ar'): NULL,
                 $this->table.'.news_description' => ($this->input->post('description_en') != "") ? $this->input->post('description_en'): NULL,
                 $this->table.'.news_description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar'): NULL,
                 $this->table.'.show_status' => 1,
								 $this->table.'.publish_on' => 'Both',
                 $this->table.'.subscriber' => (int) $this->encrypt->decode($this->user['user_id']),
                 $this->table.'.created_on' => date('Y-m-d H:i:s'),
                 $this->table.'.updated_on' => date('Y-m-d H:i:s')
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
    	  $this->data['page'] = 'news/edit';
        $this->data['ctrlUrl'] = $this->ctrlUrl;
        $this->data['published'] = $this->isPublished;

        $id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchRowFields(array('news_id','news_title as name_en','news_title_ar as name_ar','thumb_url', 'news_description as description_en','news_description_ar as description_ar'),
                                                        array('news_id' => $id, 'subscriber' => $this->encrypt->decode($this->user['user_id'])));

        $post['name_en'] = $record->name_en;
        $post['name_ar'] = $record->name_ar;
        $post['description_en'] = $record->description_en;
        $post['description_ar'] = $record->description_ar;
        $this->data['post'] = $post;

        $this->data['image'] = $record->thumb_url;
        $this->data['imageShowPath'] = $this->imageShowPath;

        if($this->input->post())
        {
        	  $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('name_en', 'News title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'News title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_en', 'Description', 'trim|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|xss_clean');

            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

            $this->form_validation->set_message('required', '%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

                $save = array(
                    $this->table.'.news_title' => ($this->input->post('name_en') != "") ? $this->input->post('name_en'): NULL,
                    $this->table.'.news_title_ar' => ($this->input->post('name_ar') != "") ? $this->input->post('name_ar'): NULL,
                    $this->table.'.news_description' => ($this->input->post('description_en') != "") ? $this->input->post('description_en'): NULL,
                    $this->table.'.news_description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar'): NULL,
										$this->table.'.publish_on' => 'Both',
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if(isset($this->uploadFile['userfile']) && $this->uploadFile['userfile'] != '')
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
                    $save[$this->table.'.thumb_url'] = $this->uploadFile['thumbfile'];
                }

                $where = array(
                	$this->table.'.news_id' => $id
                );

                $this->modelNameAlias->save($save, $where);

                $this->session->set_flashdata('message', 'News details updated!');
                redirect($this->ctrlUrl);
            }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function delete($id)
    {
    	  $id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchRowFields(array('image_url','thumb_url'), array('news_id'=>$id));

        if(empty($record))
        {
        	$this->session->set_flashdata('message', 'No record found!');
        	redirect($this->ctrlUrl);
        }else{

        	if(file_exists($this->imageUpPath.$record->image_url)) { unlink($this->imageUpPath.$record->image_url);}
          if(file_exists($this->imageUpPath.$record->thumb_url)) { unlink($this->imageUpPath.$record->thumb_url);}

        	$this->modelNameAlias->delete(array('news_id' => $id));

        	$this->session->set_flashdata('message', 'News deleted!');
        	redirect($this->ctrlUrl);

        }

    }

    public function status($id, $status)
    {
      $id = $this->encrypt->decode($id);
      $record = $this->modelNameAlias->fetchRowFields(array('news_id'), array('news_id'=>$id));

      if(empty($record))
      {
        $this->session->set_flashdata('message', 'No record found!');
        redirect($this->ctrlUrl);
      }else{

        $save = array();
        $statusTxt = '';

        if($status == 'Y')
        {
           $save = array('show_status' => 1);
           $statusTxt = 'enabled';
        }else{
           $save = array('show_status' => 0);
           $statusTxt = 'disabled';
        }

        $this->modelNameAlias->save( $save, array('news_id' => $id));

        $this->session->set_flashdata('message', 'News ' . $statusTxt);
        redirect($this->ctrlUrl);

      }

    }

    public function handle_upload()
    {
        $config['upload_path'] = $this->imageUpPath;
        $config['allowed_types'] =  'jpg|jpeg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 1280;
        $config['max_height'] = 640;
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

                $resized = $img->resize(640, 320, 'outside');
                $resized->saveToFile($this->imageUpPath . $this->uploadFile['userfile']);

                $resizedThumb = $img->resize(278, 186, 'fill');
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

}
