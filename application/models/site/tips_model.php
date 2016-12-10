<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tips_model extends Base_model{

	protected $table;
	protected $primary_key;

	public function __construct()
	{
		$this->table = TBL_GENERAL_TIPS;
		$this->primary_key = 'tips_id';
	}

}