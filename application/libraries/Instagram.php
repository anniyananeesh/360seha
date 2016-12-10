<?php 

class Instagram{
    
    public $user_id;
    public $client_id;
    
    public function __construct( $user_id, $client_id) {
 
        $this->user_id = INSTAGRAM_APP_ID;
        $this->client_id = INSTAGRAM_APP_SECRET;
        
    }
    
    public function get_data($url){
        
        $json = file_get_contents($url);
        $data = json_decode($json);
 
        return $data;
    }
    
    public function get_recent_medias()
    {
        return $this->get_data("https://api.instagram.com/v1/users/$this->user_id/media/recent/?client_id=$this->client_id");
    }
    
}