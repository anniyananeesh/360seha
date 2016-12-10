<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insurance extends MY_Controller {
 
	protected $uploadFile;
    protected $table = TBL_GENERAL_INSURANCE;
    protected $ctrlUrl;
    protected $classViews = 'admin/insurance/';
 
    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/insurance/';
        $this->load->model('admin/insurance_model','modelNameAlias');
        $this->uploadFile = array();
    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;

        $data['title'] = 'Insurance companies Page';
        $data['sub_title'] = 'Manage your insurance companies here';
        $data['records'] = $this->modelNameAlias->fetchAll();
        $this->load->view($this->layout, $data);
    }

    public function add()
    {
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;

        $data['title'] = 'Add Insurance companies';
        $data['sub_title'] = 'Manage your insurance companies here';
        $error = false; 
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('link', 'Website link', 'trim|xss_clean'); 
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');

            if (empty($_FILES['userfile']['name']))
            {
                $error = true;
                $data['error'] = 'You must select an image';
            }

            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
               $save = array(
                    $this->table.'.ins_title' => $this->input->post('title'),
                    $this->table.'.ins_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.site_link' => $this->input->post('link'), 
                    $this->table.'.show_status' => 1, 
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
                     
                if($this->uploadFile['userfile'] != '' && $this->uploadFile['thumbfile'] != NULL)
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
                    $save[$this->table.'.thumb_url'] = $this->uploadFile['thumbfile'];
                } 

                $id = $this->modelNameAlias->save($save); 

                $this->session->set_flashdata('message', 'Insurance company added!');
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
        $data['sub_title'] = 'Manage your insurance companies';
        
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->modelNameAlias->fetchById($id);
        
        if($this->input->post())
        {  
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('link', 'Website link', 'trim|xss_clean'); 
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
               $save = array(
                    $this->table.'.ins_title' => $this->input->post('title'),
                    $this->table.'.ins_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.site_link' => $this->input->post('link'),  
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($this->uploadFile['userfile'] != '' && $this->uploadFile['thumbfile'] != NULL)
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
                    $save[$this->table.'.thumb_url'] =  $this->uploadFile['thumbfile'];
                }
               
                $where = array(
                    $this->table.'.ins_id' => $id
                );
 
                $this->modelNameAlias->save( $save, $where);
                $this->session->set_flashdata('message', 'Insurance company updated!');
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
                $this->table.'.ins_id' => $id
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
                $this->table.'.ins_id' => $id
            );

            unlink(UPLOAD_FOLDER.'insurance/'.$record->image_url);
            unlink(UPLOAD_FOLDER.'insurance/'.$record->thumb_url);

            if($this->modelNameAlias->delete($where))
            {
                $this->session->set_flashdata('message', 'Insurance deleted!');
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
        $config['upload_path'] = UPLOAD_FOLDER.'insurance/';
        $config['allowed_types'] =  'jpg|jpeg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 180;
        $config['max_height'] = 100;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $this->uploadFile['userfile'] = $upload_data['file_name'];
                $this->uploadFile['thumbfile'] = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
 
                //Load the WideImage Library
                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load(UPLOAD_FOLDER.'insurance/'.$this->uploadFile['userfile']);
 
                $resized = $img->resize(285, 285);
                $resized->saveToFile(UPLOAD_FOLDER.'insurance/'.$this->uploadFile['thumbfile']);
 
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