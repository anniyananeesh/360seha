<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ratheesh
 * 
 */
/* Library service */
Class Newsletter_service {

    public function filter_spam($limit = null, $offset = null) {
        
        $CI = & get_instance();
        $CI->load->model('event_model');
        $result = $CI->event_model->get_active_events($limit, $offset);
        return $result;
    }
    
}