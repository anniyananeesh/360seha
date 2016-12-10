<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Video_gallery_model extends Base_model
{
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_VID_GALLERY;
        $this->primary_key = 'vid_id';
    }

    public function saveVideos($save)
    {
    	return $this->db->insert_batch($this->table, $save);
    }

    public function removeVideos($userID)
    {
    	$where = array(
    		'subscriber' => $userID
    	);

    	return parent::delete($where);
    }

}