<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/Mobile_Detect.php';

class MY_Controller extends CI_Controller{

    public $layout;
    public $root_login;

    public function __construct()
    {
        parent::__construct();
        $this->layout = ADMIN_LAYOUT;

        $this->load->library('session');
        $userSession = $this->session->userdata('logged_in');

        if (empty($userSession))
        {
            $this->session->set_userdata('refered_from', current_url());
            redirect(ADMIN_LOGIN_URL);
        }

        $this->user = $userSession;
        $this->root_login = false;
    }

    public function getImageConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'image');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public static function sendFormatedArrayString($array)
    {
        $string = '';
        $length = count($array) - 1;
        foreach ($array AS $key=>$value)
        {
            if($value != '')
            {
                $string .= '"'.$value.'"';
                if($length > $key)
                {$string .= ',';}
            }
        }
        return $string;
    }

    public function getNewsLetterConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'newsletter');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public function getGeneralConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'general');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public function getMailConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'mail');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    //TODO has Access function once user is activated
    public function hasAccess($user_id, $access)
    {

    }

    public function getPagination($uri,$perPage,$totalRows)
    {
        $this->load->library('pagination');

        $uri = $uri.http_build_query($_GET);
        $uri = $this->remove_querystring_var($uri, 'limit');
        $uri = empty($uri) ? '?' : $uri;
        $_GET['per_page'] = 5;

        $config['total_rows'] = $totalRows;
        $config['base_url'] = $uri;
        $config['per_page'] = $perPage;

        $config['full_tag_open'] = '<nav class="m-t-lg"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'limit';

        $config['num_links'] = 5;
        $this->pagination->initialize($config);

    }

    private static  function remove_querystring_var($url, $key) {
        $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
        $url = substr($url, 0, -1);
        return $url;
    }

}

class AccountController extends CI_Controller
{
    public $layout;
    public $user;
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->layout = USER_LAYOUT;

        $this->load->model(SITE_MODELS."subscriber_model", 'modelUserAlias');

        //Check if the user is logged in or not
        $this->user = $this->session->userdata('user_logged');

        $currentClassLoader = strtolower($this->router->fetch_class());

        $this->data['lan'] = ($this->session->userdata('site_lang')) ? $this->session->userdata('site_lang') : 'en';
        $this->session->set_userdata('site_lang', $this->data['lan']);

        $this->data['dir'] = ($this->data['lan'] == 'ar') ? 'rtl' : 'ltr';
        $this->data['menuAccess'] = array();

        if (empty($this->user))
        {
            $this->session->set_userdata('refered_from', current_url());

            //If the page is not signin and forgot password page, redirect to sign in page else this will end in inifinte loop :(
            if($currentClassLoader != 'signin' && $currentClassLoader != 'forgot')
            {
                redirect(USER_LOGIN);
            }
        }else{

          $menuAccess = $this->modelUserAlias->fetchRowFields(array('subs_access','subs_cat_id'), array('user_id' => (int) $this->encrypt->decode($this->user['user_id'])));
          $this->data['userCategory'] = $menuAccess->subs_cat_id;
   	      $this->data['menuAccess'] = (!empty($menuAccess)) ? unserialize($menuAccess->subs_access) : array();
          $this->data['rootLogin'] = $this->session->userdata('root_login');

        }

    }

}

class PublicController extends CI_Controller
{
    public $publicConfig;
    public $layout;
    public $siteCountry;
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->publicConfig = $this->data['publicConfig'] = $this->getGeneralConfig();
        $this->layout = SITE_LAYOUT;

        $subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); //creates the various parts
        $subdomain_name = $subdomain_arr[0]; //assigns the first part
        $countryID = NULL;

        $subdomain_name = (in_array($subdomain_name, array('emirates','kuwait','bahrain','saudi-arabia','oman','qatar'))) ? $subdomain_name : FALSE;

        switch ($subdomain_name) {
            case 'emirates':
                $countryID = 1;
                break;

            case 'saudi-arabia':
                $countryID = 5;
                break;

            case 'qatar':
                $countryID = 6;
                break;

            case 'bahrain':
                $countryID = 7;
                break;

            default:
                $countryID = 1;
                break;
        }

        $countrySessionData = array(
            'siteCountry' => $countryID
        );

        //Sets the country session
        $this->session->set_userdata($countrySessionData);

        $this->siteCountry = $countryID;

        $this->data['lan'] = ($this->session->userdata('site_lang')) ? $this->session->userdata('site_lang') : 'en';
        $this->session->set_userdata('site_lang', $this->data['lan']);

        $this->data['dir'] = ($this->data['lan'] == 'ar') ? 'rtl' : 'ltr';

    }

    public function getGeneralConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'general');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public function getNewsLetterConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'newsletter');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public function getImageConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'image');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public function getMailConfig()
    {
        $this->load->model('config_model');
        $where = array(TBL_CONFIG.'.group_name' => 'mail');
        $config = $this->config_model->get_settings($where);
        foreach ($config as $c)
        {$forms[$c->config_key] = $forms[$c->config_key] = array('key'=>$c->group_name.'['.$c->config_key.'][]', 'id'=>$c->config_key, 'value'=>$c->config_value);}
        return $forms;
    }

    public function getTopAdvert()
    {
        $this->load->library('advertise_service');
        $where = array(
            TBL_ADS.'.ad_area' => AD_BANNER_HOME,
            TBL_ADS.'.show_status' => 1
        );
        return $this->advertise_service->random_ads($where);
    }

    public function getSideAdvert()
    {
        $this->load->library('advertise_service');
        $where = array(
            TBL_ADS.'.ad_area' => AD_BANNER_SUBPAGE,
            TBL_ADS.'.show_status' => 1
        );
        return $this->advertise_service->random_ads($where);
    }

}
