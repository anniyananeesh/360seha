<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Timings extends Account_Controller {
    
    protected $view;
    protected $table = TBL_SUBSCRIBERS;
    protected $timing_table = TBL_SEHA_SUBS_TIMING;

    public function __construct()
    {
        parent::__construct();
        $this->view = SUBSRIBER_URL.'timing';

        $this->load->library('subscriber_timing_service');
        $this->load->library('time_service');
    }

    public function index()
    { 
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'Work Timings Page';
        $this->data['sub_title'] = 'Set up your work timings here';
  
        $record = $this->subscriber_service->get_subscriber_by_pk($this->encrypt->decode($this->user['user_id']));
        $this->data['timings'] = $this->subscriber_timing_service->get_subs_timings($this->encrypt->decode($this->user['user_id']));
        $post = (array) $record;

        $post['open_hrs'] = $record->timing;
        $this->data['post'] = $post;

        if($this->input->post())
        {   
            $save = array(
                $this->table.'.timing' => (int) $this->input->post('open_hrs')
            );

            $where = array(
                $this->table.'.user_id' => $this->encrypt->decode($this->user['user_id'])
            );
                
            $this->subscriber_service->save($save, $where);
            $this->set_timing($this->input->post() , $this->encrypt->decode($this->user['user_id']));
            $this->session->set_flashdata('message', 'Work timings updated!');
            redirect($this->data['ctrl_url']); 
        }
        
        $this->load->view($this->layout, $this->data);
    }

    public function set_timing($post , $id = NULL)
    {
        $where = array($this->timing_table.'.subs_id' => (int) $id);
        $this->subscriber_timing_service->delete($where);

        if($post['open_hrs'] == 3)
        {
            if(isset($post['from_weekday']) && count($post['from_weekday']) > 0)
            {
                for($i = 0; $i < count($post['from_weekday']); $i++){
                    $save_tmg = array(
                        $this->timing_table.'.subs_id' => $id,
                        $this->timing_table.'.start_weekday' => isset($post['from_weekday'][$i]) ? $post['from_weekday'][$i] : NULL,
                        $this->timing_table.'.end_weekday' => isset($post['to_weekday'][$i]) ? $post['to_weekday'][$i] : NULL,
                        $this->timing_table.'.open_time' => date('H:i:s', strtotime( $post['open_time'][$i])),
                        $this->timing_table.'.close_time' => date('H:i:s', strtotime( $post['close_time'][$i])),
                    );
                    $this->subscriber_timing_service->save($save_tmg);
                }
            }
        }
 
        if($post['open_hrs'] == 1)
        {
            $save_tmg = array(
                $this->timing_table.'.subs_id' => $id,
                $this->timing_table.'.start_weekday' => 0,
                $this->timing_table.'.end_weekday' => 6,
                $this->timing_table.'.open_time' => date('H:i:s', strtotime("00:00 AM")),
                $this->timing_table.'.close_time' => date('H:i:s', strtotime("11:59 PM")),
            );
            $this->subscriber_timing_service->save($save_tmg);
        }
        
    }

}