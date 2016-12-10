<?php 

    if ( ! defined('BASEPATH')) 
        exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public $layout;
    
    public function __construct(){
        
        parent::__construct();
        $this->layout = ADMIN_LAYOUT;
    }
    
    public function index(){
        redirect('/adminlogin');
    }
}
