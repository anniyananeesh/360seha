<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends MY_Controller{

	protected $table = TBL_ARTICLES;
    protected $ctrlUrl;
    protected $classViews = 'admin/articles/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/articles/';
        $this->load->model('admin/articles_model','modelNameAlias');
        $this->uploadFile = array();
    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Articles Page';
        $data['sub_title'] = 'Manage your articles here';
        $data['records'] = $this->modelNameAlias->fetchAll();
        $this->load->view($this->layout, $data);
    }

    public function add()
    {
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Add Article';
        $data['sub_title'] = 'Manage your article page';
        $error = false;

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'News title', 'trim|xss_clean');
            $this->form_validation->set_rules('title_ar', 'News title arabic', 'trim|xss_clean');
						$this->form_validation->set_rules('publish_on', 'Language', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');

            if($this->input->post('title') == "" && $this->input->post('title_ar') == "")
            {
               $error = true;
               $data['error_title'] = 'Title in English or Arabic required';
            }

            if($this->input->post('description') == "" && $this->input->post('description_ar') == "")
            {
               $error = true;
               $data['error_description'] = 'Description in English or Arabic required';
            }

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
                    $this->table.'.title' => ($this->input->post('title') != "") ? $this->input->post('title'): NULL,
                    $this->table.'.title_ar' => ($this->input->post('title_ar') != "") ? $this->input->post('title_ar'): NULL,
                    $this->table.'.description' => ($this->input->post('description') != "") ? $this->input->post('description'): NULL,
                    $this->table.'.description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar'): NULL,
                    $this->table.'.publish_on' => $this->input->post('publish_on'),
										$this->table.'.show_status' => 1,
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($this->uploadFile['userfile'] != '')
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
                }

                $id = $this->modelNameAlias->save($save);

                $this->session->set_flashdata('message', 'Article added!');
                redirect($this->ctrlUrl);
            }
        }

        $this->load->view($this->layout, $data);
    }

    public function edit($id)
    {
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Add Article';
        $data['sub_title'] = 'Manage your articles page';

        $id = $this->encrypt->decode($id);
        $data['record'] = $this->modelNameAlias->fetchById($id);

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'News title', 'trim|xss_clean');
            $this->form_validation->set_rules('title_ar', 'News title arabic', 'trim|xss_clean');
						$this->form_validation->set_rules('publish_on', 'Language', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');

            if($this->input->post('title') == "" && $this->input->post('title_ar') == "")
            {
               $error = true;
               $data['error_title'] = 'Title in English or Arabic required';
            }

            if($this->input->post('description') == "" && $this->input->post('description_ar') == "")
            {
               $error = true;
               $data['error_description'] = 'Description in English or Arabic required';
            }

            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error)
            {

               $save = array(

                    $this->table.'.title' => ($this->input->post('title') != "") ? $this->input->post('title'): NULL,
                    $this->table.'.title_ar' => ($this->input->post('title_ar') != "") ? $this->input->post('title_ar'): NULL,
                    $this->table.'.description' => ($this->input->post('description') != "") ? $this->input->post('description'): NULL,
                    $this->table.'.description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar'): NULL,
										$this->table.'.publish_on' => $this->input->post('publish_on'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($this->uploadFile['userfile'] != '')
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
                }

                $where = array(
                    $this->table.'.articles_id' => $id
                );

                $this->modelNameAlias->save( $save, $where);

                $this->session->set_flashdata('message', 'Articles updated!');
                redirect($this->ctrlUrl);

            }

        }

        $this->load->view($this->layout, $data);

    }

    public function status($id,$status)
    {
        $id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchById($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);

        }else{

            $save = array(
                $this->table.'.show_status' => $status
            );

            $where = array(
                $this->table.'.articles_id' => $id
            );

            $this->modelNameAlias->save($save, $where);

            $this->session->set_flashdata('message', 'Status changed!');
            redirect($this->ctrlUrl);
        }
    }

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchById($id);

        if(!$record)
        {

            redirect(ERROR_404);
            exit(1);

        }else{

            $where = array(
                $this->table.'.articles_id' => $id
            );

            unlink(ARTICLES_UP_PATH.$record->image_url);
            unlink(ARTICLES_UP_PATH.$record->thumb_url);

            if($this->modelNameAlias->delete($where))
            {
                $this->session->set_flashdata('message', 'Article deleted!');
                redirect($this->ctrlUrl);
            }else{

                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrlUrl);
            }

        }

        $this->load->view($this->layout, $data);

    }

 	public function handle_upload()
    {
        $config['upload_path'] = ARTICLES_UP_PATH;
        $config['allowed_types'] =  'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1500;
        $config['max_height'] = 1000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $this->uploadFile['userfile'] = $upload_data['file_name'];

                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load(ARTICLES_UP_PATH.$this->uploadFile['userfile']);

                $resized = $img->resize(750, 500,'fill');
                $resized->saveToFile(ARTICLES_UP_PATH.$this->uploadFile['userfile']);

                return TRUE;
            }
            else
            {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return FALSE;
            }

        }
        else
        {
          return TRUE;
        }

    }

}
