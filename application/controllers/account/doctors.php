<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctors extends AccountController
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
        $this->load->model(SITE_MODELS.'doctors_model', 'modelNameAlias');

        $this->ctrlUrl = '/account/doctors';
        $this->nextUrl = '/account/details';

        $fields = array(TBL_SUBSCRIBERS.'.published', TBL_SUBSCRIBERS.'.subs_title');
        $userID = $this->encrypt->decode($this->user['user_id']);
        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));

        $this->isPublished = $record->published;
        $this->userMainTitle = $record->subs_title;

        $this->imageUpPath = DOCTORS_UP_PATH;
        $this->imageShowPath = DOCTORS_SHOW_PATH;
				$this->table = TBL_DOCTORS;

				if(!empty($this->data['menuAccess']) && !in_array('doctors', $this->data['menuAccess']))
				{
					$this->session->set_flashdata('message', 'No access');
					redirect('account/basic');
					return;
				}

    }

    public function all()
    {
    	  $this->data['page'] = 'doctors/all';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['ctrlUrl'] = $this->ctrlUrl;
        $this->data['published'] = $this->isPublished;
        $this->data['imageShowPath'] = $this->imageShowPath;

        $this->data['records'] = $this->modelNameAlias->fetchFields(array('name_en','name_ar','specialization_en','specialization_ar','image1','id','is_active'), array('subscriber' => $this->encrypt->decode($this->user['user_id'])), array('orderby'=>'ASC'));

        $this->load->view($this->layout, $this->data);
    }

    public function add()
    {
    	  $this->data['page'] = 'doctors/add';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['ctrlUrl'] = $this->ctrlUrl;
        $this->data['published'] = $this->isPublished;

        if($this->input->post())
        {
        	  $this->data['post'] = $this->input->post();

        	  $this->load->library('form_validation');
        	  $this->form_validation->set_rules('name_en', 'Name English', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'Name Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('specialization_en', 'Specialization', 'trim|required|xss_clean');
						$this->form_validation->set_rules('specialization_ar', 'Specialization Arabic', 'trim|required|xss_clean');
						$this->form_validation->set_rules('url', 'URL', 'trim|xss_clean');

            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

            $this->form_validation->set_message('required', '%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

            		$save = array(
                    $this->table.'.name_en' => $this->input->post('name_en'),
                    $this->table.'.name_ar' => $this->input->post('name_ar'),
                    $this->table.'.specialization_en' => $this->input->post('specialization_en'),
                    $this->table.'.specialization_ar' => $this->input->post('specialization_ar'),
										$this->table.'.url' => $this->input->post('url'),
                    $this->table.'.subscriber' => (int) $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
										$this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                //Check if there is any file uploaded
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    $save[$this->table.'.image1'] = $_POST['userfile'];
                }

                $this->modelNameAlias->save($save);

                $this->session->set_flashdata('message', 'Doctor details added!');
                redirect($this->ctrlUrl.'/all');

            }

        }

        $this->load->view($this->layout, $this->data);
    }

		public function edit($id)
    {
    	  $this->data['page'] = 'doctors/edit';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['ctrlUrl'] = $this->ctrlUrl;
        $this->data['published'] = $this->isPublished;

				$id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchById($id);

				$post['name_en'] = $record->name_en;
				$post['name_ar'] = $record->name_ar;
				$post['specialization_en'] = $record->specialization_en;
				$post['specialization_ar'] = $record->specialization_ar;
				$post['url'] = $record->url;

				$this->data['post'] = $post;
				$this->data['image'] = $record->image1;
				$this->data['imageShowPath'] = $this->imageShowPath;

        if($this->input->post())
        {
        	  $this->data['post'] = $this->input->post();

        	  $this->load->library('form_validation');
        	  $this->form_validation->set_rules('name_en', 'Name English', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'Name Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('specialization_en', 'Specialization', 'trim|required|xss_clean');
						$this->form_validation->set_rules('specialization_ar', 'Specialization Arabic', 'trim|required|xss_clean');
						$this->form_validation->set_rules('url', 'URL', 'trim|xss_clean');

            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

            $this->form_validation->set_message('required', '%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
            		$save = array(
                    $this->table.'.name_en' => $this->input->post('name_en'),
                    $this->table.'.name_ar' => $this->input->post('name_ar'),
                    $this->table.'.specialization_en' => $this->input->post('specialization_en'),
                    $this->table.'.specialization_ar' => $this->input->post('specialization_ar'),
										$this->table.'.url' => $this->input->post('url'),
                    $this->table.'.subscriber' => (int) $this->encrypt->decode($this->user['user_id']),
										$this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                //Check if there is any file uploaded
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    $save[$this->table.'.image1'] = $_POST['userfile'];
                }

								$where = array(
										$this->table.'.id' => $id
								);

                $this->modelNameAlias->save($save,$where);

                $this->session->set_flashdata('message', 'Doctor details updated!');
                redirect($this->ctrlUrl.'/all');

            }

        }

        $this->load->view($this->layout, $this->data);
    }

		public function status($id, $status)
    {
	      $id = $this->encrypt->decode($id);
	      $record = $this->modelNameAlias->fetchRowFields(array('id'), array('id'=>$id));

	      if(empty($record))
	      {
		        $this->session->set_flashdata('message', 'No record found!');
		        redirect($this->ctrlUrl);

	      }else{

		        $save = array();
		        $statusTxt = '';

		        if($status == 'Y')
		        {
		           $save = array('is_active' => 1);
		           $statusTxt = 'enabled';
		        }else{
		           $save = array('is_active' => 0);
		           $statusTxt = 'disabled';
		        }

		        $this->modelNameAlias->save( $save, array('id' => $id));

		        $this->session->set_flashdata('message', 'Doctor ' . $statusTxt);
		        redirect($this->ctrlUrl.'/all');

	      }

    }

    public function delete($id)
    {
    		$id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchRowFields(array('image1','id'), array('id'=>$id));

        if(empty($record))
        {
        	$this->session->set_flashdata('message', 'No record found!');
        	redirect($this->ctrlUrl);
        }else{

        	$where = array(
        		$this->table.'.id' => $id
        	);

        	if(file_exists($this->imageUpPath.$record->image1)) { unlink($this->imageUpPath.$record->image1);}

        	$this->modelNameAlias->delete($where);

        	$this->session->set_flashdata('message', 'Doctor deleted!');
        	redirect($this->ctrlUrl.'/all');

        }

    }

    public function handle_upload()
    {
        $config['upload_path'] = $this->imageUpPath;
        $config['allowed_types'] =  'jpg|png';
        $config['max_size'] = 1024;
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

                //Load the WideImage Library
                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load($this->imageUpPath.$upload_data['file_name']);

                 // 250 X 250 pixels == > For profile page
                $resized = $img->resize(320, 320);
                $resized->saveToFile($this->imageUpPath.$upload_data['file_name']);

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
