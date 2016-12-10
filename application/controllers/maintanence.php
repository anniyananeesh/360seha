<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintanence extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $generalConfig = $this->getGeneralConfig();
        $data["maintain_text"] = $generalConfig["maintain_text"]["value"];
        
        if($generalConfig["maintenance"]["value"] == 0)
        {
            redirect('en/');
        }
        $this->load->view('home/uc',$data);
    }
    
    public function index()
    {
        //TODO Nothing
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
    
}