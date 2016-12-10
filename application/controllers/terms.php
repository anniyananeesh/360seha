<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms extends PublicController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->data['page'] = 'terms';
        $this->load->view($this->layout, $this->data);
    } 

}