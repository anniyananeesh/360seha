<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Config_service{
 
    public static function getGeneralConfig()
    {
        $CI = & get_instance();
        $CI->load->model('config_model');
        
        $where = array(TBL_CONFIG.'.group_name' => 'general');
        $config = $CI->config_model->get_settings($where);
        
        foreach ($config as $c) 
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public static function getImageConfig()
    {
        $CI = & get_instance();
        $CI->load->model('config_model');
        
        $where = array(TBL_CONFIG.'.group_name' => 'image');
        $config = $CI->config_model->get_settings($where);
        
        foreach ($config as $c) 
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }
    
}