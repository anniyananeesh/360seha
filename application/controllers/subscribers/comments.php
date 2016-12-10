<?php 

if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Comments extends CI_Controller {

	public $layout;
    public $menu_access;

    public function __construct()
    {

        parent::__construct();
        $this->layout = SUBSCRIBER_LAYOUT;
 
        $this->load->library('subscriber_service');
        $this->load->library('comment_service');
        
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

        $data['content'] = SUBSRIBER_URL.'comments/index';
        
        $data['title'] = 'User Comments';
        $data['sub_title'] = 'Manage your user comments here';
        $data['comments'] = $this->comment_service->getAllComments((int) $this->encrypt->decode($this->user['subs_user_id']));

        $this->load->view($this->layout, $data);
    }

    public function status($id,$status)
    {

        $id = $this->encrypt->decode($id);
        $record = $this->comment_service->getCommentByPk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }

        $save = array(
            TBL_COMMENTS.'.approved' => (int) $status
        );

        $where = array(
            TBL_COMMENTS.'.id' => $id,
            TBL_COMMENTS.'.subscriber' => (int) $this->encrypt->decode($this->user['subs_user_id'])
        );

        //Get current comment count
        $currentCommentCnt = $this->subscriber_service->getCommentCount((int) $this->encrypt->decode($this->user['subs_user_id']));
        $currentCommentCnt = ($status == 1) ? ++$currentCommentCnt[0]->comments : --$currentCommentCnt[0]->comments;
        
        //If enabled update the comment count and if disable decrement the count
        $this->subscriber_service->updateCommentCount($currentCommentCnt,(int) $this->encrypt->decode($this->user['subs_user_id']));
        $this->comment_service->saveComment($save, $where);

        $this->session->set_flashdata('message', 'Comment status updated!');
        redirect( SUBSRIBER_URL.'comments/');

    }

    public function delete($id)
    {

        $id = $this->encrypt->decode($id);
        $record = $this->comment_service->getCommentByPk($id);

        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }
 
        $where = array(
            TBL_COMMENTS.'.id' => $id
        );

        //Get current comment count
        $currentCommentCnt = $this->subscriber_service->getCommentCount((int) $this->encrypt->decode($this->user['subs_user_id']));
        $currentCommentCnt = --$currentCommentCnt[0]->comments;
        
        //If enabled update the comment count and if disable decrement the count
        $this->subscriber_service->updateCommentCount($currentCommentCnt,(int) $this->encrypt->decode($this->user['subs_user_id']));

        $this->comment_service->removeComment($where);

        $this->session->set_flashdata('message', 'Comment has been removed!');
        redirect( SUBSRIBER_URL.'comments/');

    }

}