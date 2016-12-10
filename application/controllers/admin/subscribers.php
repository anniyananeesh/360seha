<?php 
if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Subscribers extends MY_Controller
{
    protected $init;
    protected $file_types;
    protected $config_general;
    protected $initImageConfig;
    protected $subsType;
    protected $ctrlUrl;

    public function __construct() {
        parent::__construct();
        $this->init = parent::getImageConfig();
        $this->config_general = $this->getGeneralConfig();
        $this->initImageConfig = $this->getImageConfig();
        $this->file_types = implode('|', explode(',', $this->init['allowed_types']['value']));

        $this->load->model(SITE_MODELS.'category_model', 'modelCategoryAlias');
        $this->load->model(SITE_MODELS."country_model", 'modelCountryAlias');
        $this->load->model(SITE_MODELS."subscriber_model", 'modelUserAlias');
        $this->load->model(SITE_MODELS."city_model", 'modelCityAlias');

        $this->load->model(SITE_MODELS.'department_model', 'modelDeptAlias');
        $this->load->model(SITE_MODELS."Department_user_model", 'modelDeptUserAlias');

        $this->ctrlUrl = HOST_URL.'/admin/subscribers/';

        $this->load->library('json');
    }
    
    public function index()
    {
        $data['content'] = 'admin/subscribers/index';
        $data['title'] = 'Subscribers';
        
        $this->load->library('subscriber_service');
        $this->load->library('category_service');
        $this->load->library('encrypt');
        $this->load->library('subscriber_timing_service');
        $this->load->library('time_service');
        
        $data['categories'] = $this->modelCategoryAlias->fetchFields(array('name as name_en','name_ar', 'id_category'),array('id_category_parent IS NULL' => NULL), array('id_category'=>'ASC'));

        $limit = (isset($_GET['limit'])) ? $_GET['limit'] : null;
        
        $join = array(
            array('table' => TBL_CATEGORY, 'condition' => TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'join_type' => 'left'),
            array('table' => TBL_CITY, 'condition' => TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'join_type' => 'left')
        );
        
        if($this->input->post())
        {

            $where = array();

            if($this->input->post('subs_type') != '')
            {
                $where[TBL_SUBSCRIBERS.'.subs_cat_id'] = $this->input->post('subs_type'); 
            }

            if($this->input->post('subs_title') != '')
            {
                $where[TBL_SUBSCRIBERS.'.subs_title LIKE '] = $this->input->post('subs_title') . '%'; 
            }
 
            $data['records'] = $this->modelUserAlias->fetchAll($where, array(TBL_SUBSCRIBERS . '.user_id'=>'DESC'), $limit, null, $join);
            $count = count($data['records']);
            
        }else{
            $data['records'] = $this->modelUserAlias->fetchAll(array(), array(TBL_SUBSCRIBERS . '.user_id'=>'DESC'), $limit, null, $join);
            $count = count($data['records']);
        }
        
        //$this->getPagination('', $this->config_general['search_per_page']['value'],(int) $count);
        
        $this->load->view($this->layout, $data);
        
    }
    
    public function create()
    {

        $data = array();
        
        $data['content'] = 'admin/subscribers/create';
        $data['title'] = 'Subscribers - Create';
        $data['sub_title'] = 'Add new subscriber here';
        $data['config'] = $this->init;
        
        $data['categories'] = $this->modelCategoryAlias->fetchFields(array('name as name_en','name_ar', 'id_category'),array('id_category_parent IS NULL' => NULL), array('orderby'=>'ASC'));

        //Load all the departments
        $data['departments'] = $this->modelDeptAlias->fetchFields(array('dept_id','dept_title as dept_title_en', 'dept_title_ar'),array('show_status'=>1), array('dept_id'=>'DESC'));

        if($this->input->post())
        {
            $data['post'] = $this->input->post();
            $departments_added = $this->input->post('departments');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('name_en', 'Name English', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('name_ar', 'Name Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

            $this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|valid_email');
            $this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|required|xss_clean'); 

            $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|xss_clean');
            $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|xss_clean'); 

            $this->form_validation->set_rules('description_en', 'Description', 'trim|xss_clean');

            //Check if an image is uploaded aloing
            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

                if(empty($departments_added))
                {
                    $data['Error'] = 'Y';
                    $data['MSG'] = 'Please choose your departments'; 
                }
                else
                {
                    $formatted_address1 = $this->getAddress($this->input->post('latitude'), $this->input->post('longitude'));
                    $formatted_address = explode('-', $formatted_address1);

                    $country_title = trim($formatted_address[count($formatted_address) - 1]);
                    $city_title = trim($formatted_address[count($formatted_address) - 2]);

                    //Get the data from db based on the id
                    $country = $this->modelCountryAlias->fetchRow(array('name_en'=> $country_title));
                    $city = $this->modelCityAlias->fetchRow(array('name'=> $city_title, 'country_fk' => $country->id));
     
                    $country = $country->id;
                    $city = $city->id; 

                    $save = array(
                        TBL_SUBSCRIBERS.'.subs_title' => $this->input->post('name_en'),
                        TBL_SUBSCRIBERS.'.subs_title_ar' => $this->input->post('name_ar'),
                        TBL_SUBSCRIBERS.'.subs_public_profile' => preg_replace('/\s+/', '', trim(strtolower($this->input->post('name_en')))),
                        TBL_SUBSCRIBERS.'.subs_cat_id' => $this->input->post('category'),
                        TBL_SUBSCRIBERS.'.subs_email' => $this->input->post('email'), 
                        TBL_SUBSCRIBERS.'.subs_primary_contact' => $this->input->post('contact_no'), 
                        TBL_SUBSCRIBERS.'.subs_lat_id' => $this->input->post('latitude'),
                        TBL_SUBSCRIBERS.'.subs_long_id' => $this->input->post('longitude'),
                        TBL_SUBSCRIBERS.'.description_en_long' => $this->input->post('description_en'),
                        TBL_SUBSCRIBERS.'.subs_country' => $country,
                        TBL_SUBSCRIBERS.'.subs_state' => $city, 
                        TBL_SUBSCRIBERS.'.subs_address_1' => $formatted_address1, 
                        TBL_SUBSCRIBERS.'.subs_created' => date('Y-m-d H:i:s'),
                        TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s'),
                    );  

                    //Check if there is any file uploaded
                    if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                    {
                        $save[TBL_SUBSCRIBERS.'.subs_profile_img'] = $_POST['userfile'];
                    }

                    $userID = $this->modelUserAlias->save($save);

                    $save_depts = array();

                    #Put departments with user
                    if(count($departments_added) > 0 && !empty($departments_added))
                    {
                        foreach ($departments_added as $key => $value) 
                        {
                            array_push($save_depts, array('user_id'=>$userID, 'dept_id'=>$value)); 
                        }

                        $this->modelDeptUserAlias->saveDept($save_depts);
                    }
                    
                    $this->session->set_flashdata('message', 'Subscriber added!');
                    redirect($this->ctrlUrl);

                }

            }   

        } 

        
        $this->load->view($this->layout, $data);

    }

    public function edit($id)
    {

        $data = array();
        
        $data['content'] = 'admin/subscribers/edit';
        $data['title'] = 'Subscribers - Update';
        $data['sub_title'] = 'Update subscriber here';
        $data['config'] = $this->init;

        $id = $this->encrypt->decode($id);
        $record = $this->modelUserAlias->fetchById($id);
        
        $data['categories'] = $this->modelCategoryAlias->fetchFields(array('name as name_en','name_ar', 'id_category'),array('id_category_parent IS NULL' => NULL), array('id_category'=>'ASC'));

        //Load all the departments
        $data['departments'] = $this->modelDeptAlias->fetchFields(array('dept_id','dept_title as dept_title_en', 'dept_title_ar'),array('show_status'=>1), array('dept_id'=>'DESC'));

        $post['departments'] = $this->modelDeptUserAlias->getUserDeptsId($id);
        $post['name_en'] = $record->subs_title;
        $post['name_ar'] = $record->subs_title_ar;
        $post['category'] = $record->subs_cat_id;
        $post['email'] = $record->subs_email;
        $post['contact_no'] = $record->subs_primary_contact;
        $post['latitude'] = $record->subs_lat_id;
        $post['longitude'] = $record->subs_long_id;
        $post['description_en'] = $record->description_en_long;

        $data['post'] = $post; 
        $data['image_url'] = $record->subs_profile_img;
        $data['image_show_path'] = base_url() . 'uploads/subscribers/profile/';

        if($this->input->post())
        {
            $data['post'] = $this->input->post();
            $departments_added = $this->input->post('departments');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('name_en', 'Name English', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('name_ar', 'Name Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

            $this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|valid_email');
            $this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|required|xss_clean'); 

            $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|xss_clean');
            $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|xss_clean'); 

            $this->form_validation->set_rules('description_en', 'Description', 'trim|xss_clean');

            //Check if an image is uploaded aloing
            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

                if(empty($departments_added))
                {
                    $data['Error'] = 'Y';
                    $data['MSG'] = 'Please choose your departments'; 
                }
                else
                {
                    $formatted_address1 = $this->getAddress($this->input->post('latitude'), $this->input->post('longitude'));
                    $formatted_address = explode('-', $formatted_address1);

                    $country_title = trim($formatted_address[count($formatted_address) - 1]);
                    $city_title = trim($formatted_address[count($formatted_address) - 2]);

                    //Get the data from db based on the id
                    $country = $this->modelCountryAlias->fetchRow(array('name_en'=> $country_title));
                    $city = $this->modelCityAlias->fetchRow(array('name'=> $city_title, 'country_fk' => $country->id));
     
                    $country = $country->id;
                    $city = $city->id; 

                    $save = array(
                        TBL_SUBSCRIBERS.'.subs_title' => $this->input->post('name_en'),
                        TBL_SUBSCRIBERS.'.subs_title_ar' => $this->input->post('name_ar'),
                        TBL_SUBSCRIBERS.'.subs_public_profile' => preg_replace('/\s+/', '', trim(strtolower($this->input->post('name_en')))),
                        TBL_SUBSCRIBERS.'.subs_cat_id' => $this->input->post('category'),
                        TBL_SUBSCRIBERS.'.subs_email' => $this->input->post('email'), 
                        TBL_SUBSCRIBERS.'.subs_primary_contact' => $this->input->post('contact_no'), 
                        TBL_SUBSCRIBERS.'.subs_lat_id' => $this->input->post('latitude'),
                        TBL_SUBSCRIBERS.'.subs_long_id' => $this->input->post('longitude'),
                        TBL_SUBSCRIBERS.'.description_en_long' => $this->input->post('description_en'),
                        TBL_SUBSCRIBERS.'.subs_country' => $country,
                        TBL_SUBSCRIBERS.'.subs_state' => $city, 
                        TBL_SUBSCRIBERS.'.subs_address_1' => $formatted_address1, 
                        TBL_SUBSCRIBERS.'.subs_created' => date('Y-m-d H:i:s'),
                        TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s'),
                    );  

                    //Check if there is any file uploaded
                    if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                    {
                        $save[TBL_SUBSCRIBERS.'.subs_profile_img'] = $_POST['userfile'];
                    }

                    $this->modelUserAlias->save( $save, array(TBL_SUBSCRIBERS.'.user_id' => $id));

                    $save_depts = array();

                    #Put departments with user
                    if(count($departments_added) > 0 && !empty($departments_added))
                    { 
                        $this->modelDeptUserAlias->removeDept($id);

                        foreach ($departments_added as $key => $value) 
                        {
                            array_push($save_depts, array('user_id'=>$id, 'dept_id'=>$value)); 
                        }

                        $this->modelDeptUserAlias->saveDept($save_depts);
                    }
                    
                    $this->session->set_flashdata('message', 'Subscriber updated!');
                    redirect($this->ctrlUrl);
                }

            }   

        } 

        
        $this->load->view($this->layout, $data);

    }

    public function getAddress($lat,$lng)
    {
        $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
        $json = @file_get_contents($url);
        $data=json_decode($json);
        $status = $data->status;
        
        if($status=="OK")
        {
            return $data->results[0]->formatted_address;
        }
        else
        {
            return false;
        }
    }

    public function validateEmail($email)
    {
        if($this->modelUserAlias->isExist(array('subs_email'=>$email)))
        {
            $this->form_validation->set_message('validateEmail', 'Wait ! this email is already registered');
            return false;
        }else{
            return true;
        }
    }

    public function featured($id)
    {  
        $data = array();

        $id = $this->encrypt->decode($id);
        $record = $this->modelUserAlias->fetchById($id);
        
        $data['content'] = 'admin/subscribers/featured';
        $data['title'] = 'Mark as featured - ' . $record->subs_title;
        $data['sub_title'] = 'Create login and make subscriber featured';
 
        if(($record->subs_username != NULL && $record->subs_username != '') && ($record->subs_pwd_hash != NULL && $record->subs_pwd_hash != '') && ($record->subs_uniq_token != NULL && $record->subs_uniq_token != ''))
        {
            $save = array( 
                TBL_SUBSCRIBERS.'.is_featured' => 1,
                TBL_SUBSCRIBERS.'.status' => 1,
                TBL_SUBSCRIBERS.'.account_type' => 1
            );

            $this->modelUserAlias->save( $save, array(TBL_SUBSCRIBERS.'.user_id' => $id));
            $this->session->set_flashdata('message', '<h4><i class="fa fa-bell-alt"></i>Done!</h4><p>Featured Status of <b>'.$record->subs_title.'</b> has been changed to featured...!</p>');
            redirect( ADMIN_URL.'subscribers/');
            exit(1);
        }

        if($this->input->post())
        {
                $data['post'] = $this->input->post();
     
                $this->load->library('form_validation');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_validate_username');
                $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|matches[cpassword]|required');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required'); 

                $this->form_validation->set_message('required','Required %s field');
                $this->form_validation->set_message('matches','Passwords should be the same...!');

                $this->form_validation->set_error_delimiters('', '');
     
                if($this->form_validation->run() == TRUE)
                {   

                    $this->load->model('auth_model');
                    $uniq_token = $this->auth_model->generate_unique_token($this->input->post('username'));
                    $pwd_hash = $this->auth_model->generate_password_hash($this->input->post('password'),$uniq_token);

                    //Preparing Save data array
                    $save = array( 
                        TBL_SUBSCRIBERS.'.subs_username' => $this->input->post('username'),
                        TBL_SUBSCRIBERS.'.subs_pwd_hash' => $pwd_hash,
                        TBL_SUBSCRIBERS.'.subs_uniq_token' => $uniq_token,
                        TBL_SUBSCRIBERS.'.r_password' => $this->input->post('password'),
                        TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s'),
                        TBL_SUBSCRIBERS.'.is_featured' => 1,
                        TBL_SUBSCRIBERS.'.status' => 1,
                        TBL_SUBSCRIBERS.'.account_type' => 1
                    );

                    $this->modelUserAlias->save( $save, array(TBL_SUBSCRIBERS.'.user_id' => $id));

                    //Send an email to user with the information added
                    $this->load->library('email');
                    $this->config->load('email',true);
                    $this->email->from(INFO_EMAIL);
                    $this->email->to($record->subs_email);
                    $this->email->subject(SITE_NAME.' - Your login information with 360Seha.');

                    $title = $record->subs_title;
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    include_once(MISC_PATH."/emails.php");
                    $message = $slogin_info;

                    $this->email->message($message);
                    $this->email->send();

                    $this->session->set_flashdata('message', '<h4><i class="fa fa-bell-alt"></i>Done!</h4><p>Featured Status of <b>'.$record->subs_title.'</b> has been changed to featured...!</p>');
                    redirect( ADMIN_URL.'subscribers/');
                
                }

        } 

        $this->load->view($this->layout, $data); 
 
    }

    public function unfeatured($id)
    {
 
        $id = $this->encrypt->decode($id);
        $record = $this->modelUserAlias->fetchById($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        } 
        
        $save = array(
            TBL_SUBSCRIBERS.'.is_featured' => 0,
            TBL_SUBSCRIBERS.'.status' => 0,
            TBL_SUBSCRIBERS.'.account_type' => 2,
        ); 

        $where = array(
            TBL_SUBSCRIBERS.'.user_id' => $id
        );

        //Save The subscriber in dictionary 
        $saveDict = array(
            $record->subs_title,
            $record->subs_title_ar
        );

        $this->json->jsonRemoveData($saveDict);
        $this->json->jsonWriteData($saveDict);

        $this->modelUserAlias->save( $save, $where);
        $this->session->set_flashdata('message', '<h4><i class="fa fa-bell-alt"></i>Done!</h4><p>Featured Status of <b>'.$record->subs_title.'</b> has been changed to Unfeatured...!</p>');
        redirect( ADMIN_URL.'subscribers/'); 
 
    }
    
    public function delete($id)
    {
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'subscribers_delete'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        $this->load->library('encrypt');
        $this->load->library('subscriber_service');
        
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_subscriber_by_pk($id);
        if(!$record){
            show_404();
        }else{
            $where = array(TBL_SUBSCRIBERS.'.user_id' => $id);
            if($this->subscriber_service->delete($where))
            {
                //Save The subscriber in dictionary 
                $saveDict = array(
                    $record->subs_title,
                    $record->subs_title_ar
                );

                $this->json->jsonRemoveData($saveDict); 

                $this->session->set_flashdata('message', 'Deleted!');
                redirect(ADMIN_URL.'subscribers/');              
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect(ADMIN_URL.'subscribers/');
            }
        }
    }

    public function show_map($user_id,$status)
    {
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'subscribers_edit'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        $this->load->library('encrypt');
        $this->load->library('subscriber_service');
        
        $id = $this->encrypt->decode($user_id);        
        $record = $this->subscriber_service->get_subscriber_by_pk($id);
        
        if(!$record){
            show_404();
        }else{
            $save = array(TBL_SUBSCRIBERS.'.show_on_map' => $status);
            $where = array(TBL_SUBSCRIBERS.'.user_id' => $id);

            if($this->subscriber_service->save( $save, $where))
            {
                $this->session->set_flashdata('message', 'Show on map status Changed!');
                redirect(ADMIN_URL.'subscribers/');              
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect(ADMIN_URL.'subscribers/');
            }
        }
    }
    
    public function status( $user_id, $status)
    {
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'subscribers_edit'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        $this->load->library('encrypt'); 
        
        $id = $this->encrypt->decode($user_id);        
        $record = $this->modelUserAlias->fetchById($id);
        
        if(!$record){
            show_404();
        }else{
            $save = array(TBL_SUBSCRIBERS.'.status' => $status);
            $where = array(TBL_SUBSCRIBERS.'.user_id' => $id);

            if($this->modelUserAlias->save( $save, $where))
            {
                $this->session->set_flashdata('message', 'Status Changed!');
                redirect(ADMIN_URL.'subscribers/');              
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect(ADMIN_URL.'subscribers/');
            }
        }
    }
    
    public function publish( $user_id, $status)
    {
        $this->load->library('encrypt'); 
        
        $id = $this->encrypt->decode($user_id);        
        $record = $this->modelUserAlias->fetchById($id);
 
        if(!$record){
            show_404();
        }else{
            
            if($status == 1)
            {
                $save = array(TBL_SUBSCRIBERS.'.status' => 1, TBL_SUBSCRIBERS.'.is_verified' => 1, TBL_SUBSCRIBERS.'.is_approve' => 1, TBL_SUBSCRIBERS.'.published' => 1);

                //Save The subscriber in dictionary 
                $saveDict = array(
                    $record->subs_title,
                    $record->subs_title_ar
                );

                $this->json->jsonRemoveData($saveDict);
                $this->json->jsonWriteData($saveDict);

            }else{
                $save = array(TBL_SUBSCRIBERS.'.status' => 1, TBL_SUBSCRIBERS.'.is_verified' => 1, TBL_SUBSCRIBERS.'.is_approve' => 1, TBL_SUBSCRIBERS.'.published' => 0);
            }
            
            $where = array(TBL_SUBSCRIBERS.'.user_id' => $id);

            if($this->modelUserAlias->save( $save, $where))
            {
                $this->session->set_flashdata('message', 'Publish Status Changed!');
                redirect(ADMIN_URL.'subscribers/');              
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect(ADMIN_URL.'subscribers/');
            }
        }
    }


    public function profile($id)
    {
        
        $this->session->set_userdata(
           array(
               'root_login' => true,
               'subscriber' => $id
           )
        );

        redirect('account/login');
    }
    
    public function grp_action()
    {
        $post = $this->input->post();

        switch($post['action'])
        {
            case 'approve':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(
                            TBL_SUBSCRIBERS.'.status' => 1,
                            TBL_SUBSCRIBERS.'.is_verified' => 1,
                            TBL_SUBSCRIBERS.'.is_approve' => 1,
                            TBL_SUBSCRIBERS.'.published' => 1
                        );
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers has been approved!');
                    redirect('admin/subscribers/');
                }else{
                    
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
                
            break;
            
            case 'disapprove':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(
                            TBL_SUBSCRIBERS.'.status' => 0,
                            TBL_SUBSCRIBERS.'.is_approve' => 0,
                            TBL_SUBSCRIBERS.'.published' => 0
                        );
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers has been disapproved!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
            break;
            
            case 'enable':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(TBL_SUBSCRIBERS.'.status' => 1);
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers has been Enabled!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
            break;
            
            case 'disable':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(TBL_SUBSCRIBERS.'.status' => 0);
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers has been Disabled!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
                
            break;
        
            case 'delete':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    { 
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));

                        $this->modelUserAlias->delete($where); 
                    }
                    $this->session->set_flashdata('message', 'Subscribers has been deleted!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
            break;
        
            case 'featured':
                
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {

                        $record = $this->modelUserAlias->get_subscriber_by_pk($this->encrypt->decode($cb));
                        //Save The subscriber in dictionary 
                        $saveDict = array(
                            $record->subs_title,
                            $record->subs_title_ar
                        );

                        $this->json->jsonRemoveData($saveDict);
                        $this->json->jsonWriteData($saveDict);

                        $save = array(
                            TBL_SUBSCRIBERS.'.is_featured' => 1,
                            TBL_SUBSCRIBERS.'.is_verified' => 1,
                            TBL_SUBSCRIBERS.'.account_type' => 1,
                            TBL_SUBSCRIBERS.'.is_approve' => 1,
                            TBL_SUBSCRIBERS.'.published' => 1
                        );
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers has been set as featured!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
                
            break;
            
            case 'unfeatured':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(
                            TBL_SUBSCRIBERS.'.is_featured' => 0,
                            TBL_SUBSCRIBERS.'.is_verified' => 1,
                            TBL_SUBSCRIBERS.'.account_type' => 2,
                            TBL_SUBSCRIBERS.'.is_approve' => 1
                        );
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers has been set as unfeatured!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
                
            break;
            
            case 'normal':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(TBL_SUBSCRIBERS.'.account_type' => 2);
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers Account Type has been changed!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
            break;
            
            case 'private':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(TBL_SUBSCRIBERS.'.account_type' => 1);
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers Account Type has been changed!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
                
            break;
            
            case 'public':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(TBL_SUBSCRIBERS.'.account_type' => 0);
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers Account Type has been changed!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
            break;

            case 'show_map':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(TBL_SUBSCRIBERS.'.show_on_map' => 1);
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers show on map status enabled!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
            break;

            case 'hide_map':
                if(count($post['cb']) > 0)
                {
                    foreach($post['cb'] AS $cb)
                    {
                        $save = array(TBL_SUBSCRIBERS.'.show_on_map' => 0);
                        $where = array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($cb));
                        $this->modelUserAlias->save( $save, $where);
                    }
                    $this->session->set_flashdata('message', 'Subscribers show on map status hidden!');
                    redirect('admin/subscribers/');
                }else{
                    $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                    redirect('admin/subscribers/');
                }
            break;
        
            default:
                $this->session->set_flashdata('message', 'No Subscribers has been selected!');
                redirect('admin/subscribers/');
            break;
        }
    }
            
    public function validate_username($str)
    {
        $where = array(TBL_SUBSCRIBERS.'.subs_username' => $str);
        if($this->modelUserAlias->isExist($where))
        {
            $this->form_validation->set_message('validate_username', 'Wait ! somebody already took this username :( | Try another one ...');
            return false;
        }else{
            return true;
        }
    }
    
    public function validate_profileurl($str)
    {
        $where = array(TBL_SUBSCRIBERS.'.subs_public_profile' => $str);
        if($this->modelUserAlias->isExist($where))
        {
            $this->form_validation->set_message('validate_profileurl', 'Wait ! somebody already took this profile URL :( | Try another one ...');
            return false;
        }else{
            return true;
        }
    }
    
    public function validate_empty_space($str)
    {
        if(preg_match('/\s/',$str))
        {
            $this->form_validation->set_message('validate_empty_space', 'Empty spaces no allowed');
            return false;
        }else{
            return true;
        }
    }
    
    
    public function handle_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/profile/';      //Fixing the upload directory
        $config['allowed_types'] =  $this->file_types;                          //Configuring the allowed file types
        $config['max_size'] = $this->init['max_size']['value'];                                        //Setting the maximum upload file size
        $config['max_width'] = '640';
        $config['max_height'] = '640';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);                //Loaded the library and add the config
        
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $_POST['userfile'] = $upload_data['file_name'];


                //Load the WideImage Library
                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['file_name']);
 
                //Create two default thumbnails with
                //sizes 263 X 263 Pixels === >Default

                 // 250 X 250 pixels == > For profile page
                $resized = $img->resize(250, 250);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_250'.$upload_data['file_ext']);

                // 140 X 140 Pixels === > For Small Versions
                $resized = $img->resize(140, 140);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_140'.$upload_data['file_ext']);

                // 80 X 80 Pixels == >> For small decvices 
                $resized = $img->resize(80, 80);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_80'.$upload_data['file_ext']);

                // 45 X 45 Pixels == >> For smaller google map icons 
                $resized = $img->resize(45, 45);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_45'.$upload_data['file_ext']);

                //applyMask
                $imgMasked = WideImage::load(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_80'.$upload_data['file_ext']);
                $maskedOut = $imgMasked->applyMask(WideImage::load(UPLOAD_FOLDER.'/imgmanip/mask.png'));

                $maskedOut->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_masked.png'); 

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
    
    public function set_timing($post , $id = NULL)
    {
        
        //Load the timing servuice library
        $this->load->library('subscriber_timing_service');
        
        if($id != NULL)
        {
            $where = array(TBL_SEHA_SUBS_TIMING.'.subs_id' => $id);
            $this->subscriber_timing_service->delete($where);
        }
      
        if(isset($post['from_weekday']) && count($post['from_weekday']) > 0)
        {
            for($i = 0; $i < count($post['from_weekday']); $i++){
                $save_tmg = array(
                    TBL_SEHA_SUBS_TIMING.'.subs_id' => $id,
                    TBL_SEHA_SUBS_TIMING.'.start_weekday' => isset($post['from_weekday'][$i]) ? $post['from_weekday'][$i] : NULL,
                    TBL_SEHA_SUBS_TIMING.'.end_weekday' => isset($post['to_weekday'][$i]) ? $post['to_weekday'][$i] : NULL,
                    TBL_SEHA_SUBS_TIMING.'.open_time' => date('H:i:s', strtotime( $post['open_time'][$i])),
                    TBL_SEHA_SUBS_TIMING.'.close_time' => date('H:i:s', strtotime( $post['close_time'][$i])),
                );
                $this->subscriber_timing_service->save($save_tmg);
            }
        }
            
        if($post['open_hrs'] == 1)
        {
            $save_tmg = array(
                TBL_SEHA_SUBS_TIMING.'.subs_id' => $id,
                TBL_SEHA_SUBS_TIMING.'.start_weekday' => 0,
                TBL_SEHA_SUBS_TIMING.'.end_weekday' => 6,
                TBL_SEHA_SUBS_TIMING.'.open_time' => date('H:i:s', strtotime("00:00 AM")),
                TBL_SEHA_SUBS_TIMING.'.close_time' => date('H:i:s', strtotime("11:59 PM")),
            );
            $this->subscriber_timing_service->save($save_tmg);
        }
        
    }
    
    public function set_spl($post, $id = NULL)
    {   
        $this->load->model('specialization_model');

        if($id != NULL)
        {
            $where = array(TBL_SUBS_SPECIALIZATION.'.subs_id' => $id);
            $this->specialization_model->delete($where);
        }

         //If admin chooses some specialization
         if(isset($post['splzn']) && count($post['splzn']) > 0)
        {
            $splzn_array = array_unique($post['splzn']);
 
            $set_spl = array();
            foreach($splzn_array AS $spl)
            {array_push($set_spl, array( TBL_SUBS_SPECIALIZATION.'.subs_id' => $id, TBL_SUBS_SPECIALIZATION.'.spl_id' => (int) $spl));}
            $this->specialization_model->set($set_spl); 

        }else{

            $save = array( 
                TBL_SUBS_SPECIALIZATION.'.subs_id' => $id, 
                TBL_SUBS_SPECIALIZATION.'.spl_id' => (int) $this->input->post('subs_cat')
            );

            $this->specialization_model->setOne($save); 

        }
    }
    
    public function set_access($post, $id = NULL)
    {
        $this->load->library('subscriber_service');
        if($id != NULL)
        {
            $where = array(TBL_SUBSCRIBERS_MENU_ACCESS.'.subs_id' => $id);
            $this->subscriber_service->unset_subscriber_menu_access($where);
        }
        
        if(isset($post['access']) && count($post['access']) > 0)
        {
            foreach($post['access'] as $access)
            {
                $save = array(TBL_SUBSCRIBERS_MENU_ACCESS.'.subs_id' => $id,TBL_SUBSCRIBERS_MENU_ACCESS.'.access' => $access);
                $this->subscriber_service->set_subscriber_menu_access( $save);
            }

        }
    }
    
    public function send_invitation($post)
    {
        $this->load->library('mail_service');
        $mentry = array(

            "from" => 'info@360seha.com',
            "from_name" => '360Seha Team',
            "reply_to" => 'no-reply@360seha.com',
            "reply_title" => 'No reply',
            "subject" => 'Hi! Your account has been created (approval required)',
            "alt_body" => "Plain text message",
            "to" => $post['em_1'],
            "to_title" => $post['title']
        );

        $query = array(

            "title" => $post['title'],
            "username" => '',
            "pwd" => '',
            "email_verify" => '',
            "content" => ''
        );

        $template = ADMIN_URL.'newsletter_templates/verify_company';
        $this->mail_service->Send( $query, $template, $mentry);
    }

    public function sampleout()
    {

        $this->load->library('subscriber_service'); 

        $limit = (isset($_GET['limit'])) ? $_GET['limit'] : null;
        
        $join = array(
            array('table' => TBL_CATEGORY, 'condition' => TBL_CATEGORY.'.id_category = '.TBL_SUBSCRIBERS.'.subs_cat_id', 'join_type' => 'left'),
            array('table' => TBL_REGION, 'condition' => TBL_REGION.'.id = '.TBL_SUBSCRIBERS.'.city', 'join_type' => 'left'),
            array('table' => TBL_CITY, 'condition' => TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'join_type' => 'left')
        );
        
        $records = $this->subscriber_service->get_subscribers( array(), array(), $limit, null, $join);

        $json = array();
        foreach ($records as $key => $value) {
           array_push($json, array(
             "data" => $value->subs_title_ar
            ));
        }
        $data['json'] = $json;

        $this->load->view('admin/subscribers/sample', $data);
    }
    
}