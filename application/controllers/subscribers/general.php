<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends Account_Controller{
 
    protected $initImageConfig;
    protected $subsType;
    protected $view;
    protected $table = TBL_SUBSCRIBERS;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('config_service');
        $this->initImageConfig = $this->config_service->getImageConfig();
        $this->file_types = implode('|', explode(',', $this->initImageConfig['allowed_types']['value']));
        $this->view = SUBSRIBER_URL.'general';
    }
 
    public function index()
    {
        $this->data['content'] = $this->view.'/index';
        $this->data['title'] = 'General Settings Page';
        $this->data['sub_title'] = 'Manage your general information here';
        $this->data['record'] = $record = $this->data['user_details'];
        $this->data['post'] = (array) $record;
        $this->subsType = $record->subs_type;

        //Load the basic image configuration from settings
        $this->data["initImageConfig"] = $this->initImageConfig;
        $this->data['initFileTypes'] = $this->file_types;
 
        if($record->subs_public_profile == NULL || $record->subs_public_profile == "")
        {
           $this->data['post']["subs_public_profile"] = preg_replace('/\s+/', '', trim(strtolower($record->subs_title)));
        }

        if($this->input->post())
        {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('hidden_val', 'hidden_val', 'trim|xss_clean');

            if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile', 'Image', 'callback_handle_upload');
            }

            if (isset($_FILES['bannerfile']) && !empty($_FILES['bannerfile']['name']))
            {
                $this->form_validation->set_rules('bannerfile', 'Image', 'callback_handle_banner_upload');
            }

            $this->form_validation->set_message('required', '%s required');
            $this->form_validation->set_error_delimiters('', '');
 
            if($this->form_validation->run() == TRUE)
            {
 
                $save = array(
                    $this->table.'.subs_public_profile' => $this->input->post('subs_public_profile'),
                    $this->table.'.has_emergency' => $this->input->post('has_emergency'),
                    $this->table.'.publish_on' => ($this->input->post('publish_on')) ? $this->input->post('publish_on') : "All",
                    $this->table.'.subs_update' => date('Y-m-d H:i:s')
                );

                //Check if there is any file uploaded
                if(isset($_POST['userfile']) && $_POST['userfile'] != "")
                {
                    $save[$this->table.'.subs_profile_img'] = $_POST['userfile'];
                }

                //Check if there is any banner uploaded
                if(isset($_POST['bannerfile']) && $_POST['bannerfile'] != "")
                {
                    $save[$this->table.'.subs_home_bg'] = $_POST['bannerfile'];
                }
 
                if($this->input->post('access'))
                {
                    $save[$this->table.'.subs_access'] = serialize($this->input->post('access'));
                }else{
                    $save[$this->table.'.subs_access'] = NULL;
                }

                $where = array(
                    $this->table.'.user_id' => $this->encrypt->decode($this->user['user_id'])
                );

                $this->subscriber_service->save($save,$where);
                $this->session->set_flashdata('message', 'Settings updated!');
                redirect($this->data['ctrl_url']);
            }

        }
        
        $this->load->view($this->layout, $this->data);
        
    } 

    public function handle_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/profile/';
        $config['allowed_types'] =  $this->file_types;
        $config['max_size'] = $this->initImageConfig['max_size']['value'];
        $config['max_width'] = $this->initImageConfig['thumb_width']['value'];
        $config['max_height'] = $this->initImageConfig['thumb_height']['value'];
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        
        if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name']))
        {
            if ($this->upload->do_upload('userfile'))
            {
                $upload_data    = $this->upload->data();
                $_POST['userfile'] = $upload_data['file_name'];

                //Load the WideImage Library
                require_once(APPPATH.'third_party/WideImage/WideImage.php');
                $img = WideImage::load(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['file_name']);
 
                 // 250 X 250 pixels == > For profile page
                $resized = $img->resize(250, 250);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_250'.$upload_data['file_ext']);

                // 140 X 140 Pixels === > For Small Versions
                $resized = $img->resize(140, 140);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_140'.$upload_data['file_ext']);

                // 80 X 80 Pixels == >> For small decvices 
                $resized = $img->resize(80, 80);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_80'.$upload_data['file_ext']);

                // 45 X 45 Pixels == >> For smaller google map icons 
                $resized = $img->resize(45, 45);
                $resized->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_45'.$upload_data['file_ext']);

                //applyMask
                $imgMasked = WideImage::load(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_80'.$upload_data['file_ext']);
                $maskedOut = $imgMasked->applyMask(WideImage::load(UPLOAD_FOLDER.'/imgmanip/mask.png'));

                $maskedOut->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_masked.png');

                //Take the masked one and put it inside the marker based on the category added
                $watermark = WideImage::load(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_masked.png');
                $markerimg = WideImage::load(UPLOAD_FOLDER.'/imgmanip/lg/'.$this->subsType.'.png');

                $finalImage = $markerimg->merge($watermark, 7, 8, 100);
                $finalImage->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_marker-lg.png');

                //Save a small sized one for google map location marker
                $imgMasked2 = WideImage::load(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_45'.$upload_data['file_ext']);
                $maskedOut2 = $imgMasked2->applyMask(WideImage::load(UPLOAD_FOLDER.'/imgmanip/mask-sm.png'));

                $maskedOut2->saveToFile(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_45_masked.png');

                $watermark2 = WideImage::load(UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_45_masked.png');
                $markerimg2 = WideImage::load(UPLOAD_FOLDER.'/imgmanip/'.$this->subsType.'.png');

                $finalImage2 = $markerimg2->merge($watermark2, 4, 4, 100);
                $finalImage2->saveToFile(UPLOAD_FOLDER.'subscribers/gmap/'.$upload_data['raw_name'].'_normal.png');

                //generate offer only markers
                $watermarkOffer = WideImage::load(UPLOAD_FOLDER.'/imgmanip/offer.png');
                $markerimgOffer = WideImage::load(UPLOAD_FOLDER.'subscribers/gmap/'.$upload_data['raw_name'].'_normal.png');
                $finalImageOffer = $markerimgOffer->merge($watermarkOffer, 35, 4, 100);
                $finalImageOffer->saveToFile(UPLOAD_FOLDER.'subscribers/gmap/'.$upload_data['raw_name'].'_offer.png');

                //generate emergency only markers
                $watermarkEmergency = WideImage::load(UPLOAD_FOLDER.'/imgmanip/emergency.png');
                $markerimgEmergency = WideImage::load(UPLOAD_FOLDER.'subscribers/gmap/'.$upload_data['raw_name'].'_normal.png');
                $finalImageEmergency = $markerimgEmergency->merge($watermarkEmergency, 35, 4, 100);
                $finalImageEmergency->saveToFile(UPLOAD_FOLDER.'subscribers/gmap/'.$upload_data['raw_name'].'_emergency.png');

                //Generate both emergency & offer markers
                $watermarkEmergency = WideImage::load(UPLOAD_FOLDER.'/imgmanip/emergency.png');
                $markerimgEmergency = WideImage::load(UPLOAD_FOLDER.'subscribers/gmap/'.$upload_data['raw_name'].'_offer.png');
                $finalImageEmergency = $markerimgEmergency->merge($watermarkEmergency, 0, 4, 100);
                $finalImageEmergency->saveToFile(UPLOAD_FOLDER.'subscribers/gmap/'.$upload_data['raw_name'].'_both.png');

                $mask1 = UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_45_masked.png';
                $mask2 = UPLOAD_FOLDER.'subscribers/profile/'.$upload_data['raw_name'].'_masked.png';

                unset($mask1);
                unset($mask2);

                return true;
            }
            else
            {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        }
        else
        {
          return true;
        }

    }

    //handle file uploads here
    public function handle_banner_upload()
    {
        $config['upload_path'] = UPLOAD_FOLDER.'subscribers/banners/';      //Fixing the upload directory
        $config['allowed_types'] =  $this->file_types;                          //Configuring the allowed file types
        $config['max_size'] = 1024;                                        //Setting the maximum upload file size
        $config['max_width'] = 735;
        $config['max_height'] = 255;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);                //Loaded the library and add the config
        
        if (isset($_FILES['bannerfile']) && !empty($_FILES['bannerfile']['name']))
        {
            if ($this->upload->do_upload('bannerfile'))
            {
                $upload_data    = $this->upload->data();
                $_POST['bannerfile'] = $upload_data['file_name'];
                return true;
            }
            else
            {
                $this->form_validation->set_message('handle_banner_upload', $this->upload->display_errors());
                return false;
            }
        }
        else
        {
          return true;
        }

    }

}