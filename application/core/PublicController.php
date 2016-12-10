<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/Mobile_Detect.php';

class PublicController extends CI_Controller{

    public $publicConfig;

	public function __construct()
    {
        parent::__construct();
        $this->publicConfig = $this->getGeneralConfig();

        
    }

	public function getGeneralConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'general');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c) 
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }
    
    public function getNewsLetterConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'newsletter');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c) 
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }
    
    public function getImageConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'image');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c) 
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }
    
    public function getMailConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'mail');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c) 
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public function getTopAdvert()
    {
        $this->load->library('advertise_service');
        $where = array(
            TBL_ADS.'.ad_area' => AD_BANNER_HOME,
            TBL_ADS.'.show_status' => 1  
        );
        return $this->advertise_service->random_ads($where);
    }
    
}