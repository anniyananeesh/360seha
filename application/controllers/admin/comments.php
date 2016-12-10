<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends MY_Controller{

    protected $table = TBL_COMMENTS;
    protected $ctrlUrl;
    protected $classViews = 'admin/comments/';

    public function __construct()
    {
        parent::__construct();
        $this->ctrlUrl = HOST_URL.'/admin/comments/';
        $this->load->library('comment_service');
        $this->load->library('subscriber_service');
    }

    public function index()
    {
        $data['content'] = $this->classViews.'index';
        $data['ctrlUrl'] = $this->ctrlUrl;
        $data['title'] = 'User Comments';
        $data['sub_title'] = 'Manage user comments here';
        $data['subscribers'] = $this->subscriber_service->get_subscribers(array(TBL_SUBSCRIBERS.'.published' => 1));

        if($this->input->post())
        {
            $data['comments'] = $this->comment_service->getAllUserComments($this->encrypt->decode($this->input->post("subscriber")));
        }else{
            $data['comments'] = $this->comment_service->getAllUserComments(null);
        }

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
            $this->table.'.approved' => (int) $status
        );

        $where = array(
            $this->table.'.id' => $id,
            $this->table.'.subscriber' => $record->subscriber
        );

        //Get current comment count
        $currentCommentCnt = $this->subscriber_service->getCommentCount($record->subscriber);
        $currentCommentCnt = ($status == 1) ? ++$currentCommentCnt[0]->comments : --$currentCommentCnt[0]->comments;
        
        //If enabled update the comment count and if disable decrement the count
        $this->subscriber_service->updateCommentCount($currentCommentCnt,$record->subscriber);

        $this->load->library('patient_service');
        //Get commented patient reward points
        $currentRwdPts = $this->patient_service->getPatientRewrdPts($record->patient_id);

        //Increment/Decrement the reward points by 2
        $currentRwdPts = ($status == 1) ? $currentRwdPts[0]->reward_points + 2 : $currentRwdPts[0]->reward_points - 2;

        //Update the reward points
        $this->patient_service->setPatientRewrdPts($record->patient_id,$currentRwdPts);
        $this->comment_service->saveComment($save, $where);
        $this->session->set_flashdata('message', 'Comment status updated!');
        redirect($this->ctrlUrl);
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
            $this->table.'.id' => $id
        );

        //Get current comment count
        $currentCommentCnt = $this->subscriber_service->getCommentCount($record->subscriber);
        $currentCommentCnt = --$currentCommentCnt[0]->comments;
        
        //If enabled update the comment count and if disable decrement the count
        $this->subscriber_service->updateCommentCount($currentCommentCnt,$record->subscriber);

        $this->comment_service->removeComment($where);
        $this->session->set_flashdata('message', 'Comment has been removed!');
        redirect($this->ctrlUrl);
    }
}