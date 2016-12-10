<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'reviews_model', 'modelNameAlias');

        $this->ctrlUrl = '/account/reviews';
        $this->nextUrl = '/account/access';

				$fields = array(TBL_SUBSCRIBERS.'.published', TBL_SUBSCRIBERS.'.subs_title');
        $profileData = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id' => $this->encrypt->decode($this->user['user_id'])));
        $this->data['published']  = $profileData->published;

    }

    public function index()
    {
    	$this->data['page'] = 'reviews/home';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['ctrlUrl'] = $this->ctrlUrl;

        $this->data['records'] = $this->modelNameAlias->fetchFields(array('id','name','message','rating','created_on','is_approve'), array('subscriber' => $this->encrypt->decode($this->user['user_id'])));

        $this->load->view($this->layout, $this->data);
    }

    public function view($id)
    {
        $this->data['page'] = 'reviews/view';
        $this->data['nextUrl'] = $this->nextUrl;
        $this->data['ctrlUrl'] = $this->ctrlUrl;

        $id = $this->encrypt->decode($id);
        $record = $this->modelNameAlias->fetchById($id);

        $post['name'] = $record->name;
        $post['message'] = $record->message;
        $post['rating'] = $record->rating;

        $this->data['post'] = $post;

        if($this->input->post())
        {
            $this->modelNameAlias->save(array('is_approve' => 1), array('id' => $id));
            $this->session->set_flashdata('message', 'Review approved!');
            redirect($this->ctrlUrl);
        }

        $this->load->view($this->layout, $this->data);
    }

    public function delete($review)
    {
        $review = $this->encrypt->decode($review);
        $record = $this->modelNameAlias->fetchById($review);

        if(empty($record))
        {
            $this->session->set_flashdata('message', 'No record found!');
            redirect($this->ctrlUrl);
        }else{

            $where = array(
                'id' => $review
            );

            $this->modelNameAlias->delete($where);

            $this->session->set_flashdata('message', 'Review deleted!');
            redirect($this->ctrlUrl);

        }

    }

    public function approve($review, $status)
    {
        $review = $this->encrypt->decode($review);
        $record = $this->modelNameAlias->fetchById($review);

        if(empty($record))
        {
            $this->session->set_flashdata('message', 'No record found!');
            redirect($this->ctrlUrl);
        }else{

            $this->modelNameAlias->save(array('is_approve' => $status), array('id' => $review));

            $this->session->set_flashdata('message', 'Status updated!');
            redirect($this->ctrlUrl);

        }

    }

}
