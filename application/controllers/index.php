<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller 
{
 
    public function __construct()
    {
        parent::__construct();    
    }

    public function index()
    {
    	$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); //creates the various parts
        $subdomain_name = $subdomain_arr[0]; //assigns the first part
        
        if(!in_array($subdomain_name, array('emirates','kuwait','bahrain','saudi-arabia','oman','qatar')))
    	{
    		$countryCode = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
        	$countryCode = $countryCode['geoplugin_countryCode'];
        
	        switch($countryCode)
	        {
	            case ('AE' || 'UAE'):
	                header('Location:http://emirates.360seha.com');
	            break;

	            default: header('Location:http://kuwait.360seha.com');
	        }
    	}
    	else
    	{
    		
    	}

    }

}