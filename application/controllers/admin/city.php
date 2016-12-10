<?php 

if ( ! defined('BASEPATH'))  exit('No direct script access allowed');

class City extends MY_Controller {

    protected $countries;
    protected $view;
    protected $title = 'City';
    protected $table = TBL_CITY;
    protected $ctrl_url;

    public function __construct()
    {
        parent::__construct();
        $this->_menu_item = 'city';
        $this->view = 'admin/city';
        $this->ctrl_url = HOST_URL.'/admin/city';
        $this->load->library('encrypt');
        $this->load->model('country_model','modelCountryAlias');
        $this->load->library('city_service'); 
        $this->countries = $this->modelCountryAlias->fetchAll();
    }
    
    public function index()
    {
        $data = array();
        $data['content'] = $this->view.'/index';
        $data['title'] = $this->title;
        $data['countries'] = $this->countries;
        $data['ctrl_url'] = $this->ctrl_url;

        $this->load->library('city_service'); 
 
        if($this->input->post()){

            $where = array(
                $this->table.".name" => $this->input->post('name')
            );

            if($this->input->post('country') != "")
            {
                $where = array(
                    $this->table.".country_fk" => $this->input->post('country')
                );
            }

            $data['records'] = $this->city_service->get( $where, array(), null, null);

        }else{

            $data['records'] = $this->city_service->get( array(), array(), null, null);
        }

        $this->load->view($this->layout, $data);
    }
    
    public function add()
    {
        $data = array(); 
        $data['content'] = $this->view.'/add';
        $data['title'] = $this->title;
        $data['sub_title'] = 'Add your city details here';
        $data['countries'] = $this->countries;
        $data['ctrl_url'] = $this->ctrl_url; 
        
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'City Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'City Title in Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('country_fk', 'Country', 'trim|required|xss_clean');
            $this->form_validation->set_rules('code', 'Code', 'trim|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {   
                $orderBy = $this->city_service->lastOrderID();

                $save = array(
                    $this->table.'.name' => $this->input->post('name'),
                    $this->table.'.name_ar' => $this->input->post('name_ar'),
                    $this->table.'.code' => $this->input->post('code'),
                    $this->table.'.country_fk' => $this->input->post('country_fk'),
                    $this->table.'.orderby' => ++$orderBy->orderby,
                    $this->table.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                $this->city_service->save($save);
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
        $data['title'] = $this->title;
        $data['sub_title'] = 'Update your city details here';
        $data['countries'] = $this->countries;
        $data['ctrl_url'] = $this->ctrl_url;

        $id = $this->encrypt->decode($id);
        $where = array(
            $this->table.'.id' => $id
        );

        $data['record'] = $this->city_service->get_city_by_pk($id);

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'City Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'City Title in Arabic', 'trim|required|xss_clean');
            $this->form_validation->set_rules('code', 'Code', 'trim|xss_clean');
            $this->form_validation->set_rules('country_fk', 'Country', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            {
                $save = array(
                    $this->table.'.name' => City::get_instance()->input->post('name'),
                    $this->table.'.name_ar' => City::get_instance()->input->post('name_ar'),
                    $this->table.'.code' => City::get_instance()->input->post('code'),
                    $this->table.'.country_fk' => $this->input->post('country_fk'),
                    $this->table.'.updated_on' => date('Y-m-d H:i:s')
                );

                $where = array(
                  $this->table.'.id' => $id  
                );

                $this->city_service->save($save, $where);
                $this->session->set_flashdata('message', 'Updated!');
                redirect($this->ctrl_url);
            }
        }

        $this->load->view($this->layout, $data);

    }
    
    public function delete($id)
    { 
        $id = $this->encrypt->decode($id);        
        $record = $this->city_service->get_city_by_pk($id);
        
        if(!$record){
            show_404();
        }else{
            $where = array(
                $this->table.'.id' => $id
            );

            if($this->city_service->remove($where))
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
        if(City::get_instance()->input->post('order'))
        {
            if($this->has_repeat_val($_POST['order']))
            {
                $this->session->set_flashdata('message', 'Found repeated values in order');
                redirect($this->ctrl_url);
            }else{
 
                $this->load->library('city_service');
                
                for($i=0; $i < count($_POST['order']); $i++)
                {
                    $where = array(
                        $this->table.'.id' => $this->encrypt->decode($_POST['_id'][$i])
                    );
                    $save = array(
                        $this->table.'.orderby' => $_POST['order'][$i]
                    );
                    $this->city_service->save($save, $where);
                }
                $this->session->set_flashdata('message', 'Listing order has been changed');
                redirect($this->ctrl_url);
            }
        }
    }
        
    static private function has_repeat_val($array)
    {
        if(count(array_unique($array)) < count($array)){return true;}else{return false;}
    }
    
}