<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;

class Tips extends MY_Controller{

	protected $uploadFile;
    protected $table = TBL_GENERAL_TIPS;
    protected $ctrlUrl;
    protected $classViews = 'admin/tips/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/tips/';
        $this->load->model('admin/tips_model','modelNameAlias');
        $this->uploadFile = array();
    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Health Tips Page';
        $data['sub_title'] = 'Manage your health tips here';
        $data['records'] = $this->modelNameAlias->fetchAll();
        $this->load->view($this->layout, $data);
    }

    public function add()
    {
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Add Health Tip';
        $data['sub_title'] = 'Manage your health tips here';
        $error = false;

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');

            if (empty($_FILES['userfile']['name']))
            {
                $error = true;
                $data['error'] = 'You must select an image';
            }

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
                    $this->table.'.tips_title' => ($this->input->post('title') != "") ? $this->input->post('title') : NULL,
                    $this->table.'.tips_title_ar' => ($this->input->post('title_ar') != "") ? $this->input->post('title_ar') : NULL,
                    $this->table.'.tips_description' => ($this->input->post('description') != "") ? $this->input->post('description') : NULL,
                    $this->table.'.tips_description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar') : NULL,
                    $this->table.'.show_status' => 1,
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($this->uploadFile['userfile'] != '' && $this->uploadFile['thumbfile'] != NULL)
                {
                    $save[$this->table.'.image_url'] = $this->uploadFile['userfile'];
                    $save[$this->table.'.thumb_url'] = $this->uploadFile['thumbfile'];
                }

                $id = $this->modelNameAlias->save($save);

                if($this->input->post('send'))
                {
                    $record = $this->modelNameAlias->fetchById($id);
                    $this->send($record);

                    $save = array(
                        $this->table.'.send' => 1
                    );
                    $where = array(
                        $this->table.'.tips_id' => $id
                    );

                    $this->modelNameAlias->save($save, $where);
                }

                $this->session->set_flashdata('message', 'Health tip added!');
                redirect($this->ctrlUrl);

            }

        }

        $this->load->view($this->layout, $data);

    }

    public function edit($id)
    {
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Add tip';
        $data['sub_title'] = 'Manage your health tip page';
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->modelNameAlias->fetchById($id);

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|xss_clean');
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

            if($this->form_validation->run() == TRUE)
            {
               $save = array(
                    $this->table.'.tips_title' => ($this->input->post('title') != "") ? $this->input->post('title') : NULL,
                    $this->table.'.tips_title_ar' => ($this->input->post('title_ar') != "") ? $this->input->post('title_ar') : NULL,
                    $this->table.'.tips_description' => ($this->input->post('description') != "") ? $this->input->post('description') : NULL,
                    $this->table.'.tips_description_ar' => ($this->input->post('description_ar') != "") ? $this->input->post('description_ar') : NULL,
                    $this->table.'.send' => 0,
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($this->uploadFile['userfile'] != '' && $this->uploadFile['thumbfile'] != NULL)
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
                    $save[$this->table.'.thumb_url'] =  $this->uploadFile['thumbfile'];
                }

                $where = array(
                    $this->table.'.tips_id' => $id
                );

                $this->modelNameAlias->save( $save, $where);

                if($this->input->post('send'))
                {
                    $record = $this->modelNameAlias->fetchById($id);
                    $this->send($record);

                    $save = array(
                        $this->table.'.send' => 1
                    );
                    $where = array(
                        $this->table.'.tips_id' => $id
                    );

                    $this->modelNameAlias->save($save, $where);
                }

                $this->session->set_flashdata('message', 'Health tip updated!');
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
                $this->table.'.tips_id' => $id
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
                $this->table.'.tips_id' => $id
            );

            unlink(UPLOAD_FOLDER.'tips/'.$record->image_url);
            unlink(UPLOAD_FOLDER.'tips/'.$record->thumb_url);

            if($this->modelNameAlias->delete($where))
            {
                $this->session->set_flashdata('message', 'Health tip deleted!');
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
        $config['upload_path'] = UPLOAD_FOLDER.'tips/';
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
                $this->uploadFile['userfile'] = $upload_data['file_name'];
                $this->uploadFile['thumbfile'] = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];

                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load(UPLOAD_FOLDER.'tips/'.$this->uploadFile['userfile']);

                $resized = $img->resize(285, 285);
                $resized->saveToFile(UPLOAD_FOLDER.'tips/'.$this->uploadFile['thumbfile']);
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

    public function send_single($id)
    {
       $id = $this->encrypt->decode($id);
       $record = $this->modelNameAlias->fetchById($id);
       if(!$record){ redirect(ERROR_404); exit(1);}
       $this->send($record);
       $this->session->set_flashdata('message', 'Health tip <strong>'.$record->tips_title.'</strong> has been send as notification!');
       redirect($this->ctrlUrl);
    }

    public function send($record)
    {
        $message = ($record->tips_description == NULL) ? strip_tags($record->tips_description_ar): strip_tags($record->tips_description);
        $title = ($record->tips_title == NULL) ? $record->tips_title_ar: $record->tips_title;

        $config = new Config();
        $config->setApplicationId(ONESIGNAL_APP_ID);
        $config->setApplicationAuthKey(ONESIGNAL_AUTH_KEY);
        $config->setUserAuthKey(ONESIGNAL_USER_KEY);

        $api = new OneSignal($config);
        $tipsImageUrl = base_url().'/uploads/tips';

        $response = $api->notifications->add([
            'contents' => [
                'en' => stripslashes($message)
            ],
            'headings'=> [
                'en' => $title
            ],
            'big_picture' => ($record->image_url != NULL) ? $tipsImageUrl.$record->image_url : '',
            'included_segments' => ['All'],
            'data' => [
                'pushType' => 'tips',
                'url' => '#/app/tips'
            ]
        ]);
    }
}
