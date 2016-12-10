<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sponsors extends MY_Controller {

    protected $thumbFile; 
    protected $table = TBL_SPONSORS;
    protected $ctrlUrl;
    protected $classViews = 'admin/sponsors/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/sponsors/';
        $this->thumbFile = NULL;
        $this->load->library('sponsor_service');
        $this->load->model('country_model','modelCountryAlias');
        $this->countries = $this->modelCountryAlias->fetchAll();
    }
    
    public function index()
    {
        $data = array();
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['countries'] = $this->countries;
        $data['title'] = 'Sponsor List';
        $data['records'] = $this->sponsor_service->get( array(), array("title_en","title_ar","country_fk","image_url", "thumb_url","sponsor_url","status","created_on","sponsor_id"));
        $this->load->view($this->layout, $data);
    }

    public function add()
    {
        $data = array();
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Add Sponsor';
        $data['countries'] = $this->countries;  
        $error = false;
 
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title English', 'trim|xss_clean|required');
            $this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean|required');
            $this->form_validation->set_rules('country_fk', 'Country', 'trim|xss_clean|required');
            $this->form_validation->set_rules('userfile', 'Sponsor Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_rules('url', 'Sponsor Website URL', 'trim|xss_clean|required');

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
                    $this->table.'.title_en' => $this->input->post('title'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.country_fk' => $this->input->post('country_fk'),
                    $this->table.'.sponsor_url' => $this->input->post('url'),
                    $this->table.'.created_on' => date('Y-m-d h:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d h:i:s')
                );

                if($_POST['userfile'] != '' && $this->thumbFile != NULL)
                {
                    $save[$this->table.'.image_url'] =  $_POST['userfile'];
                    $save[$this->table.'.thumb_url'] =  $this->thumbFile;
                }

                $this->sponsor_service->save($save);
                $this->session->set_flashdata('message', 'New sponsor added!');
                redirect($this->ctrlUrl);
            }
        }

        $this->load->view($this->layout, $data); 
    }

    public function edit($id)
    {
        $data = array();
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Update Sponsor';  
        $data['countries'] = $this->countries;  
        $error = false;

        $id = $this->encrypt->decode($id);
        $data['record'] = $this->sponsor_service->get_sponsor_by_pk($id);
 
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title English', 'trim|xss_clean|required');
            $this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean|required');
            $this->form_validation->set_rules('country_fk', 'Country', 'trim|xss_clean|required');
            $this->form_validation->set_rules('userfile', 'Sponsor Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_rules('url', 'Sponsor Website URL', 'trim|xss_clean|required');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error)
            {
                $save = array(
                    $this->table.'.title_en' => $this->input->post('title'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.country_fk' => $this->input->post('country_fk'),
                    $this->table.'.sponsor_url' => $this->input->post('url'),
                    $this->table.'.updated_on' => date('Y-m-d h:i:s')
                );

                if($_POST['userfile'] != '' && $this->thumbFile != NULL)
                {
                    $save[$this->table.'.image_url'] =  $_POST['userfile'];
                    $save[$this->table.'.thumb_url'] =  $this->thumbFile;
                }

                $where = array(
                    $this->table.'.sponsor_id' => $id
                );

                $this->sponsor_service->save($save,$where);
                $this->session->set_flashdata('message', 'Sponsor updated!');
                redirect($this->ctrlUrl);
            }
        }

        $this->load->view($this->layout, $data); 
    }

    public function status($id,$status)
    {
        $id = $this->encrypt->decode($id);
        $record = $this->sponsor_service->get_sponsor_by_pk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }

        $save = array(
            $this->table.'.status' => (int) $status
        );

        $where = array(
            $this->table.'.sponsor_id' => $id
        );

        $this->sponsor_service->save($save, $where);

        $this->session->set_flashdata('message', 'Status of sponsor => <strong>'.$record->title_en.'</strong> updated!');
        redirect($this->ctrlUrl);

    }

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);
        $record = $this->sponsor_service->get_sponsor_by_pk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }
    
        unlink(UPLOAD_FOLDER.'sponsors/'.$record->image_url);
        unlink(UPLOAD_FOLDER.'sponsors/'.$record->thumb_url);

        $where = array(
            $this->table.'.sponsor_id' => $id
        );

        $this->sponsor_service->remove($where);
        $this->session->set_flashdata('message', 'Sponsor => <strong>'.$record->title_en.'</strong> has been removed!');
        redirect($this->ctrlUrl);
    }

    public function handle_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'sponsors/';
        $config['allowed_types'] =  'jpg|jpeg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 300;
        $config['max_height'] = 400;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $_POST['userfile'] = $upload_data['file_name'];
                $this->thumbFile = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];

                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load(UPLOAD_FOLDER.'sponsors/'.$_POST['userfile']); 
                
                $resized = $img->resize(75, 100);
                $resized->saveToFile(UPLOAD_FOLDER.'sponsors/'.$this->thumbFile);

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