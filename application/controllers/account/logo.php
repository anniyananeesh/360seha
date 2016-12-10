<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logo extends AccountController
{
    protected $ctrlUrl;
    protected $imageUpPath;
	protected $imageShowPath;

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = '/account/logo';

        $this->imageShowPath = SUBS_IMAGE_SHOW_PATH;
        $this->imageUpPath = SUBS_IMAGE_PROFILE_UP_PATH;
    }
    
    public function index()
    {
    	$this->data['page'] = 'upload-logo';
    	$this->data['imageShowPath'] = $this->imageShowPath;

        $fields = array(
        	TBL_SUBSCRIBERS.'.published',
            TBL_SUBSCRIBERS.'.subs_uniq_token',
            TBL_SUBSCRIBERS.'.subs_profile_img as image'
        );  

        $userID = $this->encrypt->decode($this->user['user_id']);

        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->data['published'] = $record->published;
        $this->data['image'] = $record->image;

        if($this->input->post())
        { 
        	$this->load->library('form_validation');

            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    $save[TBL_SUBSCRIBERS.'.subs_profile_img'] = $_POST['userfile'];

                    $where = array(
	                	TBL_SUBSCRIBERS.'.user_id' => $userID
	                );

	                $this->modelUserAlias->save($save, $where);

	                if($record->image != NULL && file_exists($this->imageUpPath.$record->image))
	                {
	                	unlink($this->imageUpPath.$record->image);
	                }
                }

                $this->session->set_flashdata('message', 'Details updated!');
                redirect($this->ctrlUrl);       		
            }

        }

        $this->load->view($this->layout, $this->data);

    }


    public function handle_upload()
    {
        $config['upload_path'] = $this->imageUpPath;
        $config['allowed_types'] =  'jpg|png';
        $config['max_size'] = '1024';
        $config['max_width'] = '640';
        $config['max_height'] = '640';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $_POST['userfile'] = $upload_data['file_name'];
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