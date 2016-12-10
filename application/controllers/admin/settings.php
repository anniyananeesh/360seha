<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

    public function __construct()
    {
        parent::__construct();       
        $this->_menu_item = 'settings';
    }
    
    public function general(){
        
        $data = array();
        
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'settings_general'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data['content'] = 'admin/config/general';
        $data['title'] = 'General Settings';
        $data['_mode'] = false;
        $forms = $this->getGeneralConfig();
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('admin_email', 'Admin Email', 'trim|required|xss_clean|valid_email');
            
            if($this->input->post('maintain_mode'))
            {
                $data['_mode'] = true;
                $this->form_validation->set_rules('maintain_text', 'Maintanence Information to be showed', 'trim|required|xss_clean'); 
            }
            $this->form_validation->set_rules('date_format', 'Date Format', 'trim|required|xss_clean');
            $this->form_validation->set_rules('search_per_page', 'Search Per Page Count', 'trim|required|xss_clean');
            $this->form_validation->set_rules('grace_period', 'Free Registration Period', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                foreach($forms as $config)
                {
                   $where = array(
                       TBL_CONFIG.'.group_name' => 'general',
                       TBL_CONFIG.'.config_key' => $config['id']
                   );
                   
                   $post = $this->input->post($config['id']);
                   $value = array(
                     TBL_CONFIG.'.config_value' => (isset($post) && $post) ? $post :  '0'
                   );
                   $this->config_model->save( $value, $where);
                }
                $this->session->set_flashdata('message', 'Updated General Settings!');
                redirect('/admin/settings/general');
            }

        }
        
        $data['config'] = $forms;
        $this->load->view($this->layout, $data);
    }
    
    public function mail()
    {
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'settings_mail'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data = array();
        $data['content'] = 'admin/config/mail';
        $data['title'] = 'Mail Settings';
        $data['_mode'] = false;
        
        $forms = $this->getMailConfig();

        if($this->input->post())
        {
            foreach($forms as $config)
            {
                $where = array(
                    TBL_CONFIG.'.group_name' => 'mail',
                    TBL_CONFIG.'.config_key' => $config['id']
                );
                $post = $this->input->post($config['id']);
                $value = array(
                    TBL_CONFIG.'.config_value' => (isset($post) && $post) ? $post :  '0'
                );
                $this->config_model->save( $value, $where);
            }
            $this->session->set_flashdata('message', 'Updated mail settings');
            redirect('/admin/settings/mail');
        }
        
        $data['config'] = $forms;
        $this->load->view($this->layout, $data);
    }
    
    public function images()
    {
        if(!$this->user_service->has_user_access( $this->encrypt->decode($this->user['user_id']), 'settings_images'))
        {
            redirect(ERROR_404);
            exit(1);
        }
        
        $data = array();
        $data['content'] = 'admin/config/images';
        $data['title'] = 'Image Settings';
        
        $forms = $this->getImageConfig();

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('allowed_types', 'Allowed File Types', 'trim|required|xss_clean|callback_validate_csv');
            $this->form_validation->set_rules('max_size', 'Maximum File Size', 'trim|required|xss_clean|numeric');
            $this->form_validation->set_rules('max_height', 'Maximum Image Height', 'trim|required|xss_clean|numeric');
            $this->form_validation->set_rules('max_width', 'Maximum Image Width', 'trim|required|xss_clean|numeric');
            $this->form_validation->set_rules('thumb_height', 'Thumbnail Height', 'trim|required|xss_clean|numeric');
            $this->form_validation->set_rules('thumb_width', 'Thumbnail Width', 'trim|required|xss_clean|numeric');
            $this->form_validation->set_rules('quality', 'Image Compression Ratio', 'trim|required|xss_clean|numeric|callback_validate_percentage');
            
            if($this->input->post('wm_enable') == '1')
            {
                $this->form_validation->set_rules('wm_path', 'Watermark path', 'trim|required|xss_clean');
                $this->form_validation->set_rules('wm_pos', 'Watermark Position', 'trim|required|xss_clean'); 
            }
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                foreach($forms as $config)
                {
                    $where = array(
                        TBL_CONFIG.'.group_name' => 'image',
                        TBL_CONFIG.'.config_key' => $config['id']
                    );
                    $post = $this->input->post($config['id']);
                    $value = array(
                        TBL_CONFIG.'.config_value' => (isset($post) && $post) ? $post :  '0'
                    );
                    $this->config_model->save( $value, $where);
                }
                
                $this->session->set_flashdata('message', 'Updated!');
                redirect('/admin/settings/images');
            } 
        }
        
        $data['config'] = $forms;
        $this->load->view($this->layout, $data);
        
    }
    
    public function validate_percentage($str){
        if((int) $str <= 0 || (int) $str > 100 ){
           $this->form_validation->set_message('validate_percentage', 'Percentage should be in valid range');
           return false;
        }else{
          return true;
        }
    }

    public function validate_csv($str){
        $str = explode(',', $str);
        if(empty($str) || count($str) == 0){
           $this->form_validation->set_message('validate_csv', 'Percentage should be in valid range');
           return false;
        }else{
          return true;
        }
    }

}
