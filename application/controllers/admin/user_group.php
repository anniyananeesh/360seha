<?php 

if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class User_group extends CI_Controller {
    
    public $layout;
    
    public function __construct(){
        
        parent::__construct();
        $this->layout = ADMIN_LAYOUT;
        
        $this->load->library('session');
        $userSession = $this->session->userdata('logged_in');
        if (empty($userSession)) {
            
            $this->session->set_userdata('refered_from', current_url());
            redirect(ADMIN_LOGIN_URL);
        }
        $this->user = $userSession;        
        $this->_menu_item = 'user_group';
    }
    
    public function index(){
        
        $data = array();
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_group_view'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data['content'] = 'admin/user_groups/index';
        $data['title'] = 'User Groups';
        
        $this->load->library('user_service');
        $this->load->library('encrypt');
        
        $join = array(
            array('table' => TBL_USERS_ROLES, 'condition' => TBL_USER_GROUPS.'.grp_role_id = '.TBL_USERS_ROLES.'.role_id', 'join_type' => 'inner')
        );
        
        if(User_group::get_instance()->input->post()){
            
            $where = array(
                TBL_LANGUAGES.".lang_title" => User_group::get_instance()->input->post('usr_grp')
            );
            
            $data['records'] = $this->user_service->get_user_groups($where, array(), NULL, NULL, $join);
            
        }else{
            
            $data['records'] = $this->user_service->get_user_groups( array(), array(), NULL, NULL, $join);
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    public function create()
    {
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_group_create'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data = array();
        
        $data['content'] = 'admin/user_groups/add';
        $data['title'] = 'User Groups - New';
        $data['sub_title'] = 'Add your user groups here';
        
        $this->config->load('modules');
        $data['modules'] = $this->config->item('modules');
        
        if(User_group::get_instance()->input->post())
        {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('grp_title', 'Group Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('user_role', 'User Role', 'trim|required|xss_clean');
            
            if(User_group::get_instance()->input->post('user_role') != ROLE_SEHA_SUPER_ADMINS){
                
                $this->form_validation->set_rules('privs', 'Choose privileges', 'trim|required|xss_clean');
            }
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                $this->load->library('user_service');
                
                $save = array(
                    
                    TBL_USER_GROUPS.'.grp_title' => User_group::get_instance()->input->post('grp_title'),
                    TBL_USER_GROUPS.'.grp_role_id' => User_group::get_instance()->input->post('user_role'),
                    TBL_USER_GROUPS.'.grp_status' => 1,
                    TBL_USER_GROUPS.'.grp_created' => date('Y-m-d H:i:s'),
                    TBL_USER_GROUPS.'.grp_updated' => date('Y-m-d H:i:s')
                );
                
                $grp_id = $this->user_service->set_user_group( $save);
                
                if($grp_id)
                {
                    
                   $perms = explode(',', User_group::get_instance()->input->post('privs'));
                   
                   if(is_array($perms))
                   {
                       
                       foreach($perms as $p)
                       {
                           $save = array(
                               TBL_USER_PERMISSIONS.'.grp_id' => $grp_id,
                               TBL_USER_PERMISSIONS.'.permission_title' => $p
                           );
                           
                           $this->user_service->set_user_perms( $save);
                       }
                       
                   }
                   
                } 
                
                $this->session->set_flashdata('message', 'Created!');
                redirect('/admin/user_group/');
                
            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    public function edit($id)
    {
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_group_edit'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data = array();
        
        $data['content'] = 'admin/user_groups/edit';
        $data['title'] = 'User Groups - New';
        $data['sub_title'] = 'Add your user groups here';
        
        $this->load->library('encrypt');
        $this->load->library('user_service');
        
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->user_service->get_user_group_by_id($id);
        
        $where = array(
            TBL_USER_PERMISSIONS.'.grp_id' => $id            
        );
        
        $data['privileges'] = $this->user_service->get_user_perms($where);
        
        $this->config->load('modules');
        $data['modules'] = $this->config->item('modules');
        
        if(User_group::get_instance()->input->post())
        {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('grp_title', 'Group Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('user_role', 'User Role', 'trim|required|xss_clean');
            
            if(User_group::get_instance()->input->post('user_role') != ROLE_SEHA_SUPER_ADMINS){
                
                $this->form_validation->set_rules('privs', 'Choose privileges', 'trim|required|xss_clean');
            }
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
 
                $save = array(
                    
                    TBL_USER_GROUPS.'.grp_title' => User_group::get_instance()->input->post('grp_title'),
                    TBL_USER_GROUPS.'.grp_role_id' => User_group::get_instance()->input->post('user_role'),
                    TBL_USER_GROUPS.'.grp_status' => 1,
                    TBL_USER_GROUPS.'.grp_created' => date('Y-m-d H:i:s'),
                    TBL_USER_GROUPS.'.grp_updated' => date('Y-m-d H:i:s')
                );
                
                $where = array(
                    TBL_USER_GROUPS.'.grp_id' => $id
                );
 
                if($this->user_service->set_user_group( $save, $where))
                {
                    
                   $where = array(
                        TBL_USER_PERMISSIONS.'.grp_id' => $id            
                   );
                   
                   $this->user_service->unset_permissions($where);                  //Deleting current permissions from table
                   
                   $perms = explode(',', User_group::get_instance()->input->post('privs'));
                   
                   if(is_array($perms))
                   {
                       
                       foreach($perms as $p)
                       {
                           $save = array(
                               TBL_USER_PERMISSIONS.'.grp_id' => $id,
                               TBL_USER_PERMISSIONS.'.permission_title' => $p
                           );
                           
                           $this->user_service->set_user_perms( $save);
                       }
                       
                   }
                   
                } 
                
                $this->session->set_flashdata('message', 'Created!');
                redirect('/admin/user_group/');
                
            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    public function delete($id)
    {
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'user_group_delete'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $this->load->library('encrypt');
        $this->load->model('language_model');
        
        $id = $this->encrypt->decode($id);        
        $record = $this->language_model->fetchById($id);
        
        if(!$record){
            
            show_404();
        }else{
            
            $where = array(
                TBL_LANGUAGES.'.lang_id' => $id
            );
            
            //Delete from the table after its found
            if($this->language_model->delete($where))
            {
                $this->session->set_flashdata('message', 'Deleted!');
                redirect('/admin/language/');              
            }else{
                
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect('/admin/language/');
            }
            
        }
        
    }
    
}