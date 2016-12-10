<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends PublicController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index($country)
    {
        $data['siteCountry'] = $this->encrypt->decode($country);
 		$this->session->set_userdata($data);
 		redirect('/');
    }

}