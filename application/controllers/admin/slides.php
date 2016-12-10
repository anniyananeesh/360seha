<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Slides extends MY_Controller{

    protected $table = TBL_APP_SLIDES;
    protected $ctrlUrl;
    protected $classViews = 'admin/slides/';
	protected $uploadFile;
 
    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/slides/';
        $this->load->model('admin/slides_model','modelNameAlias');
        $this->load->model('admin/department_model','modelDeptAlias');
        $this->load->model('admin/slide_dept_model', 'modelSlideDeptAlias');

        $this->uploadFile = array();

    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Featured Banner Management';
        $data['sub_title'] = 'Manage your featured banner here';
        $data['records'] = $this->modelNameAlias->fetchAll(array(), array(), null, null, array());
        $this->load->view($this->layout, $data);
    }

    public function add()
    {
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Add featured banner';
        $data['sub_title'] = 'Manage your featured banner page'; 

        $data['department'] = $this->modelDeptAlias->fetchAll(array('show_status' => 1));

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.image_url' => $this->uploadFile['userfile'], 
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                $id = $this->modelNameAlias->save($save);

                $saveBannerDept = array();
                $departments = $this->input->post('dept_fk');
 
                foreach ($departments as $key => $value) 
                {
                    array_push($saveBannerDept, array(
                        'banner_id' => $id,
                        'dept_id' => $value
                    ));
                }

                $this->modelSlideDeptAlias->setBannerDepts($saveBannerDept);

                $this->session->set_flashdata('message', 'News added!');
                redirect($this->ctrlUrl);
            }
        }
        
        $this->load->view($this->layout, $data);
    }

    public function edit($id)
    {
        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Update featured banner';
        $data['sub_title'] = 'Manage your featured banner page';
        
        $id = $this->encrypt->decode($id);
        $data['record'] = $record = $this->modelNameAlias->fetchById($id);
        $data['department'] = $this->modelDeptAlias->fetchAll(array('show_status' => 1));

        $data['chosen_department'] = $this->modelSlideDeptAlias->getDeptsFromBannerId($id);
 
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE && !$error)
            {
                $save = array(
                    $this->table.'.image_url' => ($this->uploadFile['userfile'] != '' && $this->uploadFile['thumbfile'] != NULL) ? $this->uploadFile['userfile'] : $record->image_url,
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
               
                $where = array(
                    $this->table.'.id' => $id
                );
 
                $this->modelNameAlias->save( $save, $where);

                $this->modelSlideDeptAlias->delete($id);

                $saveBannerDept = array();
                $departments = $this->input->post('dept_fk');

                foreach ($departments as $key => $value) 
                {
                    array_push($saveBannerDept, array(
                        'banner_id' => $id,
                        'dept_id' => $value
                    ));
                } 

                $this->modelSlideDeptAlias->setBannerDepts($saveBannerDept);

                $this->session->set_flashdata('message', 'Slide updated!');
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
                $this->table.'.is_active' => $status
            );

            $where = array(
                $this->table.'.id' => $id
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
                $this->table.'.id' => $id
            );

            unlink(UPLOAD_FOLDER.'appslides/'.$record->image_url); 
 
            if($this->modelNameAlias->delete($where))
            {
                $this->modelSlideDeptAlias->delete($id);
                
                $this->session->set_flashdata('message', 'Slide deleted!');
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
        $config['upload_path'] = UPLOAD_FOLDER.'appslides/';
        $config['allowed_types'] =  'jpg|jpeg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 640;
        $config['max_height'] = 400;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $this->uploadFile['userfile'] = $upload_data['file_name']; 
                return true;
            }
            else
            {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        }

    }

}