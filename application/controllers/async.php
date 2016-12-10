<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Async extends CI_Controller
{
    protected $siteCountry;
    protected $siteLang;

    public function __construct()
    {
        parent::__construct();
        $this->siteCountry = ($this->session->userdata('siteCountry')) ? $this->session->userdata('siteCountry') : NULL;
        $this->siteLang = ($this->session->userdata('site_lang')) ? $this->session->userdata('site_lang') : 'en';
    }

    private function checkRequest()
    {
    	if (!$this->input->is_ajax_request())
		{
         	exit('Oops! asynchronous request should be a json ');
        }
    }

    private function formatJSONData($rawData)
    {
    	$response = array();

    	if(!empty($rawData))
    	{
    		$response['code'] = 200;
    		$response['data'] = $rawData;
    		$response['response'] = 'OK';
    	}else{
    		$response['code'] = 403;
    		$response['data'] = array();
    		$response['response'] = 'NO_DATA';
    	}

    	return $response;
    }

    public function city($countryID)
    {
    	$this->checkRequest();

    	$this->load->model(SITE_MODELS.'city_model');
    	$result = (array) $this->city_model->fetchFields(array('name as name_en','name_ar','id'), array('country_fk'=>$countryID), array('orderby'=>'ASC'));
    	echo json_encode($this->formatJSONData($result));
    }

    public function view_category($catID = '')
    {
    	$this->load->model(SITE_MODELS.'subscriber_model');
    	$data = array();

    	$fields = array(
            TBL_SUBSCRIBERS.'.user_id',
    		TBL_SUBSCRIBERS.'.subs_title as subs_title_en',
    		TBL_SUBSCRIBERS.'.subs_title_ar',
    		TBL_SUBSCRIBERS.'.subs_public_profile',
    		TBL_SUBSCRIBERS.'.subs_profile_img as logo',
            TBL_SUBSCRIBERS.'.subs_address_1 as address_line1_en',
            TBL_SUBSCRIBERS.'.subs_address_1_ar as address_line1_ar',
            TBL_SUBSCRIBERS.'.subs_address_2 as address_line2_en',
            TBL_SUBSCRIBERS.'.subs_address_2_ar as address_line2_ar',
    		TBL_COUNTRIES.'.name_en as country_name_en',
    		TBL_COUNTRIES.'.name_ar as country_name_ar',
    		TBL_CITY.'.name as city_name_en',
    		TBL_CITY.'.name_ar as city_name_ar'
    	);

    	$join = array(
    		array('table' => TBL_CITY, 'condition' => TBL_CITY.'.id = '.TBL_SUBSCRIBERS.'.subs_state', 'join_type' => 'LEFT'),
            array('table' => TBL_COUNTRIES, 'condition' => TBL_COUNTRIES.'.id = '.TBL_SUBSCRIBERS.'.subs_country', 'join_type' => 'LEFT')
    	);

        if(!empty($this->siteCountry))
        {
            //TBL_SUBSCRIBERS.'.subs_cat_id'=>$catID,
            $where = array(TBL_SUBSCRIBERS.'.published'=>1, TBL_SUBSCRIBERS.'.subs_country'=>(int) $this->siteCountry, TBL_SUBSCRIBERS.'.subs_cat_id !=' => 36);
        }else{
            $where = array(TBL_SUBSCRIBERS.'.published'=>1, TBL_SUBSCRIBERS.'.subs_cat_id !=' => 36);
        }

        if(!empty($catID) && $catID != 'all')
        {
            $where[TBL_SUBSCRIBERS.'.subs_cat_id'] = $catID;
        }

    	$data['subscriberList'] = $this->subscriber_model->fetchFields($fields, $where, array(TBL_SUBSCRIBERS.'.is_featured'=>'DESC'), 10000000, null, $join);
        $data['catID'] = $catID;
        $data['lan'] = $this->siteLang;

        $this->load->model(SITE_MODELS.'photo_gallery_model','modelPhotoAlias');

    	$this->load->view('home/partials/view-category', $data);
    }

    public function add_review($userID)
    {
        if(empty($userID) || $userID == '')
        {
            die('oops! cannot identify the user');
            exit();
        }
        $userID = $this->encrypt->decode($userID);

        $this->load->model(SITE_MODELS.'subscriber_model');
        $data = array();

        $fields = array(
            TBL_SUBSCRIBERS.'.subs_email',
            TBL_SUBSCRIBERS.'.user_id'
        );

        $data['profileData'] = $this->subscriber_model->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
        $data['lan'] = $this->siteLang;

        $this->load->view('home/partials/add-review', $data);
    }

    public function post_review()
    {
        $this->checkRequest();

        $userID = $this->encrypt->decode($this->input->post("_id" , TRUE));
        $userEmail = $this->input->post("_email" , TRUE);
        $fullName = $this->input->post("full_name" , TRUE);
        $recommend = $this->input->post("recommend" , TRUE);
        $message = $this->input->post("message" , TRUE);

        if($fullName != '' && $message != '' && $recommend != '')
        {
            $this->load->model(SITE_MODELS.'subscriber_model');

            $fields = array(
                TBL_SUBSCRIBERS.'.subs_title'
            );

            $userDetails = $this->subscriber_model->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
            $userName = $userDetails->subs_title;
            $recommend = ($recommend == 0) ? 'No' : 'Yes';

            $this->load->library('email');
            $this->config->load('email',true);
            $this->email->from(($email != '') ? $email : INFO_EMAIL);
            $this->email->to($userEmail);
            $this->email->subject(SITE_NAME.' - Contact Form');

            include_once(MISC_PATH."/emails.php");
            $message = $review_message;

            $this->email->message($message);

            if ($this->email->send())
            {
                $response['code'] = 200;
                $response['message'] = 'Email has been send';
                $response['response'] = 'MAIL_SEND';

            }else{

                $response['code'] = 400;
                $response['message'] = 'Something went wrong :(';
                $response['response'] = 'MAIL_NOT_SEND';
            }

        }else{
            $response['code'] = 400;
            $response['message'] = 'All fields are required';
            $response['response'] = 'MANDATORY_FIELD_MISSING';
        }

        echo json_encode($response);

    }


    public function newsletter_signup()
    {
    	$this->checkRequest();

    	$response = array();
    	$email = $this->input->post('e');

    	$this->load->model(SITE_MODELS.'newsletter_model');
    	$where = array('reg_email' => $email);

    	if($this->newsletter_model->isExist($where))
    	{
    		$response['code'] = 200;
    		$response['message'] = 'Email already registered';
    		$response['response'] = 'USER_FOUND';

    	}else{

    		$save = array(
    			'reg_email' => $email,
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')
    		);

    		$this->newsletter_model->save($save);

    		$response['code'] = 200;
    		$response['message'] = 'Email successfully registered';
    		$response['response'] = 'EMAIL_REG';
    	}

    	echo json_encode($response);
    }

    public function send_message($profileID)
    {
        if(empty($profileID) || $profileID == '')
        {
            die('oops! cannot identify the user');
            exit();
        }
        $profileID = $this->encrypt->decode($profileID);

        $this->load->model(SITE_MODELS.'subscriber_model');

        $data = array();

        $fields = array(
            TBL_SUBSCRIBERS.'.subs_email',
            TBL_SUBSCRIBERS.'.user_id'
        );

        $data['profileData'] = $this->subscriber_model->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$profileID));

        $this->load->view('home/partials/send-message', $data);
    }

    public function post_message()
    {
        $this->checkRequest();

        $userID = $this->encrypt->decode($this->input->post("_id" , TRUE));
        $userEmail = $this->input->post("_email" , TRUE);
        $fullName = $this->input->post("full_name" , TRUE);
        $email = $this->input->post("email" , TRUE);
        $contactNo = $this->input->post("contact_no" , TRUE);
        $message = $this->input->post("message" , TRUE);

        if($fullName != '' && $email != '' && $message != '')
        {
            $this->load->model(SITE_MODELS.'subscriber_model');

            $fields = array(
                TBL_SUBSCRIBERS.'.subs_title'
            );

            $userDetails = $this->subscriber_model->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
            $userName = $userDetails->subs_title;

            $this->load->library('email');
            $this->config->load('email',true);
            $this->email->from(($email != '') ? $email : INFO_EMAIL);
            $this->email->to($userEmail);
            $this->email->subject(SITE_NAME.' - Contact Form');

            include_once(MISC_PATH."/emails.php");
            $message = $send_message;

            $this->email->message($message);

            if ($this->email->send())
            {
                $response['code'] = 200;
                $response['message'] = 'Email has been send';
                $response['response'] = 'MAIL_SEND';

            }else{

                $response['code'] = 400;
                $response['message'] = 'Something went wrong :(';
                $response['response'] = 'MAIL_NOT_SEND';
            }

        }else{
            $response['code'] = 400;
            $response['message'] = 'All fields are required';
            $response['response'] = 'MANDATORY_FIELD_MISSING';
        }

        echo json_encode($response);

    }

    public function post_appointment()
    {
        $this->checkRequest();

        $userID = $this->encrypt->decode($this->input->post("_id" , TRUE));

        $fullName = $this->input->post("full_name" , TRUE);
        $email = $this->input->post("email" , TRUE);
        $contactNo = $this->input->post("contact_no" , TRUE);
        $message = $this->input->post("message" , TRUE);
        $appDate = $this->input->post('appointment_date', TRUE);
        $department = $this->input->post('department', TRUE);

        if($fullName != '' && $email != '' && $message != '' && $contactNo != '' && $appDate != '' && $department != '')
        {
            $this->load->model(SITE_MODELS.'subscriber_model');

            $fields = array(
                TBL_SUBSCRIBERS.'.subs_title',
                TBL_SUBSCRIBERS.'.subs_email'
            );

            $userDetails = $this->subscriber_model->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$userID));
            $userEmail = $userDetails->subs_email;
            $userName = $userDetails->subs_title;

            $appDate = date('d F Y', strtotime($appDate));

            $this->load->library('email');
            $this->config->load('email',true);
            $this->email->from(($email != '') ? $email : INFO_EMAIL);
            $this->email->to($userEmail);
            $this->email->subject(SITE_NAME.' - Contact Form');

            include_once(MISC_PATH."/emails.php");
            $message = $appointment_email;

            $this->email->message($message);

            if ($this->email->send())
            {
                $response['code'] = 200;
                $response['message'] = 'Appointment request has been send';
                $response['response'] = 'MAIL_SEND';

            }else{

                $response['code'] = 400;
                $response['message'] = 'Something went wrong :(';
                $response['response'] = 'MAIL_NOT_SEND';
            }

        }else{
            $response['code'] = 400;
            $response['message'] = 'All fields are required';
            $response['response'] = 'MANDATORY_FIELD_MISSING';
        }

        echo json_encode($response);

    }

    public function appointment($profileID)
    {
        if(empty($profileID) || $profileID == '')
        {
            die('oops! cannot identify the user');
            exit();
        }
        $profileID = $this->encrypt->decode($profileID);

        $this->load->model(SITE_MODELS.'subscriber_model');

        $data = array();

        $fields = array(
            TBL_SUBSCRIBERS.'.subs_email',
            TBL_SUBSCRIBERS.'.user_id'
        );

        $this->load->model(SITE_MODELS.'department_model', 'modelDepartmentAlias');

        $data['profileData'] = $this->subscriber_model->fetchRowFields($fields, array(TBL_SUBSCRIBERS.'.user_id'=>$profileID));

        //Get all departments for subscriber
        $data['departments'] = $this->modelDepartmentAlias->fetchFields(array('dept_title as dept_title_en', 'dept_title_ar'), array('subscriber'=>$profileID,'show_status'=>1));
        $data['lan'] = $this->siteLang;

        $this->load->view('home/partials/send-appointment', $data);
    }

    public function get_nearby()
    {
        $lat = (isset($_GET['_lt']) && $_GET['_lt'] != '') ? $_GET['_lt'] : FALSE;
        $long = (isset($_GET['_lng']) && $_GET['_lng'] != '') ? $_GET['_lng'] : FALSE;
        $rad = (isset($_GET['_r']) && $_GET['_r'] != '') ? $_GET['_r'] : 15;

        if($lat && $long)
        {

            $this->load->model(SITE_MODELS.'subscriber_model', 'modelNameAlias');

            $records = $this->modelNameAlias->getNearbyUsers( $lat, $long, $rad);

            if($records)
            {
                $retArray = array();

                foreach ($records as $key => $value)
                {
                    switch ($value->is_featured)
                    {
                        case 1:
                            $icon = base_url().'assets/home/img/ic_featured.png';  //Featured marker
                            break;

                        case 0:

                            if($value->category == 39 && $value->emergency != 1)
                            {
                                $icon = base_url().'assets/home/img/ic_normal.png'; //Pharmacy with emergency : RED WITH ICON
                            }
                            else if($value->emergency == 1)
                            {
                                $icon = base_url().'assets/home/img/ic_red.png'; //Subscriber with emergency marker  : RED
                            }
                            else
                            {
                                $icon = base_url().'assets/home/img/ic_normal.png'; //The normalk blue marker : BLUE
                            }

                            break;

                        default:
                            $icon = base_url().'assets/home/img/ic_normal.png'; //The normalk blue marker : BLUE
                            break;
                    }

                    $html = '';

                    $emergency = ($value->emergency == 1) ? '<span class="info-emergency">24hrs</span>' : '';

                    $image = null;

                    if($value->type == 3){

                       $image = null;
                    }else {

                       $image = ($value->logo != null) ? SUBS_IMAGE_SHOW_PATH . $value->logo : SUBS_PHOTO_SHOW_PATH . $value->image;
                    }

                    if($image != null){
                       $classPull = ($this->siteLang == 'en') ? 'pull-left' : 'pull-right';
                       $image = '<img src="'.$image.'" width="100" class="'.$classPull.'"/>';
                    }

                    $featuredTxt = ($this->siteLang == 'en') ? 'Featured' : 'Featured';
                    $featuredClass = ($this->siteLang == 'en') ? 'ltr' : 'rtl';
                    $featured = ($value->is_featured == 1) ? '<div class="featured '.$featuredClass.'">'.$featuredTxt.'</div>' : '';

                    /*if($this->siteLang == 'en')
                    {
                        $html .= '<div class="info-item" data-url="'.HOST_URL.'/'.$value->url.'">
                            '.$image.'
                            <div class="info-item-content ltr">
                                <h2>'.$value->title_en.' '.$emergency.'</h2>
                                <p>'.$value->address_en.', '.$value->city_en.'</p>
                            </div>
                            '.$featured.'

                        </div>';

                    }
                    else
                    {
                        $html .= '<div class="info-item" data-url="'.HOST_URL.'/'.$value->url.'" dir="rtl">
                            '.$image.'
                            <div class="info-item-content rtl">
                                <h2>'.$value->{title_.$this->siteLang}.' '.$emergency.'</h2>
                                <p>'.$value->{address_.$this->siteLang}.', '.$value->{city_.$this->siteLang}.'</p>
                            </div>

                            '.$featured.'

                        </div>';

                    }*/

                    $html = '<div class="card" data-url="'.HOST_URL.'/'.$value->url.'">
                          '.$image.'
                            <h1>'.$value->{title_.$this->siteLang}.' '.$emergency.'</h1>
                            <p>'.$value->{address_.$this->siteLang}.', '.$value->{city_.$this->siteLang}.'</p>
                      <ul>
                                <li>'.$value->views.' <i class="ion-eye"></i></li>
                            </ul>

                    </div>';

                    /*<!--POPUP-->
                    <div class="card">
                          <img src="images/avatar.jpg" alt="Clinic">
                            <h1>Sharjah Holistic Health</h1>
                            <p> King Abdul Aziz Street - Opposite Citi Bank, Mezzanine Floor</p>
                      <ul>
                                <li>234 <i class="ion-eye"></i></li>
                            </ul>

                    </div>
                    <!--POPUP-->*/

                    $val = array(

                        'lat' => $value->latitude,
                        'lon' => $value->longitude,
                        //'html'=> $html,
                        'user' => $this->encrypt->encode($value->user_id),
                        'icon' => $icon
                    );

                    array_push($retArray, $val);
                }

                $response['code'] = 200;
                $response['data'] = $retArray;
                $response['message'] = 'Data found';
                $response['response'] = 'MESSAGE_OK';
            }
            else
            {
                $response['code'] = 202;
                $response['message'] = 'No data has been found';
                $response['response'] = 'NO_DATA';
            }

        }
        else
        {
            $response['code'] = 400;
            $response['message'] = 'Position coordinates are missing';
            $response['response'] = 'COORDS MISSING';
        }

        echo json_encode($response);
    }

    public function getUserInfoWindow($userID)
    {
       if(empty($userID))
       {
         $response['code'] = 400;
         $response['message'] = 'Params are missing';
         $response['response'] = 'PARAMS MISSING';
       }
       else {

          $this->load->model(SITE_MODELS.'subscriber_model', 'modelNameAlias');
          $userID = $this->encrypt->decode($userID);
          $user = $this->modelNameAlias->getUserDetails($userID);

          $html = '';

          $emergency = ($user->emergency == 1) ? '<span class="info-emergency">24hrs</span>' : '';

          $image = null;

          if($user->type == 3){

             $image = null;
          }else {

             $image = ($user->logo != null) ? SUBS_IMAGE_SHOW_PATH . $user->logo : SUBS_PHOTO_SHOW_PATH . $user->image;
          }

          if($image != null){
             $classPull = ($this->siteLang == 'en') ? 'pull-left' : 'pull-right';
             $image = '<img src="'.$image.'" width="100" class="'.$classPull.'"/>';
          }

          $html = '

          <a href="'.HOST_URL.'/'.$user->url.'" class="card">
                '.$image.'
                <i class="ion-close-circled info-close" onclick="javascript: return false;"></i>
                  <h1>'.$user->{title_.$this->siteLang}.' '.$emergency.'</h1>
                  <p>'.$user->{address_.$this->siteLang}.', '.$user->{city_.$this->siteLang}.'</p>
            <ul>
                      <li>'.$user->views.' <i class="ion-eye"></i></li>
                  </ul>

          </a>';

          $response['code'] = 200;
          $response['message'] = 'Data results found';
          $response['data'] = array();
          $response['html'] = $html;
          $response['response'] = 'STATUS OK';

       }

       echo json_encode($response);

    }

}
