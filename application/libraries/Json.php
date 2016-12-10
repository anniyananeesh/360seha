<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Json{

	protected $data;

	public function __construct()
	{
		$this->data = array();
	}

	public function parseJsonFile($path)
	{
 
		$str_data = file_get_contents($path);
		$this->data = json_decode($str_data,true);
 		return $this->data;
	}

	public function jsonWriteData($content)
	{
		$dataArray = $this->parseJsonFile(JSON_DIR."/data.json");

		if(empty($content) && $content == "")
		{
			die('you have to pass the content for writing');
		}

		foreach ($content as $key => $value) {
			array_push($dataArray, array(
				"data" => $value
			));
		}

		$fh = fopen(JSON_DIR."/data.json", 'w') or die("Error opening output file");
		fwrite($fh, json_encode($dataArray,JSON_UNESCAPED_UNICODE));
 		fclose($fh);
	}

	public function jsonRemoveData($content)
	{
		$dataArray = $this->parseJsonFile(JSON_DIR."/data.json");
		$retArray = array();
 
		foreach ($dataArray as $key => $value) {
			array_push($retArray, $value["data"]);
		}
 
		$dataArray = array_diff($retArray, $content);
		$finalArray = array();

		foreach ($dataArray as $key => $value) {
			array_push($finalArray, array(
				'data' => $value
			));
		} 
 
		$fh = fopen(JSON_DIR."/data.json", 'w') or die("Error opening output file");
		fwrite($fh, json_encode($finalArray,JSON_UNESCAPED_UNICODE));
 		fclose($fh);
 		return true;
	}
}