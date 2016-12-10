<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy_policy extends PublicController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->data['page'] = 'privacy';

        $this->load->view($this->layout, $this->data);
    } 

}