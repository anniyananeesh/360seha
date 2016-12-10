<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends AccountController
{
	protected $ctrlUrl; 

    public function __construct()
    {
        parent::__construct(); 
        $this->ctrlUrl = '/account/access'; 
    }
    
    public function index()
    {
        $this->data['page'] = 'access'; 

        $fields = array(
        	TBL_SUBSCRIBERS.'.subs_access',
        	TBL_SUBSCRIBERS.'.published'
        );  

        $record = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($this->user['user_id'])));
        $this->data['published'] = $record->published;

        $this->data['menuAccess'] = (!empty($record->subs_access)) ? unserialize($record->subs_access) : array();

        if($this->input->post())
        {
            $menuAccessPost = $this->input->post('access');
            
            $save = array(
                TBL_SUBSCRIBERS.'.subs_access' => ($menuAccessPost) ? serialize($menuAccessPost) : NULL,
                TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
            );  

            $where = array(
                TBL_SUBSCRIBERS.'.user_id' => (int) $this->encrypt->decode($this->user['user_id'])
            ); 

            $this->modelUserAlias->save( $save, $where);

            $this->session->set_flashdata('message', 'Access updated!');
            redirect($this->ctrlUrl); 

        }

        $this->load->view($this->layout, $this->data);
    } 

}