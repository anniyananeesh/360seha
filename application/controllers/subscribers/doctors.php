<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Doctors extends Account_Controller{
 
    protected $initImageConfig;
    protected $view;
    protected $table = TBL_SUBSCRIBERS;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'doctors';
        $this->load->library('config_service');
        $this->load->library('category_service');
        $this->load->model('specialization_model'); 
        $this->initImageConfig = $this->config_service->getImageConfig();
        $this->file_types = implode('|', explode(',', $this->initImageConfig['allowed_types']['value']));
    } 

    public function index()
    { 
        $this->load->model('category_model');
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Our Doctors Page';
        $this->data['sub_title'] = 'View your docotrs details here';
        $record = $this->data['user_details'];
        $this->data['doctors'] = $this->subscriber_service->get_mdl_ctr_doctors( $record->subs_title); 
        $this->load->view($this->layout, $this->data);
    }

    public function add()
    {
        $file_data = array();
        $this->data['content'] = $this->view.'/add';
        $this->data['title'] = 'Add new Doctor';
        $this->data['sub_title'] = 'Manage your doctors details here';

        //Load the basic image configuration from settings
        $this->data["initImageConfig"] = $this->initImageConfig;
        $this->data['initFileTypes'] = $this->file_types;

        $where_dept = array(
            TBL_DEPTS.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
            TBL_DEPTS.'.show_status' => 1
        );

        $this->data["splzns"] = $this->category_service->get_children(36); //Doctors primary key in category table
        $this->data['depts']  = $this->subscriber_service->getAllDepts(array('dept_id','dept_title'), $where_dept);
        $error = false;

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Doctor\'s Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Doctor\'s Arabic title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            $this->form_validation->set_rules('splzn[]', 'Specialization', 'trim|xss_clean'); 
            $this->form_validation->set_rules('exp', 'Experience', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dept', 'Department', 'trim|required|xss_clean');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
            $this->form_validation->set_rules('subs_languages', 'Languages Spoken', 'trim|required|xss_clean');
            $this->form_validation->set_rules('visiting', 'Doctor is visiting or not. If visiting please set from and to dates', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Basic description English', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Basic description Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_message('required', '%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->input->post('visiting') == 1 && ($this->input->post('dpd1') == '' || $this->input->post('dpd2') == ''))
            {
                $error = true;
                $this->data['error_visit'] = 'Enter the from and to dates for visiting doctor';
            }
            
            if($this->form_validation->run() == TRUE && !$error)
            {
                $record = $this->subscriber_service->get_subscriber_by_pk($this->encrypt->decode($this->user['user_id']));

                $profileUrl = str_replace('.', '', trim($this->input->post('title')));
                $profileUrl = str_replace(' ', '', $profileUrl);
                $profileUrl = strtolower($profileUrl);
                
                $save = array(
                    $this->table.'.subs_title' => $this->input->post('title'),
                    $this->table.'.subs_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.subs_cat_id' => 36,                    
                    $this->table.'.dept_fk' => $this->input->post('dept'),
                    $this->table.'.description' => $this->input->post('description'),
                    $this->table.'.description_ar' => $this->input->post('description_ar'),
                    $this->table.'.description_en_long' => $this->input->post('description'),
                    $this->table.'.description_en_long_ar' => $this->input->post('description_ar'), 
                    $this->table.'.subs_address_1' => $record->subs_address_1,
                    $this->table.'.subs_address_1_ar' => $record->subs_address_1_ar,
                    $this->table.'.subs_address_2' => $record->subs_address_2,
                    $this->table.'.subs_address_2_ar' => $record->subs_address_2_ar,
                    $this->table.'.subs_public_profile' => $profileUrl,   
                    $this->table.'.subs_lat_id' => $record->subs_lat_id,
                    $this->table.'.subs_long_id' => $record->subs_long_id,
                    $this->table.'.subs_type' => 1,
                    $this->table.'.subs_medical_center' => $record->subs_title,
                    $this->table.'.subs_experience' => ($this->input->post('exp') != '') ? $this->input->post('exp') : NULL,
                    $this->table.'.subs_gender' => ($this->input->post('gender') != '') ? $this->input->post('gender') : NULL,
                    $this->table.'.subs_languages' => $this->input->post('subs_languages'),                    
                    $this->table.'.subs_primary_contact' => $record->subs_primary_contact,
                    $this->table.'.city' => $record->city,
                    $this->table.'.subs_state' => $record->subs_state,
                    $this->table.'.subs_country' => 'AE',
                    $this->table.'.is_visiting' => ($this->input->post('visiting') != '') ? $this->input->post('visiting') : NULL,                    
                    $this->table.'.is_verified' => 0,
                    $this->table.'.is_approve' => 0,
                    $this->table.'.status' => 0,
                    $this->table.'.published' => 0,
                    $this->table.'.account_type' => 2,                    
                    $this->table.'.subs_created' => date('Y-m-d H:i:s'),
                    $this->table.'.subs_update' => date('Y-m-d H:i:s') 
                );

                if($this->input->post('visiting') == 1)
                {
                    $save[$this->table.'.visit_timing_from'] = date('Y-m-d', strtotime($this->input->post('dpd1')));
                    $save[$this->table.'.visit_timing_to'] = date('Y-m-d', strtotime($this->input->post('dpd2')));
                }
                
                //Check if there is any file uploaded
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    $save[$this->table.'.subs_profile_img'] = $_POST['userfile'];
                }

                $subs_id = $this->subscriber_service->save($save,$where);
 
                //Check if subscriber is saved correctly
                if($subs_id)
                {
                    $this->set_spl($this->input->post(), $subs_id);
                    $this->session->set_flashdata('message', 'Doctor details added!');
                    redirect($this->data['ctrl_url']);
                }
            }
        }
        
        $this->load->view($this->layout, $this->data); 
    }
 
    public function edit($id)
    {
        $file_data = array();
        $this->data['content'] = $this->view.'/edit';
        $this->data['title'] = 'Add new Doctor';
        $this->data['sub_title'] = 'Manage your doctors details here';
        $this->data["initImageConfig"] = $this->initImageConfig;
        $this->data['initFileTypes'] = $this->file_types;

        $id = $this->encrypt->decode($id);
        $this->data["dr"] = $this->subscriber_service->get_subscriber_by_pk($id);
        
        $where_dept = array(
            TBL_DEPTS.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
            TBL_DEPTS.'.show_status' => 1
        );

        $this->data["splzns"] = $this->category_service->get_children(36); //Doctors primary key in category table
        $this->data['depts']  = $this->subscriber_service->getAllDepts(array('dept_id','dept_title'), $where_dept);

        $where_spl = array( TBL_SUBS_SPECIALIZATION.'.subs_id' => $id);
        $this->data["splzn"] = $this->specialization_model->get($where_spl);

        $error = false;

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Doctor\'s Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Doctor\'s Arabic title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            $this->form_validation->set_rules('splzn[]', 'Specialization', 'trim|xss_clean');
            $this->form_validation->set_rules('dept', 'Department', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('exp', 'Experience', 'trim|required|xss_clean');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
            $this->form_validation->set_rules('subs_languages', 'Languages Spoken', 'trim|required|xss_clean');
            $this->form_validation->set_rules('visiting', 'Doctor is visiting or not. If visiting please set from and to dates', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Basic description English', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description_ar', 'Basic description Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_message('required', '%s required');
            $this->form_validation->set_error_delimiters('', '');

            if($this->input->post('visiting') == 1 && ($this->input->post('dpd1') == '' || $this->input->post('dpd2') == ''))
            {
                $error = true;
                $this->data['error_visit'] = 'Enter the from and to dates for visiting doctor';
            }
            
            if($this->form_validation->run() == TRUE && !$error)
            {
                $record = $this->subscriber_service->get_subscriber_by_pk($this->encrypt->decode($this->user['user_id']));

                $profileUrl = str_replace('.', '', trim($this->input->post('title')));
                $profileUrl = str_replace(' ', '', $profileUrl);
                $profileUrl = strtolower($profileUrl); 

                $save = array(
                    $this->table.'.subs_title' => $this->input->post('title'),
                    $this->table.'.subs_title_ar' => $this->input->post('title_ar'),
                    $this->table.'.description' => $this->input->post('description'),
                    $this->table.'.description_ar' => $this->input->post('description_ar'),
                    $this->table.'.description_en_long' => $this->input->post('description'),
                    $this->table.'.description_en_long_ar' => $this->input->post('description_ar'),
                    $this->table.'.dept_fk' => $this->input->post('dept'),
                    $this->table.'.subs_public_profile' => $profileUrl,                    
                    $this->table.'.subs_lat_id' => $record->subs_lat_id,
                    $this->table.'.subs_long_id' => $record->subs_long_id,
                    $this->table.'.subs_address_1' => $record->subs_address_1,
                    $this->table.'.subs_address_1_ar' => $record->subs_address_1_ar,
                    $this->table.'.subs_address_2' => $record->subs_address_2,
                    $this->table.'.subs_address_2_ar' => $record->subs_address_2_ar,
                    $this->table.'.subs_medical_center' => $record->subs_title,
                    $this->table.'.subs_primary_contact' => $record->subs_primary_contact,
                    $this->table.'.subs_experience' => ($this->input->post('exp') != '') ? $this->input->post('exp') : NULL,
                    $this->table.'.subs_gender' => ($this->input->post('gender') != '') ? $this->input->post('gender') : NULL,
                    $this->table.'.subs_languages' => $this->input->post('subs_languages'),
                    $this->table.'.city' => $record->city,
                    $this->table.'.subs_state' => $record->subs_state,
                    $this->table.'.subs_country' => 'AE',
                    $this->table.'.is_visiting' => ($this->input->post('visiting') != '') ? $this->input->post('visiting') : NULL,
                    $this->table.'.subs_update' => date('Y-m-d H:i:s')
                );

                if($this->input->post('visiting') == 1)
                {
                    $save[$this->table.'.visit_timing_from'] = date('Y-m-d', strtotime($this->input->post('dpd1')));
                    $save[$this->table.'.visit_timing_to'] = date('Y-m-d', strtotime($this->input->post('dpd2')));
                }
                
                //Check if there is any file uploaded
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    $save[$this->table.'.subs_profile_img'] = $_POST['userfile'];
                }

                $where = array(
                    $this->table.'.user_id' => $id
                );

                $this->subscriber_service->save($save,$where);
 
                //Check if subscriber is saved correctly
                if($id)
                {
                    $this->set_spl($this->input->post(), $id);
                    $this->session->set_flashdata('message', 'Doctor updated!');
                    redirect($this->data['ctrl_url']);
                }
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }
    
    public function delete($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_doctor_by_pk($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{
            
            $where = array(
                TBL_DOCTORS.'.id_dr' => $id
            );
            
            //Delete from the table after its found
            if($this->subscriber_service->unset_doctor($where))
            {
                $this->session->set_flashdata('message', 'Deleted!...doctor details deleted');
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
        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/profile/';
        $config['allowed_types'] =  $this->file_types;
        $config['max_size'] = $this->initImageConfig['max_size']['value'];
        $config['max_width'] = $this->initImageConfig['thumb_width']['value'];
        $config['max_height'] = $this->initImageConfig['thumb_height']['value'];
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


    //Set doctor specialization from array
    public function set_spl($post, $id = NULL)
    {
        if(count($post['splzn']) > 0)
        {
            $this->load->model('specialization_model');
            if($id != NULL)
            {
                $where = array(TBL_SUBS_SPECIALIZATION.'.subs_id' => $id);
                $this->specialization_model->delete($where);
            }
        
            $set_spl = array();
            foreach($post['splzn'] AS $spl)
            {array_push($set_spl, array( TBL_SUBS_SPECIALIZATION.'.subs_id' => $id, TBL_SUBS_SPECIALIZATION.'.spl_id' => (int) $spl));}
            $this->specialization_model->set($set_spl); 
        }
    }
}