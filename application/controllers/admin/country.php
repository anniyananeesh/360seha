<?php 
if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Country extends MY_Controller {

    protected $view;
    protected $title = 'Country';
    protected $table = TBL_COUNTRIES;
    protected $ctrl_url;

    public function __construct()
    {
        parent::__construct();
        $this->view = 'admin/country';
        $this->ctrl_url = HOST_URL.'/admin/country';
        $this->load->library('encrypt');
        $this->load->model('country_model','modelNameAlias');
    }
    
    public function index()
    {
        $data = array();
        $data['content'] = $this->view.'/index';
        $data['title'] = $this->title;
        $data['ctrl_url'] = $this->ctrl_url;
 
        if($this->input->post()){

            $where = array(
                $this->table.".name_en LIKE " => "%".$this->input->post('name')."%"
            );

            $data['records'] = $this->modelNameAlias->fetchAll($where, array(), null, null);

        }else{
            $data['records'] = $this->modelNameAlias->fetchAll( array(), array(), null, null);
        }

        $this->load->view($this->layout, $data);
    }
    
    public function add()
    {
        $data = array();
        $data['content'] = $this->view.'/add';
        $data['title'] = $this->title . ':- Add';
        $data['sub_title'] = '';
        $data['ctrl_url'] = $this->ctrl_url;

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name_en', 'English Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'Arabic Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('domain_url', 'URL', 'trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {

                $orderBy = $this->modelNameAlias->lastOrderID();

                $save = array(
                    $this->table.'.name_en' => $this->input->post('name_en'),
                    $this->table.'.name_ar' => $this->input->post('name_ar'),
                    $this->table.'.domain_url' => $this->input->post('domain_url'),
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.orderby' => ++$orderBy->orderby,
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($this->uploadFile['userfile'] != '')
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile']; 
                }

                $this->modelNameAlias->save($save);
                $this->session->set_flashdata('message', 'Created!');
                redirect($this->ctrl_url);

            }

        }

        $this->load->view($this->layout, $data);

    }
    
    public function edit($id)
    {
        $data = array();
        $data['content'] = $this->view.'/edit';
        $data['title'] = $this->title . ':- Update';
        $data['sub_title'] = '';
        $data['ctrl_url'] = $this->ctrl_url;
 
        $id = $this->encrypt->decode($id);
        $data['record'] = $this->modelNameAlias->fetchById($id);

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name_en', 'English Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'Arabic Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('domain_url', 'URL', 'trim|required|xss_clean');
            $this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_handle_upload');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.name_en' => $this->input->post('name_en'),
                    $this->table.'.name_ar' => $this->input->post('name_ar'), 
                    $this->table.'.domain_url' => $this->input->post('domain_url'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                if($this->uploadFile['userfile'] != '')
                {
                    $save[$this->table.'.image_url'] =  $this->uploadFile['userfile'];
                } 

                $where = array(
                  $this->table.'.id' => $id  
                );

                $this->modelNameAlias->save($save, $where);
                $this->session->set_flashdata('message', 'Updated!');
                redirect($this->ctrl_url);

            }

        }

        $this->load->view($this->layout, $data);
    }
    
    public function delete($id)
    {
 
        $id = $this->encrypt->decode($id);        
        $record = $this->modelNameAlias->fetchById($id);
        
        if(!$record){
            show_404();
        }else{

            $where = array(
                $this->table.'.id' => $id
            );

            if($this->modelNameAlias->delete($where))
            {
                $this->session->set_flashdata('message', 'Deleted!');
                redirect($this->ctrl_url);              
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrl_url);
            }
        }
    }
    
    public function save_order()
    {
        if($this->input->post('orderby'))
        {
            if($this->has_repeat_val($_POST['orderby']))
            {
                $this->session->set_flashdata('message', 'Found repeated values in order');
                redirect($this->ctrl_url);
            }else{ 

                for($i=0; $i < count($_POST['orderby']); $i++)
                {
                    $where = array(
                      $this->table.'.id' => $this->encrypt->decode($_POST['_id'][$i])
                    );

                    $save = array(
                        $this->table.'.orderby' => $_POST['orderby'][$i]
                    );
                    $this->modelNameAlias->save($save, $where);
                }
                $this->session->set_flashdata('message', 'Listing order has been changed');
                redirect($this->ctrl_url);
            }
        }
    }

    public function handle_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'country/';
        $config['allowed_types'] =  'jpg|jpeg|png';
        $config['max_size'] = 800;
        $config['max_width'] = 320;
        $config['max_height'] = 320;
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
        else
        {
          return true;
        }

    }
        
    static private function has_repeat_val($array)
    {
        if(count(array_unique($array)) < count($array)){return true;}else{return false;}
    }
    
}