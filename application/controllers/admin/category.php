<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller{

    protected $table = TBL_CATEGORY;
    protected $ctrlUrl;
    protected $classViews = 'admin/category/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/category/';

        $this->load->library('json');
        $this->load->model('category_model');
        $this->load->library('category_service');
    }

    public function index()
    {
        $data = array();

        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'Category Management';
        $data['sub_title'] = 'Add your favourite categories here';
        $data['order'] = $this->category_service->get_order_multidimensional();
        $data['cats'] = $this->category_service->get_categories();
        $data['root'] = $this->category_service->get_root_categories();

        if($this->input->post())
        {
            $where = array(
                'id_category_parent' => $this->input->post('root')
            );

            $data['records'] = $this->category_model->get_category( $where, array( $this->table.'.orderby' => 'ASC'));

        }else{

            $data['records'] = $this->category_model->get_category( array(), array( $this->table.'.orderby' => 'ASC'));

        }

        $this->load->view($this->layout, $data);
    }

    public function create()
    {
        $data = array();

        $data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;

        $data['title'] = 'Category Management - New';
        $data['sub_title'] = 'Add your favourite categories here';
        $data['categories'] = $this->category_service->get_root_categories(false);

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('c_title', 'Category Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('c_title_ar', 'Arabic Category Title', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');

            $data['parent'] = ($this->input->post('parent') && count($this->input->post('parent')) > 0) ? $this->input->post('parent') : array();

            if($this->form_validation->run() == TRUE)
            {
                $paramArray = array(
                    $this->table.'.name' => $this->input->post('c_title'),
                    $this->table.'.name_ar' => $this->input->post('c_title_ar')
                );

                if(!$this->category_service->isExistData($paramArray))
                {
                  $value = array(
                      $this->table.'.name' => $this->input->post('c_title'),
                      $this->table.'.name_ar' => $this->input->post('c_title_ar'),
                      $this->table.'.seoname' => strtolower(trim($this->input->post('c_title'))).'-'.strtolower(trim($cat->seoname)),
                      $this->table.'.show_status' => 1,
                      $this->table.'.created' => date('Y-m-d')
                  );

                  $this->category_model->save( $value);

                    $saveDict = array(
                        $this->input->post('c_title'),
                        $this->input->post('c_title_ar')
                    );

                    $this->json->jsonWriteData($saveDict);
                    $this->session->set_flashdata('message', 'Created!');
                    redirect($this->ctrlUrl);

                }else{

                    $data['error'] = true;
                    $data['message'] = "Record already exists";
                }

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
        $data['title'] = 'Category Management - Update';
        $data['sub_title'] = 'Update your favourite categories here';

        $id = $this->encrypt->decode($id);
        $data['record'] = $this->category_model->fetchById($id);
        $data['categories'] = $this->category_service->get_root_categories(false);

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('c_title', 'Category Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('c_title_ar', 'Arabic Category Title', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
                $value = array(
                    $this->table.'.name' => $this->input->post('c_title'),
                    $this->table.'.name_ar' => $this->input->post('c_title_ar'),
                    $this->table.'.seoname' => strtolower(trim($this->input->post('c_title')))
                );

                $where = array(
                  $this->table.'.id_category' => $id
                );

                $this->category_model->save( $value, $where);

                $this->session->set_flashdata('message', 'Updated!');
                redirect($this->ctrlUrl);
            }

        }

        $this->load->view($this->layout, $data);

    }

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);
        $record = $this->category_model->fetchById($id);

        if(!$record){

            show_404();
        }else{

            $where = array(
                $this->table.'.id_category' => $id
            );

            if($this->category_model->delete($where))
            {
                $saveDict = array(
                    $record->name,
                    $record->name_ar
                );

                $this->json->jsonRemoveData($saveDict);
                $this->session->set_flashdata('message', 'Deleted!...Child items moved');
                redirect($this->ctrlUrl);

            }else{

                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->ctrlUrl);
            }

        }

    }

    public function grp_action()
    {
        $post = $this->input->post();

        switch($post['action'])
        {
            case 'order':
                if(count($post['orderby']) > 0)
                {
                    foreach($post['orderby'] AS $key => $value)
                    {
                        $save = array(
                            $this->table.'.orderby' => $value
                        );

                        $where = array($this->table.'.id_category' => $this->encrypt->decode($post['idarray'][$key]));

                        $this->category_model->save( $save, $where);
                    }

                    $this->session->set_flashdata('message', 'Order updated!');
                    redirect($this->ctrlUrl);

                }else{

                    $this->session->set_flashdata('notify_error', 'No items has been selected!');
                    redirect($this->ctrlUrl);
                }

            break;

            default:
                $this->session->set_flashdata('notify_error', 'No items has been selected!');
                redirect($this->ctrlUrl);
            break;
        }
    }

    public function validate_parent()
    {
        if(count($_POST['parent']) > 0)
        {
            return true;
        }else{
            $this->form_validation->set_message('validate_parent', 'You have to select atleast one parent');
            return false;
        }
    }

}
