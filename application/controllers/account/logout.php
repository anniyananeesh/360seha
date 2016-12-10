<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends AccountController
{
	public function __construct()
    {
        parent::__construct(); 
    }

    public function index()
    {
        $this->session->sess_destroy();
        redirect(USER_LOGIN);
    }

}