<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriber_timing_model extends Base_model
{
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_SEHA_SUBS_TIMING;
        $this->primary_key = 'id';
        $this->load->library('time_service');
    }

    public function getTodayOpenCloseTimings($userID)
    {
        $day = $this->time_service->getWeekDayInteger(date('l'), false);

        $this->db->select(array('open_time','close_time'))
                 ->from($this->table);
        $this->db->where("(($day BETWEEN start_weekday AND end_weekday)) AND subs_id = $userID");
        $result = $this->db->get();

        if($result->num_rows() > 0)
        {
            return $result->result();
        }else{
            return false;
        }
    }

    public function isOpenNow($userID)
    {
        $day = $this->time_service->getWeekDayInteger(date('l'), false);

        $sql = "SELECT ".TBL_SUBSCRIBERS.".user_id FROM ".TBL_SUBSCRIBERS." WHERE ".TBL_SUBSCRIBERS.".user_id IN (SELECT subs_id FROM ".TBL_SEHA_SUBS_TIMING." WHERE (".$day." BETWEEN ".TBL_SEHA_SUBS_TIMING.".start_weekday AND ".TBL_SEHA_SUBS_TIMING.".end_weekday) AND CURTIME() BETWEEN `open_time` AND `close_time` ) AND ".TBL_SUBSCRIBERS.".user_id = ".$userID." LIMIT 1";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }

    }

    public function save($save, $where = array())
    {
        return parent::save($save, $where);
    }

    public function setUserTiming($save)
    {
        return $this->db->insert_batch($this->table, $save);
    }

    public function unsetUserTimings($userID)
    {
        $where = array(
            'subs_id' => $userID
        );

        return parent::delete($where);

    }

}