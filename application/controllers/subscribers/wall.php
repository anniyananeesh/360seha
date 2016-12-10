<?php 

if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Wall extends CI_Controller {

	public $layout;
    public $menu_access;

    public function __construct()
    {

        parent::__construct();
        $this->layout = SUBSCRIBER_LAYOUT;
 
        $this->load->library('subscriber_service');
        
        $userSession = $this->session->userdata('subs_logged_in');

        if (empty($userSession)) {
            
            $this->session->set_userdata('refered_from', current_url());
            redirect(SUBSRIBER_LOGIN_URL);
        }
        
        $this->user = $userSession; 
        $this->root_login = $this->session->userdata('root_login');     //Check if logged in from administrator account
        
        $this->menu_access = $this->subscriber_service->get_subscriber_menu_access($this->encrypt->decode($this->user['subs_user_id']));
    }

    public function index()
    {
        $this->load->library('wall_service');
        
        $data['content'] = SUBSRIBER_URL.'wall/index';
        
        $data['title'] = 'Wall Posts';
        $data['sub_title'] = 'Manage your wall posts here';
        $data['wall_items'] = $this->wall_service->get_wall_items_by_user((int) $this->encrypt->decode($this->user['subs_user_id']));
        
        $this->load->view($this->layout, $data);
    }

    public function add()
    {
    	$this->load->library('wall_service');
        
        $data['content'] = SUBSRIBER_URL.'wall/add';
        
        $data['title'] = 'Create Wall Post';
        $data['sub_title'] = 'Manage your wall posts here'; 
        $error = false;
        $_POST['thumbfile'] = NULL;

        $usr = $this->subscriber_service->get_subscriber_by_pk((int) $this->encrypt->decode($this->user['subs_user_id']));
        if(Wall::get_instance()->input->post())
        {

        	$this->load->library('form_validation');

        	$this->form_validation->set_rules('title', 'Title English', 'trim|xss_clean|required');
        	$this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean|required');
        	$this->form_validation->set_rules('userfile', 'Wall Image', 'trim|xss_clean|callback_handle_upload');
 
            if (empty($_FILES['userfile']['name']))
	        {
	        	$error = true;
	        	$data['error'] = 'You must select an image';
	        }

	        $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error)
            {
            	$save = array(
            		TBL_WALL.'.title_en' => Wall::get_instance()->input->post('title'),
            		TBL_WALL.'.title_ar' => Wall::get_instance()->input->post('title_ar'),
                    TBL_WALL.'.type' => (int) $usr->subs_type,
            		TBL_WALL.'.subscriber' => (int) $this->encrypt->decode($this->user['subs_user_id']),
            		TBL_WALL.'.created_on' => date('Y-m-d h:i:s'),
            		TBL_WALL.'.updated_on' => date('Y-m-d h:i:s')
            	);

            	if($_POST['userfile'] != '' && $_POST['thumbfile'] != NULL)
            	{
            		$save[TBL_WALL.'.image_url'] =  $_POST['userfile'];
            		$save[TBL_WALL.'.thumb_url'] = $_POST['thumbfile'];
            	}

            	$this->wall_service->save($save);

            	$this->session->set_flashdata('message', 'New post added!');
              	redirect( SUBSRIBER_URL.'wall/');

            }
 
        }
        
        $this->load->view($this->layout, $data);
    }

    public function edit($id)
    {
    	$this->load->library('wall_service');
        
        $data['content'] = SUBSRIBER_URL.'wall/edit';
        
        $data['title'] = 'Update Wall Post';
        $data['sub_title'] = 'Manage your wall posts here'; 
        $error = false;
        $_POST['thumbfile'] = NULL;

        $id = $this->encrypt->decode($id);
        $data["record"] = $this->wall_service->get_wall_item_by_pk($id);
        $usr = $this->subscriber_service->get_subscriber_by_pk((int) $this->encrypt->decode($this->user['subs_user_id']));
        if(Wall::get_instance()->input->post())
        {

        	$this->load->library('form_validation');

        	$this->form_validation->set_rules('title', 'Title English', 'trim|xss_clean|required');
        	$this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean|required');
        	$this->form_validation->set_rules('userfile', 'Wall Image', 'trim|xss_clean|callback_handle_upload');
 
	        $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error)
            {
            	$save = array(
            		TBL_WALL.'.title_en' => Wall::get_instance()->input->post('title'),
            		TBL_WALL.'.title_ar' => Wall::get_instance()->input->post('title_ar'),
                    TBL_WALL.'.type' => (int) $usr->subs_type,
            		TBL_WALL.'.updated_on' => date('Y-m-d h:i:s')
            	);

            	if($_POST['userfile'] != '' && $_POST['thumbfile'] != NULL)
            	{
            		$save[TBL_WALL.'.image_url'] =  $_POST['userfile'];
            		$save[TBL_WALL.'.thumb_url'] =  $_POST['thumbfile'];
            	}

            	$where = array(
            		TBL_WALL.'.wall_id' => $id,
            		TBL_WALL.'.subscriber' => (int) $this->encrypt->decode($this->user['subs_user_id'])
            	);

            	$this->wall_service->save($save, $where);

            	$this->session->set_flashdata('message', 'Wall Post updated!');
              	redirect( SUBSRIBER_URL.'wall/');

            }
 
        }
        
        $this->load->view($this->layout, $data);
    }

    public function status($id,$status)
    {
    	$this->load->library('wall_service');
    	$id = $this->encrypt->decode($id);

        $record = $this->wall_service->get_wall_item_by_pk($id);

        if(!$record)
        {
        	redirect(ERROR_404);
            exit(1);
        }

        $save = array(
        	TBL_WALL.'.status' => (int) $status
    	);

        $where = array(
        	TBL_WALL.'.wall_id' => $id,
         	TBL_WALL.'.subscriber' => (int) $this->encrypt->decode($this->user['subs_user_id'])
       	);

       	$this->wall_service->save($save, $where);

      	$this->session->set_flashdata('message', 'Status of Wall Post => <strong>'.$record->title_en.'</strong> updated!');
      	redirect( SUBSRIBER_URL.'wall/');

    }

    public function delete($id)
    {
    	$this->load->library('wall_service');
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
        	TBL_WALL.'.wall_id' => $id
       	);

       	$this->wall_service->remove_item($where);

      	$this->session->set_flashdata('message', 'Wall Post => <strong>'.$record->title_en.'</strong> has been removed!');
      	redirect( SUBSRIBER_URL.'wall/');

    }

    public function handle_upload()
    {

        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/wall/';      //Fixing the upload directory
        $config['allowed_types'] =  'jpg|jpeg|png';                          //Configuring the allowed file types
        $config['max_size'] = 800;                                        //Setting the maximum upload file size
        $config['max_width'] = 640;
        $config['max_height'] = 640;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);                //Loaded the library and add the config
        
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $_POST['userfile'] = $upload_data['file_name'];
                $_POST['thumbfile'] = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
 
                //Load the WideImage Library
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

}