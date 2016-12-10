<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends PublicController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(SITE_MODELS.'category_model', 'modelCategoryAlias');
        $this->load->model(SITE_MODELS.'department_model', 'modelDeptAlias');
        $this->load->model(SITE_MODELS."country_model", 'modelCountryAlias');
        $this->load->model(SITE_MODELS."subscriber_model", 'modelUserAlias');
        $this->load->model(SITE_MODELS."city_model", 'modelCityAlias');
        $this->load->model(SITE_MODELS."Department_user_model", 'modelDeptUserAlias');

    }

    public function index()
    {
        $this->data['page'] = 'join';

        //Load all parent categories here except for doctors
        $this->data['category'] = $this->modelCategoryAlias->fetchFields(array('name as name_en','name_ar', 'id_category'),array('id_category_parent IS NULL' => NULL), array('orderby'=>'ASC'));

        //Load all the departments
        $this->data['departments'] = $this->modelDeptAlias->fetchFields(array('dept_id','dept_title as dept_title_en', 'dept_title_ar'),array('show_status'=>1), array('dept_id'=>'DESC'));

        //Load country from | DB
        $this->data['country'] = $this->modelCountryAlias->fetchFields(array('id','name_en','name_ar'), array(), array('orderby'=>'ASC'));

        if($this->input->post())
        {
            $this->data['post'] = $this->input->post();
            $countryFK = $this->input->post('country');

            if(!empty($countryFK))
            {
                $this->data['city'] = $this->modelCityAlias->fetchFields(array('id','name as name_en','name_ar'), array('country_fk' => $countryFK), array('orderby'=>'ASC'));
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('name_en', 'Name English', 'trim|required|xss_clean');
            $this->form_validation->set_rules('name_ar', 'Name Arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|callback_validateEmail');
            $this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE)
            {
                $departments_added = $this->input->post('departments');

                if(empty($departments_added))
                {
                    $this->data['Error'] = 'Y';
                    $this->data['MSG'] = 'Please choose your departments';
                }
                else
                {

                    if($this->input->post('latitude') != '' && $this->input->post('longitude') != '')
                    {
                        $this->load->library('email');
                        $this->config->load('email',true);
                        $this->email->from($this->input->post('email'));
                        $this->email->to(INFO_EMAIL);
                        $this->email->subject(SITE_NAME.' - New subcriber has been joined with 360Seha');

                        //Email variables
                        $title = $this->input->post('name_en');
                        $email = $this->input->post('email');
                        $contact_no = $this->input->post('contact_no');
                        $latitude = $this->input->post('latitude');
                        $longitude = $this->input->post('longitude');
                        $city_title = $this->input->post('city');
                        $country_title = $this->input->post('country');
                        $departments = (count($departments_added) > 0) ? implode(', ', $departments_added) : 'No departments chosen';

                        //Get the data from db based on the id
                        $country = $this->modelCountryAlias->fetchRow(array('name_en'=> $country_title));
                        $city = $this->modelCityAlias->fetchRow(array('name'=> $city_title, 'country_fk' => $country->id));
                        $category = $this->modelCategoryAlias->fetchById($this->input->post('category'));

                        $category = $category->name;
                        $country = $country->id;
                        $city = $city->id;

                        include_once(MISC_PATH."/emails.php");
                        $message = $join_subscriber;

                        /*
                        $save = array(
                            TBL_SUBSCRIBERS.'.subs_title' => $this->input->post('name_en'),
                            TBL_SUBSCRIBERS.'.subs_title_ar' => $this->input->post('name_ar'),
                            TBL_SUBSCRIBERS.'.subs_public_profile' => preg_replace('/\s+/', '', trim(strtolower($this->input->post('name_en')))),
                            TBL_SUBSCRIBERS.'.subs_cat_id' => $this->input->post('category'),
                            TBL_SUBSCRIBERS.'.subs_email' => $this->input->post('email'),
                            TBL_SUBSCRIBERS.'.subs_primary_contact' => $this->input->post('contact_no'),
                            TBL_SUBSCRIBERS.'.description_en_long' => $this->input->post('description_en'),
                            TBL_SUBSCRIBERS.'.subs_lat_id' => $this->input->post('latitude'),
                            TBL_SUBSCRIBERS.'.subs_long_id' => $this->input->post('longitude'),
                            TBL_SUBSCRIBERS.'.subs_country' => $country,
                            TBL_SUBSCRIBERS.'.subs_state' => $city,
                            TBL_SUBSCRIBERS.'.subs_created' => date('Y-m-d H:i:s'),
                            TBL_SUBSCRIBERS.'.subs_update' => date('Y-m-d H:i:s'),
                        );

                        $userID = $this->modelUserAlias->save($save);

                        $save_depts = array();

                        #Put departments with user
                        if(count($departments_added) > 0 && !empty($departments_added))
                        {
                            foreach ($departments_added as $key => $value)
                            {
                                array_push($save_depts, array('user_id'=>$userID, 'dept_id'=>$value));
                            }

                            $this->modelDeptUserAlias->saveDept($save_depts);
                        }*/

                        #All done with a redirect to listing page
                        $this->email->message($message);


                        if($this->email->send())
                        {
                            //Send an acknowledgement email for the subscriber
                            $this->email->from(INFO_EMAIL);
                            $this->email->to($this->input->post('email'));
                            $this->email->subject(SITE_NAME.' - Welcome to 360Seha . Awesome online health directory!');

                            $title = $this->input->post('name_en');

                            include_once(MISC_PATH."/emails.php");
                            $message_m = $acknowledgement_email;

                            $this->email->message($message_m);
                            $this->email->send();
                        }

                        $this->data['Error'] = 'N';
                        $this->data['MSG'] = 'Done! your details has been send. Our customer relationship executive will contact you soon. Thank you for your support';

                    }
                    else
                    {
                        $this->data['Error'] = 'Y';
                        $this->data['MSG'] = 'Please share your business location';
                    }

                }

            }else{

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Your form has errors';

            }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function validateEmail($email)
    {
        if($this->modelUserAlias->isExist(array('subs_email'=>$email)))
        {
            $this->form_validation->set_message('validateEmail', 'Wait ! this email is already registered');
            return false;
        }else{
            return true;
        }
    }

    public function validateUsername($username)
    {
        if($this->modelUserAlias->isExist(array('subs_username'=>$username)))
        {
            $this->form_validation->set_message('validateUsername', 'This username is already taken');
            return false;
        }else{
            return true;
        }
    }

}
