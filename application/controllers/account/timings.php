<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timings extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'subscriber_timing_model', 'modelNameAlias');
        $this->load->library('time_service');
        $this->ctrlUrl = '/account/timings';
        $this->nextUrl = '/account/departments';
    }
    
    public function index()
    {
        $this->data['page'] = 'timings';
        $this->data['nextUrl'] = $this->nextUrl;
 
        $fields = array(
        	TBL_SUBSCRIBERS.'.timing',
        	TBL_SUBSCRIBERS.'.published'
        ); 

        $userID = $this->encrypt->decode($this->user['user_id']);

        $profileData = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $this->data['published']  = $profileData->published;

        //Get the already save timing from DB
        $this->data['timings'] = $this->modelNameAlias->fetchFields(array('start_weekday','end_weekday','open_time','close_time'),array('subs_id' => $userID), array('id'=>'ASC'));

        $post['type'] = $profileData->timing;

        $this->data['post'] = $post;

        if($this->input->post())
        {
        	$this->load->library('form_validation');
            $this->form_validation->set_rules('type', 'Type of your timings', 'trim|required|xss_clean'); 

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {

            	$save = array(
                    TBL_SUBSCRIBERS.'.timing' => $this->input->post('type'),
                    TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
                ); 

                $where = array(
                	TBL_SUBSCRIBERS.'.user_id' => $userID
                ); 

                $this->modelUserAlias->save( $save, $where);

                //Set the new timings to database
                $this->setUserTimings($this->input->post(), $userID);

                $this->session->set_flashdata('message', 'Details updated!');
                redirect($this->ctrlUrl); 

            }else{

	        	$this->data['Error'] = 'Y';
	           	$this->data['MSG'] = 'Your form has errors';

	        }

        }

        $this->load->view($this->layout, $this->data);
    } 

    private function setUserTimings($post, $userID)
    {
        $this->modelNameAlias->unsetUserTimings($userID);

        if($post['type'] == 3)
        {
            if(isset($post['from_weekday']) && count($post['from_weekday']) > 0)
            {

                $save = array();

                for($i = 0; $i < count($post['from_weekday']); $i++)
                {

                    array_push($save, array(
                        'subs_id' => $userID,
                        'start_weekday' => isset($post['from_weekday'][$i]) ? $post['from_weekday'][$i] : NULL,
                        'end_weekday' => isset($post['to_weekday'][$i]) ? $post['to_weekday'][$i] : NULL,
                        'open_time' => date('H:i:s', strtotime( $post['open_time'][$i])),
                        'close_time' => date('H:i:s', strtotime( $post['close_time'][$i])),
                    ));
 
                }

                $this->modelNameAlias->setUserTiming($save);

            }
        }
 
        if($post['type'] == 1)
        {
            $save = array(
                'subs_id' => $userID,
                'start_weekday' => 0,
                'end_weekday' => 6,
                'open_time' => date('H:i:s', strtotime("00:00 AM")),
                'close_time' => date('H:i:s', strtotime("11:59 PM")),
            );

            $this->modelNameAlias->save($save);
        }
        
    }

}