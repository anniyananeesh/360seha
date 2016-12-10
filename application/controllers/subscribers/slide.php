<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Slide extends Account_Controller {

    protected $view;
    protected $table = TBL_SLIDES;
    protected $initImageConfig;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'slide';

        $this->load->library('slides_service');
        $this->load->library('config_service');
        $this->initImageConfig = $this->config_service->getImageConfig();
        $this->file_types = implode('|', explode(',', $this->initImageConfig['allowed_types']['value']));
    }

    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Slides Page';
        $this->data['sub_title'] = 'Manage your home page slides here';
        
        $where = array(
            $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id'])
        );
        $this->data['slides'] = $this->slides_service->get($where);
        $this->load->view($this->layout, $this->data);
    }

    public function add()
    {
        $this->data['content'] = $this->view.'/add';
        $this->data['title'] = 'Add Slide';
        $this->data['sub_title'] = 'Manage your home page banners here';
        $this->data["initImageConfig"] = $this->initImageConfig;
        $this->data['initFileTypes'] = $this->file_types;
 
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    require_once(APPPATH.'third_party/WideImage/WideImage.php');
                    $img = WideImage::load(UPLOAD_FOLDER.'subscribers/slides/'.$_POST['userfile']);
                    $resized = $img->resize(250, 190);
                    $resized->saveToFile(UPLOAD_FOLDER.'subscribers/slides/thumbs/'.$_POST['userfile']);

                    $save = array(
                        $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                        $this->table.'.img_url' => $_POST['userfile'],
                        $this->table.'.img_thumb' => $_POST['userfile'],
                        $this->table.'.status' => ($this->input->post('status')) ? 1 : 0,
                        $this->table.'.created_on' => date('Y-m-d H:i:s'),
                        $this->table.'.updated_on' => date('Y-m-d H:i:s')
                    );

                    $this->load->library('slides_service');
                    $this->slides_service->save($save);
                    $this->session->set_flashdata('flash_message', 'Slide added!');
                    redirect($this->data['ctrl_url']);
                }
            }
        }

        $this->load->view($this->layout, $this->data);
    }
    
    public function edit($id)
    { 
        $this->data['content'] = $this->view.'/edit';
        $this->data['title'] = 'Update slide';
        $this->data['sub_title'] = 'Manage your home page slides here';
        
        $id = $this->encrypt->decode($id);
        $this->data['record'] = $this->slides_service->get_slide_by_pk($id);
        
        $this->data["initImageConfig"] = $this->initImageConfig;
        $this->data['initFileTypes'] = $this->file_types;
 
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    require_once(APPPATH.'third_party/WideImage/WideImage.php');
                    $img = WideImage::load(UPLOAD_FOLDER.'subscribers/slides/'.$_POST['userfile']);
                    $resized = $img->resize(250, 190);
                    $resized->saveToFile(UPLOAD_FOLDER.'subscribers/slides/thumbs/'.$_POST['userfile']);

                    $save = array(
                        $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                        $this->table.'.img_url' => $_POST['userfile'],
                        $this->table.'.img_thumb' => $_POST['userfile'],
                        $this->table.'.status' => ($this->input->post('status')) ? 1 : 0,
                        $this->table.'.created_on' => date('Y-m-d H:i:s'),
                        $this->table.'.updated_on' => date('Y-m-d H:i:s')
                    );

                    $where = array(
                        $this->table.'.id' => $id
                    );

                    $this->load->library('slides_service');
                    $this->slides_service->save($save,$where);
                    $this->session->set_flashdata('flash_message', 'Slide updated!');
                    redirect($this->data['ctrl_url']);
                }
            }
        }

        $this->load->view($this->layout, $this->data);
    }
    
    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->slides_service->get_slide_by_pk($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{

            if($this->slides_service->unset_slide($id))
            {
                $this->session->set_flashdata('flash_message', 'Slide deleted!');
                redirect($this->data['ctrl_url']);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
        }

        $this->load->view($this->layout, $this->data);
    }

    public function handle_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/slides/';      //Fixing the upload directory
        $config['allowed_types'] =  $this->file_types;                          //Configuring the allowed file types
        $config['max_size'] = 1024;                                        //Setting the maximum upload file size
        $config['max_width'] = 720;
        $config['max_height'] = 480;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);                //Loaded the library and add the config
        
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
            $this->form_validation->set_message('handle_upload', 'Please upload an image');
            return false;
        }

    }
    
}