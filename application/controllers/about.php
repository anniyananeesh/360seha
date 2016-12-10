<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends PublicController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->data['page'] = 'about';
        $this->load->view($this->layout, $this->data);
    } 

}