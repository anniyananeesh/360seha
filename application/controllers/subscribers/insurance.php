<?php 

if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Insurance extends Account_Controller {

    protected $view;
    protected $table = TBL_CLIENT_INSURANCE;
    protected $join;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'insurance';

        $this->load->model('subscribers/insurance_client_model','modelInsAlias');
        $this->load->model('admin/insurance_model','modelGenInsAlias');

        $this->join = array(
            array('table' => TBL_GENERAL_INSURANCE, 'condition' => TBL_GENERAL_INSURANCE.'.ins_id = '.$this->table.'.ins_id', 'join_type' => 'inner')
        );
    }

    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Insurance Clients Page';
        $this->data['sub_title'] = 'Manage your insurance clients here';

        $where = array(
            $this->table.'.subs_id' => $this->encrypt->decode($this->user['user_id'])
        );

        $this->data['records'] = $this->modelInsAlias->fetchAll($where,array(),null,null,$this->join);
        $this->load->view($this->layout, $this->data);
    }
    
    
    public function create()
    {
        $file_data = array();

        $this->data['content'] = $this->view.'/add';
        $this->data['title'] = 'Add new client';
        $this->data['sub_title'] = 'Manage your insurance clients page';
        $error = FALSE;
        $this->data['Error'] = 'N';

        $where = array(
            TBL_GENERAL_INSURANCE.'.show_status' => 1
        );

        $this->data['insurances'] = $this->modelGenInsAlias->fetchAll($where,array(),null,null,array());

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('ins_title[]', 'Insurance company title', 'trim|required|xss_clean');  

            if(count($this->input->post('ins_title')) == 0)
            {
               $error = TRUE;
               $this->data['Error'] = 'Y';
               $this->data['MSG'] = 'Please choose your insurance companies';
            }
 
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error)
            {
                $save = array();
                $ins = $this->input->post('ins_title');

                for($i=0; $i<count($ins); $i++)
                {
                    array_push($save, array(
                        $this->table.'.subs_id' => $this->encrypt->decode($this->user['user_id']),
                        $this->table.'.ins_id' => $ins[$i],
                        $this->table.'.created_on' => date('Y-m-d H:i:s'), 
                    ));
                }
 
                $this->modelInsAlias->save($save);
                $this->session->set_flashdata('message', 'Insurance company details added!');
                redirect($this->data['ctrl_url']);
            }
        }

        $this->load->view($this->layout, $this->data);
    } 

    public function delete($id)
    {
        $id = $this->encrypt->decode($id);

        $where = array(
            $this->table.'.ins_id' => $id,
            $this->table.'.subs_id' => $this->encrypt->decode($this->user['user_id'])
        );

        $record = $this->modelInsAlias->fetchRow($where,array(), $this->join);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{

            $where = array(
                $this->table.'.ins_id' => $id,
                $this->table.'.subs_id' => $this->encrypt->decode($this->user['user_id'])
            );
            
            //Delete from the table after its found
            if($this->modelInsAlias->delete($where))
            {
                $this->session->set_flashdata('message', 'Client deleted!');
                redirect($this->data['ctrl_url']);
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url']);
            }
        }
        $this->load->view($this->layout, $this->data);
    }
    
}