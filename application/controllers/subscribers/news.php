<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class News extends Account_Controller{
    
    protected $view;
    protected $table = TBL_NOTES_PAGE;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'news';
    }

    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'News Page';
        $this->data['sub_title'] = 'Manage your News here';
        $where = array($this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']));
        $this->data['notes'] = $this->subscriber_service->get_notes($where);
        $this->load->view($this->layout, $this->data);
    }
    
    
    public function add()
    {
        $this->data['content'] = $this->view.'/add';
        $this->data['title'] = 'Add news';
        $this->data['sub_title'] = 'Manage your news page';
        $error = false;
 
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'News title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'News title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');

            if (empty($_FILES['userfile']['name']))
            {
                $error = true;
                $this->data['error'] = 'You must select an image';
            }

            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.notes_title' => $this->input->post('title'),
                    $this->table.'.notes_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.notes_description' => $this->input->post('description'),
                    $this->table.'.notes_description_ar' => $this->input->post('description_ar'),
                    $this->table.'.show_status' => 1,
                    $this->table.'.subscriber_type' => (int) $this->user['subs_type'],
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
                     
                if($_POST['userfile'] != '' && $_POST['thumbfile'] != NULL)
                {
                    $save[$this->table.'.image_url'] =  $_POST['userfile'];
                    $save[$this->table.'.thumb_url'] = $_POST['thumbfile'];
                }

                $notes_id = $this->subscriber_service->save_note($save);

                if($this->input->post('send'))
                {
                    $this->send_notification((int) $this->encrypt->decode($this->user['user_id']), $this->input->post());

                    $save = array(
                        $this->table.'.send' => 1
                    );

                    $where = array(
                        $this->table.'.notes_id' => $notes_id
                    );

                    $this->subscriber_service->save_note($save, $where);
                }

                $this->session->set_flashdata('message', 'News added!');
                redirect($this->data['ctrl_url']); 
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }
    
    
    public function edit($id)
    {
        $this->data['content'] = $this->view.'/edit';
        $this->data['title'] = 'Add news';
        $this->data['sub_title'] = 'Manage your news page';
        $id = $this->encrypt->decode($id);
        $this->data['record'] = $this->subscriber_service->get_note_by_pk($id);
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'News title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'News title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Description arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            { 
               $save = array(
                    $this->table.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table.'.notes_title' => $this->input->post('title'),
                    $this->table.'.notes_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.notes_description' => $this->input->post('description'),
                    $this->table.'.notes_description_ar' => $this->input->post('description_ar'),
                    $this->table.'.subscriber_type' => (int) $this->user['subs_type'],
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($_POST['userfile'] != '' && $_POST['thumbfile'] != NULL)
                {
                    $save[$this->table.'.image_url'] =  $_POST['userfile'];
                    $save[$this->table.'.thumb_url'] =  $_POST['thumbfile'];
                }
               
                $where = array(
                    $this->table.'.notes_id' => $id
                );
 
                $this->subscriber_service->save_note($save,$where);
                $this->session->set_flashdata('message','News updated!');
                redirect($this->data['ctrl_url']);
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }

    public function send($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_note_by_pk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{
            
            $news = array();
            $news['title'] = $record->notes_title;
            $news['description'] = $record->notes_description;

            $save = array(
                $this->table.'.send' => 1
            );

            $where = array(
                $this->table.'.notes_id' => $id
            );

            $this->subscriber_service->save_note($save, $where);
            $this->send_notification((int) $this->encrypt->decode($this->user['user_id']), $news);
            $this->session->set_flashdata('message', 'Mail Send!');
            redirect($this->data['ctrl_url']);
        }
    }
    
    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_note_by_pk($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{

            $where = array(
                $this->table.'.notes_id' => $id
            );

            unlink(UPLOAD_FOLDER.'subscribers/news/'.$record->image_url);
            unlink(UPLOAD_FOLDER.'subscribers/news/'.$record->thumb_url);
 
            if($this->subscriber_service->unset_note($where))
            {
                $this->session->set_flashdata('message', 'News deleted!');
                redirect($this->data['ctrl_url']);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
        }

        $this->load->view($this->layout, $this->data);
    }

    public function send_notification($subsId, $news)
    {
        $this->load->library('mail_service');
        $this->load->library('subscription_service');

        $subs = $this->subscriber_service->get_subscriber_by_pk($subsId);
        $emails = $this->subscription_service->get_followers($subsId);

        $mentry = array(

            "from" => 'info@360seha.com',
            "from_name" => '360Seha Newsletter',
            "reply_to" => 'no-reply@360seha.com',
            "reply_title" => 'No reply',
            "subject" => $subs->subs_title. ' just added a news on '.$news['title'],
            "alt_body" => "Plain text message",
            "to" => $subs->subs_email,
            "to_title" => $subs->subs_title
        );

        $query = array(
            "subs_title" => $subs->subs_title,
            "type" => 'News',
            "title" => $news['title'],
            "content" => character_limiter($news['description'], 500, '...'),
            "link" => base_url().$subs->subs_public_profile.'/news/'.$news['title']
        );
        
        $template = PROFILE_VIEW.'email_templates/notifications';
        $this->mail_service->Send( $query, $template, $mentry, $emails);
    }

    public function handle_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/news/';
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
                $img = WideImage::load(UPLOAD_FOLDER.'subscribers/news/'.$_POST['userfile']);
 
                $resized = $img->resize(285, 285);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/news/'.$_POST['thumbfile']);
 
                return true;
            }else{

                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        }else{
            return true;
        }
    }
}