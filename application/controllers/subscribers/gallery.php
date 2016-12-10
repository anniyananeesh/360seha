<?php 
if(!defined('BASEPATH')) 
    exit('No direct script access allowed');

class Gallery extends Account_Controller {

    protected $fileTypes;
    protected $image_gallery_view;
    protected $video_gallery_view;

    protected $table_images = TBL_IMG_GALLERY;
    protected $table_videos = TBL_VID_GALLERY;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('config_service');
        $this->load->library('gallery_service');

        $this->image_gallery_view = SUBSRIBER_URL.'gallery/photo';
        $this->video_gallery_view = SUBSRIBER_URL.'gallery/video';

        $this->initImageConfig = $this->config_service->getImageConfig();
        $this->file_types = implode('|', explode(',', $this->initImageConfig['allowed_types']['value']));
    }
    
    public function photo()
    {
        $this->data['content'] = $this->image_gallery_view.'/index';
        $this->data['title'] = 'Photo Gallery Page';
        $this->data['sub_title'] = 'Manage your image gallery page';
        
        $where = array(
            $this->table_images.'.subscriber' => $this->encrypt->decode($this->user['user_id'])
        );
        $this->data['images'] = $this->gallery_service->get_img_gallery($where);
        $this->load->view($this->layout, $this->data);
    }
    
    public function new_photo()
    {
        $file_data = array();
        $this->data['content'] = $this->image_gallery_view.'/add';
        $this->data['title'] = 'Upload new image';
        $this->data['sub_title'] = 'Manage your image gallery page';
        $this->data["fileTypes"] = $this->file_types;

        if($this->input->post())
        {
             if(isset($_FILES['userfile']['name']))
            {
                    $config['upload_path'] = UPLOAD_FOLDER.'gallery/photo/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '1000';
                    $config['max_width'] = '1200';
                    $config['max_height'] = '1024';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload())
                    {
                        $this->data['error_upload'] = $this->upload->display_errors();
                    }else{
                        
                        $file_data = $this->upload->data();
 
                        $this->load->library('image_lib');     
                        $config['image_library'] = 'GD2';
                        $config['source_image'] = UPLOAD_FOLDER.'gallery/photo/'.$file_data['file_name'];
                        $config['new_image'] = UPLOAD_FOLDER.'gallery/photo/'.$file_data['file_name'];
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']  = 200;
                        $config['height'] = 200;

                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                    
                    if(!isset($this->data['error_upload']))
                    {
                        $save = array(
                            $this->table_images.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                            $this->table_images.'.img_caption' => '',
                            $this->table_images.'.img_url' => $file_data['file_name'],
                            $this->table_images.'.img_thumb' => $file_data['raw_name'].'_thumb'.$file_data['file_ext'],
                            $this->table_images.'.img_show_status' => ($this->input->post('show_img')) ? 1 : 0,
                            $this->table_images.'.created_on' => date('Y-m-d H:i:s'),
                            $this->table_images.'.updated_on' => date('Y-m-d H:i:s')
                        );
                        
                        $this->load->library('gallery_service');
                        $this->gallery_service->save_img($save);

                        $this->session->set_flashdata('flash_message', 'New image added!');
                        redirect($this->data['ctrl_url'].'/photo');
                    }

            }else{

                $this->data["Error"] = "Y";
                $this->data["MSG"] = "Image is required";
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }
    
    public function edit_photo($id)
    {
        $file_data = array(); 
        $this->data['content'] = $this->image_gallery_view.'/edit';
        $this->data['title'] = 'Upload new image';
        $this->data['sub_title'] = 'Manage your image gallery page';
        $this->data["fileTypes"] = $this->file_types;
        
        $id = $this->encrypt->decode($id);
        $this->data['record'] = $this->gallery_service->get_img_by_pk($id);
        $this->data['error'] = FALSE;

        if($this->input->post())
        {
            if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "")
            {
                $config['upload_path'] = UPLOAD_FOLDER.'gallery/photo/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1200';
                $config['max_height'] = '1024';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload())
                {
                    $this->data['error'] = $this->upload->display_errors();
                }else{
                        
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib');     
        
                    $config['image_library'] = 'GD2';
                    $config['source_image'] = UPLOAD_FOLDER.'gallery/photo/'.$file_data['file_name'];
                    $config['new_image'] = UPLOAD_FOLDER.'gallery/photo/'.$file_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']  = 200;
                    $config['height'] = 200;

                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                }
            }
                
            $save = array(
                $this->table_images.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                $this->table_images.'.img_caption' => '',
                $this->table_images.'.img_show_status' => ($this->input->post('show_img')) ? 1 : 0,
                $this->table_images.'.updated_on' => date('Y-m-d H:i:s')
            ); 
                
            if(count($file_data) > 0 && $file_data)
            {
                $save[$this->table_images.'.img_url'] = $file_data['file_name'];
                $save[$this->table_images.'.img_thumb'] = $file_data['raw_name'].'_thumb'.$file_data['file_ext'];
            }
                
            $where = array(
                $this->table_images.'.img_id' => $id
            );
 
            $this->gallery_service->save_img( $save, $where);
            $this->session->set_flashdata('flash_message', 'Image updated!');
            redirect($this->data['ctrl_url'].'/photo');
 
        }
        
        $this->load->view($this->layout, $this->data);
    }

    public function delete_photo($id)
    {
        $id = $this->encrypt->decode($id);        
        $record = $this->gallery_service->get_img_by_pk($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{
            
            $where = array(
                $this->table_images.'.img_id' => $id
            );

            if($this->gallery_service->unset_img($where))
            {
                unlink(UPLOAD_FOLDER.'gallery/photo/'.$record->img_url);
                unlink(UPLOAD_FOLDER.'gallery/photo/'.$record->img_thumb);
                
                $this->session->set_flashdata('flash_message', 'Image deleted!');
                redirect($this->data['ctrl_url'].'/photo');
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url'].'/photo');
            }
        }
        $this->load->view($this->layout, $this->data);
    }
    
    public function video()
    { 
        $this->data['content'] = $this->video_gallery_view.'/index';
        $this->data['title'] = 'Video Gallery Page';
        $this->data['sub_title'] = 'Manage your videos here';
        
        $where = array(
            $this->table_videos.'.subscriber' => $this->encrypt->decode($this->user['user_id'])
        );
        
        $this->data['videos'] = $this->gallery_service->get_vid_gallery($where);
        $this->load->view($this->layout, $this->data);
    }
    
    
    public function new_video()
    {
        $file_data = array();
        $this->data['content'] = $this->video_gallery_view.'/add';
        $this->data['title'] = 'Add new video';
        $this->data['sub_title'] = 'Manage your video gallery page';
        $this->data['error_upload'] = FALSE;
        $this->data["fileTypes"] = $this->file_types;

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('caption', 'Title', 'trim|xss_clean');
            $this->form_validation->set_rules('caption_ar', 'Title Arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('vid_url', 'Video Url', 'trim|required|xss_clean|valid_url_format|url_exists');
            $this->form_validation->set_error_delimiters('', '');
            
            if($this->form_validation->run() == TRUE)
            { 
                $url = $this->ytubeurl_embed($this->input->post('vid_url'));
                $ytubId = $this->get_ytudeid($this->input->post('vid_url'));

                if($this->input->post('getMyThmb'))
                {
                    $config['upload_path'] = UPLOAD_FOLDER.'gallery/video/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '500';
                    $config['max_width'] = '415';
                    $config['max_height'] = '280';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload())
                    {
                        $this->data['error_upload'] = $this->upload->display_errors();
                    }else{

                        $file_data = $this->upload->data();
                        $thumb_url = $file_data['file_name'];
                    }

                }else{
                    $thumb_url = 'http://img.youtube.com/vi/'.$ytubId.'/hqdefault.jpg';
                }

                $save = array(
                    $this->table_videos.'.subscriber' => $this->encrypt->decode($this->user['user_id']),
                    $this->table_videos.'.vid_caption' => $this->input->post('caption'),
                    $this->table_videos.'.vid_caption_ar' => $this->input->post('caption_ar'),
                    $this->table_videos.'.vid_url' => $ytubId,
                    $this->table_videos.'.show_status' => 1,
                    $this->table_videos.'.has_thumb' => ($this->input->post('getMyThmb')) ? 1 : 0,
                    $this->table_videos.'.thumb_url' => $thumb_url,
                    $this->table_videos.'.created_on' => date('Y-m-d H:i:s'),
                    $this->table_videos.'.updated_on' => date('Y-m-d H:i:s')
                );
                
                if($this->input->post('getMyThmb') && $this->data['error_upload'])
                {
                    $this->data["Error"] = "Y";
                    $this->data["MSG"] = $this->data['error_upload'];
                }else{

                    $this->load->library('gallery_service');
                    $this->gallery_service->save_vid($save);

                    $this->session->set_flashdata('message', 'Video added!');
                    redirect($this->data['ctrl_url'].'/video');
                }
 
            }
            
        }
        
        $this->load->view($this->layout, $this->data);
        
    }
    
    public function edit_video($id)
    {
        $this->data['content'] = $this->video_gallery_view.'/edit';
        $this->data['title'] = 'Update video';
        $this->data['sub_title'] = 'Manage your video gallery page';
        
        $id = $this->encrypt->decode($id);
        $this->load->library('gallery_service');
        
        $this->data['record'] = $record = $this->gallery_service->get_vid_by_pk($id);
        $this->data["fileTypes"] = $this->file_types;

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('caption', 'Title', 'trim|xss_clean');
            $this->form_validation->set_rules('caption_ar', 'Title Arabic', 'trim|xss_clean');
            $this->form_validation->set_rules('vid_url', 'Video Url', 'trim|required|xss_clean|valid_url_format|url_exists');

            $this->form_validation->set_message('required','%s required');
            $this->form_validation->set_error_delimiters('', '');
 
            if($this->form_validation->run() == TRUE)
            { 
                $url = $this->ytubeurl_embed($this->input->post('vid_url'));
                $ytubId = $this->get_ytudeid($this->input->post('vid_url'));
 
                if($this->input->post('getMyThmb'))
                {
                    $config['upload_path'] = UPLOAD_FOLDER.'gallery/video/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '500';
                    $config['max_width'] = '415';
                    $config['max_height'] = '280';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload()) 
                    {
                        $this->data['error_upload'] = $this->upload->display_errors();
                    }else{
                            
                        $file_data = $this->upload->data();
                        $thumb_url = $file_data['file_name'];
                    }

                }else{

                    $thumb_url = 'http://img.youtube.com/vi/'.$ytubId.'/hqdefault.jpg';
                }

                $save = array(
                    $this->table_videos.'.vid_caption' => $this->input->post('caption'),
                    $this->table_videos.'.vid_caption_ar' => $this->input->post('caption_ar'),
                    $this->table_videos.'.vid_url' => $ytubId,
                    $this->table_videos.'.show_status' => 1,
                    $this->table_videos.'.has_thumb' => ($this->input->post('getMyThmb')) ? 1 : 0,
                    $this->table_videos.'.thumb_url' => (isset($thumb_url)) ? $thumb_url : $record->thumb_url,
                    $this->table_videos.'.updated_on' => date('Y-m-d H:i:s')
                );
 
                $where = array(
                    $this->table_videos.'.vid_id' => $id
                );
                
                if($this->input->post('getMyThmb') && $this->data['error_upload'])
                {
                    $this->data["Error"] = "Y";
                    $this->data["MSG"] = $this->data['error_upload'];
                }else{

                    $this->load->library('gallery_service');
                    $this->gallery_service->save_vid($save,$where);
                    $this->session->set_flashdata('message', 'Video updated!');
                    redirect($this->data['ctrl_url'].'/video');
                }           
            }
        }
        
        $this->load->view($this->layout, $this->data);
    }
    
    public function delete_video($id)
    { 
        $id = $this->encrypt->decode($id);        
        $record = $this->gallery_service->get_vid_by_pk($id);
        
        if(!$record)
        {
            redirect(ERROR_404);
            exit(1);
        }else{
            
            $where = array(
                $this->table_videos.'.vid_id' => $id
            );
 
            if($this->gallery_service->unset_vid($where))
            {
                $this->session->set_flashdata('message', 'Video deleted!');
                redirect($this->data['ctrl_url'].'/video');
            }else{
                $this->session->set_flashdata('message', 'Something went wrong!');
                redirect($this->data['ctrl_url'].'/video');
            }
            
        }

        $this->load->view($this->layout, $this->data);

    }
    
    public function ytubeurl_embed($string)
    {
        $search     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
        $replace    = "youtube.com/v/$1";    
        $url = preg_replace($search,$replace,$string);
        return $url;
    }

    public function get_ytudeid($link)
    {
        parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
        return $my_array_of_vars['v'];
    }
    
}