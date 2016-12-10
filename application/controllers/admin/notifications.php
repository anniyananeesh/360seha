<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;

class Notifications extends MY_Controller{
	
    protected $table = TBL_NOTIFY_JOB;
    protected $ctrlUrl;
    protected $classViews = 'admin/notifications/';

	public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/notifications/';
        $this->load->library('notifications_service');
    }
 
    public function index()
    {
    	$data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
    	$data['title'] = 'Notifications';
    	$data['notifications'] = $this->notifications_service->getNotifications();
    	$this->load->view($this->layout, $data);
    }
 
    public function add()
    {
    	$data['content'] = $this->classViews.'add';
        $data['ctrlUrl'] = $this->ctrlUrl;
    	$data['title'] = 'Send Notification';

    	if($this->input->post())
    	{
    		$this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('lang', 'Language', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_message('%s required', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
            	$save = array(
            		$this->table.'.title' => $this->input->post('title'),
            		$this->table.'.message' => $this->input->post('message'),
                    $this->table.'.not_lang' => $this->input->post('lang'),
            		$this->table.'.send' => 0,
            		$this->table.'.created_on' => date('Y-m-d h:i:s'),
            		$this->table.'.updated_on' => date('Y-m-d h:i:s'),
            	);
 
            	$this->notifications_service->saveNotification($save, array(), TRUE);
            	$this->session->set_flashdata('message', 'Created!');
                redirect($this->ctrlUrl);
            }

    	}
 
    	$this->load->view($this->layout, $data);
    }

    public function edit($id)
    {
    	$data['content'] = $this->classViews.'edit';
        $data['ctrlUrl'] = $this->ctrlUrl;
    	$data['title'] = 'Send Notification';
    	$id = $this->encrypt->decode($id);
    	$data['record'] = $this->notifications_service->getNotificationByPk($id);

    	if($this->input->post())
    	{
    		$this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('lang', 'Language', 'trim|required|xss_clean'); 
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_message('%s required', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
            	$save = array(
            		$this->table.'.title' => $this->input->post('title'),
                    $this->table.'.message' => $this->input->post('message'),
                    $this->table.'.not_lang' => $this->input->post('lang'),
            		$this->table.'.send' => 0,
            		$this->table.'.updated_on' => date('Y-m-d h:i:s'),
            	);

            	$where = array(
            		$this->table.'.job_id' => $id
            	);

            	$this->notifications_service->saveNotification($save,$where);
            	$this->session->set_flashdata('message', 'Updated!');
                redirect($this->ctrlUrl);
            }

    	}
 
    	$this->load->view($this->layout, $data);
    }

    public function delete($id)
    {
    	$id = $this->encrypt->decode($id);
    	$record = $this->notifications_service->getNotificationByPk($id);

    	if(!$record)
    	{
    		redirect(ERROR_404);
            exit(1);
    	}

    	$this->notifications_service->deleteNotification($id);
    	$this->session->set_flashdata('message', 'Notification <b>'.$record->title.'</b> has been deleted!');
      	redirect($this->ctrlUrl);

    }

    public function send($id)
    {
        $id = $this->encrypt->decode($id);
        $record = $this->notifications_service->getNotificationByPk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }

        $config = new Config();
        $config->setApplicationId(ONESIGNAL_APP_ID);
        $config->setApplicationAuthKey(ONESIGNAL_AUTH_KEY);
        $config->setUserAuthKey(ONESIGNAL_USER_KEY);

        $api = new OneSignal($config);
        $newsImageUrl = base_url().'/uploads/news';

        $response = $api->notifications->add([
            'contents' => [
                'en' => strip_tags(stripslashes($record->message))
            ],
            'headings'=> [
                'en' => $record->title
            ],
            'included_segments' => ['All'],
            'data' => [
                'pushType' => 'notifications',
                'url' => '#/app/notifications'
            ]
        ]);

        $this->notifications_service->sendNotification($id);
        $this->session->set_flashdata('message', 'Notification <b>'.$record->title.'</b> has been send!');
        redirect($this->ctrlUrl); 
    }

}