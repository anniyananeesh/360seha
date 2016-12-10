<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Photo_gallery_model extends Base_model
{
    public $table;
    public $primary_key;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = TBL_IMG_GALLERY;
        $this->primary_key = 'img_id';
    }

    public function save($save, $where = array())
    {
    	return parent::save($save, $where);
    }

    public function delete($where = array())
    {
    	return parent::delete($where);
    }
}