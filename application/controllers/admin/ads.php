<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends MY_Controller{

    protected $table = TBL_ADS;
    protected $ctrlUrl;
    protected $classViews = 'admin/ads/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/ads/';
        $this->load->library('advertise_service');
    }
    
    public function index()
    {
        $data = array();
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Advertisement Management';

        if($this->input->post())
        {
            $data['records'] = $this->advertise_service->search_ads($this->input->post('title'));
        }else{
            $data['records'] = $this->advertise_service->get();
        }
        
        $this->load->view($this->layout, $data);
    }
    
    public function create()
    {
        $data = array();
        $file_data = array();
        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Advertisement Management - New';
        $data['sub_title'] = 'Add your adverts here';
        $data['show_ad_sense'] = false;
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|required|xss_clean');
            
            if($this->input->post('is_google_adsense') == 1)
            {
                $this->form_validation->set_rules('script', 'Google adsense script', 'trim|required|xss_clean');
                $data['show_ad_sense'] = true;
            }
            
            $this->form_validation->set_rules('ad_area', 'Advert position', 'trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'Advert URL', 'trim|required|xss_clean|valid_url_format');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                if(isset($_FILES['userfile']))
                {
                    $config['upload_path'] = UPLOAD_FOLDER.'ads/';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = '1000';
                    $config['max_width'] = '729';
                    $config['max_height'] = '251';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload())
                    {
                        $data['error'] = $this->upload->display_errors();
                    }else{
                        $file_data = $this->upload->data();
                    }
                }
                
                $save = array(
                    $this->table.'.title' => $this->input->post('title'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.ad_area' => $this->input->post('ad_area'),
                    $this->table.'.url' => $this->input->post('url'),
                    $this->table.'.is_adsense' => ($this->input->post('is_google_adsense') == 1) ? 1 : 0,
                    $this->table.'.adsense_script' => ($this->input->post('is_google_adsense') == 1) ? $this->input->post('script') : NULL,
                    $this->table.'.show_status' => ($this->input->post('show_status') == 1) ? 1 : 0,
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[$this->table.'.image'] = $file_data['file_name'];
                }

                $this->advertise_service->save($save);
                $this->session->set_flashdata('flash_message', 'Advertisement added!');
                redirect($this->ctrlUrl);
            }
            
        }
        
        $this->load->view($this->layout, $data);
        
    }
    
    public function edit($id)
    {
        $data = array();
        $file_data = array();

        $data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Advertisement Management - New';
        $data['sub_title'] = 'Add your adverts here';
        $data['show_ad_sense'] = false;
        
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->advertise_service->get_ad_by_pk($id);
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|required|xss_clean');

            if($this->input->post('is_google_adsense') == 1)
            {
                $this->form_validation->set_rules('script', 'Google adsense script', 'trim|required|xss_clean');
                $data['show_ad_sense'] = true;
            }
            
            $this->form_validation->set_rules('ad_area', 'Advert position', 'trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'Advert URL', 'trim|required|xss_clean|valid_url_format');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                if(isset($_FILES['userfile']))
                {
                    $config['upload_path'] = UPLOAD_FOLDER.'ads/';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = '1000';
                    $config['max_width'] = '729';
                    $config['max_height'] = '251';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload())
                    {
                        $data['error'] = $this->upload->display_errors();
                    }else{
                        $file_data = $this->upload->data();
                    }
                }
                
                $save = array(
                    $this->table.'.title' => $this->input->post('title'),
                    $this->table.'.title_ar' => $this->input->post('title_ar'),
                    $this->table.'.ad_area' => $this->input->post('ad_area'),
                    $this->table.'.url' => $this->input->post('url'),
                    $this->table.'.is_adsense' => ($this->input->post('is_google_adsense') == 1) ? 1 : 0,
                    $this->table.'.adsense_script' => ($this->input->post('is_google_adsense') == 1) ? $this->input->post('script') : NULL,
                    $this->table.'.show_status' => ($this->input->post('show_status') == 1) ? 1 : 0,
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );
                
                $where = array(
                    $this->table.'.id' => $id,
                );
                
                if(count($file_data) > 0 && $file_data)
                {
                    $save[$this->table.'.image'] = $file_data['file_name'];
                }
                $this->advertise_service->save($save, $where);
                $this->session->set_flashdata('flash_message', 'Advertisement updated!');
                redirect($this->ctrlUrl);
            }
        }
        $this->load->view($this->layout, $data);
    }
    
    public function delete($id)
    { 
        $id = $this->encrypt->decode($id);        
        $record = $this->advertise_service->get_ad_by_pk($id);
        
        if(!$record){
            
            show_404();
        }else{

            if($this->advertise_service->remove_ad($id))
            {
                $this->session->set_flashdata('message', 'Removed!');
                redirect($this->ctrlUrl);              
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrlUrl);
            }
        }
    }
}