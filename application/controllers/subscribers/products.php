<?php 

if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Products extends CI_Controller {

    public $layout;
    public $menu_access;

    public function __construct()
    {

        parent::__construct();
        $this->layout = SUBSCRIBER_LAYOUT;

        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('subscriber_service');
        
        $userSession = $this->session->userdata('subs_logged_in');

        if (empty($userSession)) {
            
            $this->session->set_userdata('refered_from', current_url());
            redirect(SUBSRIBER_LOGIN_URL);
        }
        
        $this->user = $userSession;
        $this->root_login = $this->session->userdata('root_login');     //Check if logged in from administrator account
        
        $this->menu_access = $this->subscriber_service->get_subscriber_menu_access($this->encrypt->decode($this->user['subs_user_id']));
    }
    
    public function index()
    {
        
        if(!in_array(MENU_PRODUCTS_ID, $this->menu_access))
        {
            
            $data['page'] = 'Our Products page';
            $this->load->view(ERROR_ACCESS_DENIED, $data); //If no access show 404
            exit(1);
        }
        
        $this->load->library('subscriber_service');
        
        $data['content'] = SUBSRIBER_URL.'user/our_products';
        
        $data['title'] = 'Our Products Page';
        $data['sub_title'] = 'Manage your products details here';
        
        $where = array(
            TBL_PRODUCTS.'.subscriber' => $this->encrypt->decode($this->user['subs_user_id'])
        );

        if(Products::get_instance()->input->post())
        {
            
            $where[TBL_PRODUCTS.'.prdt_title'] = Products::get_instance()->input->post('prdt_title');
            $data['products'] = $this->subscriber_service->get_products( $where);
        }else{
            
            $data['products'] = $this->subscriber_service->get_products( $where);
        }
 
        $this->load->view($this->layout, $data);
    }
    
    
    public function add()
    {
 
        if(!in_array(MENU_PRODUCTS_ID, $this->menu_access))
        {
            
            $data['page'] = 'Our products page';
            $this->load->view(ERROR_ACCESS_DENIED, $data); //If no access show 404
            exit(1);
        }
        
        $this->load->library('subscriber_service');
        
        $data['content'] = SUBSRIBER_URL.'user/add_products';
        $data['title'] = 'Add new product';
        $data['sub_title'] = 'Manage your products details here';
 
        if(Products::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            
            $file_data = array();                                                   //Check if any file uploaded along with the post
 
            if($_FILES['userfile']['name'] != ""){
 
                $config['upload_path'] = UPLOAD_FOLDER.'page-contents/products/';   //Fixing the upload directory
                $config['allowed_types'] = 'jpg|png|jpeg';                          //Configuring the allowed file types
                $config['max_size'] = '600';                                        //Setting the maximum upload file size
                $config['max_width'] = '600';
                $config['max_height'] = '600';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload())                                    // If upload failed, display error
                {
                    $data['error'] = $this->upload->display_errors();
                }else{
                    $file_data = $this->upload->data();
                }
            
            }
            
            $this->form_validation->set_rules('title', 'Product\'s Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('price', 'Product\'s price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'product description', 'trim|required|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                //services_image pending
                $save = array(
                    
                    TBL_PRODUCTS.'.subscriber' => $this->encrypt->decode($this->user['subs_user_id']),
                    TBL_PRODUCTS.'.prdt_title' => Products::get_instance()->input->post('title'),
                    TBL_PRODUCTS.'.prdt_description' => Products::get_instance()->input->post('description'),
                    TBL_PRODUCTS.'.price' => Products::get_instance()->input->post('price'),
                    TBL_PRODUCTS.'.show_status' => (Products::get_instance()->input->post('show_status')) ? 1 : 0,
                    TBL_PRODUCTS.'.created_on' => date('Y-m-d H:i:s'),
                    TBL_PRODUCTS.'.updated_on' => date('Y-m-d H:i:s')
                    
                );
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[TBL_PRODUCTS.'.prdt_img'] = $file_data['file_name'];
                }

                if(!isset($data['error']))
                {
                    $this->subscriber_service->save_product($save);
                
                    $this->session->set_flashdata('flash_message', 'Product details added!');
                    redirect( SUBSRIBER_URL.'products/');
                }
 
            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    
    public function edit($id)
    {
 
        if(!in_array(MENU_PRODUCTS_ID, $this->menu_access))
        {
            
            $data['page'] = 'Our products page';
            $this->load->view(ERROR_ACCESS_DENIED, $data); //If no access show 404
            exit(1);
        }
        
        $this->load->library('subscriber_service');
        
        $data['content'] = SUBSRIBER_URL.'user/edit_product';
        $data['title'] = 'Update product';
        $data['sub_title'] = 'Manage your products details here';
        
        $id = $this->encrypt->decode($id);        
        $data['record'] = $this->subscriber_service->get_product_by_pk($id);
 
        if(Products::get_instance()->input->post())
        {
            $this->load->library('form_validation');
            
            $file_data = array();                                                   //Check if any file uploaded along with the post
 
            if($_FILES['userfile']['name'] != ""){
 
                $config['upload_path'] = UPLOAD_FOLDER.'page-contents/products/';   //Fixing the upload directory
                $config['allowed_types'] = 'jpg|png|jpeg';                          //Configuring the allowed file types
                $config['max_size'] = '600';                                        //Setting the maximum upload file size
                $config['max_width'] = '600';
                $config['max_height'] = '600';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload())                                    // If upload failed, display error
                {
                    $data['error'] = $this->upload->display_errors();
                }else{
                    $file_data = $this->upload->data();
                }
            
            }
            
            $this->form_validation->set_rules('title', 'Product\'s Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('price', 'Product\'s price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'product description', 'trim|required|xss_clean');
            
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                
                //services_image pending
                $save = array(
                    
                    TBL_PRODUCTS.'.subscriber' => $this->encrypt->decode($this->user['subs_user_id']),
                    TBL_PRODUCTS.'.prdt_title' => Products::get_instance()->input->post('title'),
                    TBL_PRODUCTS.'.prdt_description' => Products::get_instance()->input->post('description'),
                    TBL_PRODUCTS.'.price' => Products::get_instance()->input->post('price'),
                    TBL_PRODUCTS.'.show_status' => (Products::get_instance()->input->post('show_status')) ? 1 : 0,
                    TBL_PRODUCTS.'.updated_on' => date('Y-m-d H:i:s')
                    
                );
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[TBL_PRODUCTS.'.prdt_img'] = $file_data['file_name'];
                }
                
                $where = array(
                    TBL_PRODUCTS.'.prdt_id' => $id
                );

                if(!isset($data['error']))
                {
                    $this->subscriber_service->save_product( $save, $where);
                
                    $this->session->set_flashdata('flash_message', 'Product details added!');
                    redirect( SUBSRIBER_URL.'products/');
                }
 
            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    public function delete($id)
    {
 
        if(!in_array(MENU_PRODUCTS_ID, $this->menu_access))
        {
            
            $data['page'] = 'Our products page';
            $this->load->view(ERROR_ACCESS_DENIED, $data); //If no access show 404
            exit(1);
        }
        
        $this->load->library('subscriber_service'); 
        
        $id = $this->encrypt->decode($id);        
        $record = $this->subscriber_service->get_product_by_pk($id);
        
        if(!$record)
        {
            
            redirect(ERROR_404);
            exit(1);
            
        }else{
            
            $where = array(
                TBL_PRODUCTS.'.prdt_id' => $id
            );
            
            //Delete from the table after its found
            if($this->subscriber_service->unset_product($where))
            {
 
                $this->session->set_flashdata('message', 'Deleted!...product details deleted');
                redirect( SUBSRIBER_URL.'products/');
            }else{
                
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect( SUBSRIBER_URL.'products/');
            }
            
        }

        $this->load->view($this->layout, $data);
        
    }
    
}
