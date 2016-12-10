<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = LAUNCH_LAYOUT; 
    }
    
    public function index($lang = "")
    {
        $lang = ($lang != "") ? $lang : "en";
        $this->session->set_userdata('site_lang', $lang);
        $url = $this->session->userdata('forward_url');
            
        $this->load->library('user_agent');
        redirect($this->agent->referrer());        
    }
    
}