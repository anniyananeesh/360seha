<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends AccountController
{
	protected $ctrlUrl;
	protected $nextUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS."country_model", 'modelCountryAlias');
        $this->load->model(SITE_MODELS."city_model", 'modelCityAlias');

        $this->ctrlUrl = '/account/location';
        $this->nextUrl = '/account/contact';
    }
    
    public function index()
    {
        $this->data['page'] = 'location';
        $this->data['nextUrl'] = $this->nextUrl;
 
        $fields = array(
        	TBL_SUBSCRIBERS.'.subs_country',
        	TBL_SUBSCRIBERS.'.subs_state',
            TBL_SUBSCRIBERS.'.subs_lat_id',
            TBL_SUBSCRIBERS.'.subs_long_id',
            TBL_SUBSCRIBERS.'.subs_address_1 AS address_en',
            TBL_SUBSCRIBERS.'.subs_address_1_ar AS address_ar',
            TBL_SUBSCRIBERS.'.parking_en',
            TBL_SUBSCRIBERS.'.metro_en',
            TBL_SUBSCRIBERS.'.bus_station_en',
            TBL_SUBSCRIBERS.'.parking_ar',
            TBL_SUBSCRIBERS.'.metro_ar',
            TBL_SUBSCRIBERS.'.bus_station_ar',
        	TBL_SUBSCRIBERS.'.published'
        ); 

        $userID = $this->encrypt->decode($this->user['user_id']);

        $this->data['profileData'] = $this->modelUserAlias->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));

        //Load all country from DB
        $this->data['country'] = $this->modelCountryAlias->fetchFields(array('id','name_en','name_ar'), array(), array('orderby'=>'ASC'));

        if($this->data['profileData']->subs_country != NULL)
        {
            $this->data['city'] = $this->modelCityAlias->fetchFields(array('id','name as name_en','name_ar'), array('country_fk' => $this->data['profileData']->subs_country), array('orderby'=>'ASC'));
        }

        if($this->data['profileData']->subs_lat_id != NULL && $this->data['profileData']->subs_long_id != NULL)
        {
            //Get latitude and longitude from DB
            $this->data['_lat'] = $this->data['profileData']->subs_lat_id;
            $this->data['_long'] = $this->data['profileData']->subs_long_id;

        }else{

            //Get latitude and longitude based on IP
            $location = json_decode(file_get_contents('http://freegeoip.net/json/83.110.195.130'));//$_SERVER['REMOTE_ADDR']
            $this->data['_lat'] = $location->latitude;
            $this->data['_long'] = $location->longitude;

        }

        if($this->input->post())
        {
        	$this->load->library('form_validation');
            $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');  
            $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');

            $this->form_validation->set_rules('parking_en', 'Parking', 'trim|xss_clean');
            $this->form_validation->set_rules('bus_station_en', 'Bus station', 'trim|xss_clean');
            $this->form_validation->set_rules('metro_en', 'Metro Station', 'trim|xss_clean');

            $this->form_validation->set_rules('parking_ar', 'Parking', 'trim|xss_clean');
            $this->form_validation->set_rules('bus_station_ar', 'Bus station', 'trim|xss_clean');
            $this->form_validation->set_rules('metro_ar', 'Metro Station', 'trim|xss_clean');

            $this->form_validation->set_rules('address_en', 'Address English', 'trim|required|xss_clean');
            $this->form_validation->set_rules('address_ar', 'Address Arabic', 'trim|required|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
            	$save = array(
                    TBL_SUBSCRIBERS.'.subs_country' => $this->input->post("country", TRUE),
                    TBL_SUBSCRIBERS.'.subs_state' => $this->input->post("city", TRUE),
                    TBL_SUBSCRIBERS.'.subs_lat_id' => $this->input->post("_lat", TRUE),
                    TBL_SUBSCRIBERS.'.subs_long_id' => $this->input->post("_long", TRUE),
                    TBL_SUBSCRIBERS.'.subs_address_1' => $this->input->post("address_en", TRUE),
                    TBL_SUBSCRIBERS.'.subs_address_1_ar' => $this->input->post("address_ar", TRUE),
                    TBL_SUBSCRIBERS.'.parking_en' => $this->input->post("parking_en", TRUE),
                    TBL_SUBSCRIBERS.'.bus_station_en' => $this->input->post("bus_station_en", TRUE),
                    TBL_SUBSCRIBERS.'.metro_en' => $this->input->post("metro_en", TRUE),
                    TBL_SUBSCRIBERS.'.parking_ar' => $this->input->post("parking_ar", TRUE),
                    TBL_SUBSCRIBERS.'.bus_station_ar' => $this->input->post("bus_station_ar", TRUE),
                    TBL_SUBSCRIBERS.'.metro_ar' => $this->input->post("metro_ar", TRUE),
                    TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s')
                ); 

                $where = array(
                	TBL_SUBSCRIBERS.'.user_id' => $userID
                ); 

                $this->modelUserAlias->save( $save, $where);

                $this->session->set_flashdata('message', 'Location updated!');
                redirect($this->ctrlUrl); 

            }else{

	        	$this->data['Error'] = 'Y';
	           	$this->data['MSG'] = 'Your form has errors';

	        }

        }

        $this->load->view($this->layout, $this->data);
    } 

}