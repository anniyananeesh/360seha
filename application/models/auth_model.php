<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Auth_model extends Base_model {
    
    public $table;
    protected $primary_key;
    
    public function __construct(){
        
        $this->table       = TBL_USERS;
        $this->primary_key = 'user_id';
    }
 
    public function rst_user_pwd( $id, $username){
        
        $rndm_pwd = $this->generate_random_password();
        $uniq_token = $this->generate_unique_token($username);
        $pwd_hash = $this->generate_password_hash( $rndm_pwd, $uniq_token);
        
        $save = array(
          TBL_USERS.'.password' => $pwd_hash,
          TBL_USERS.'.unique_token' => $uniq_token,
          TBL_USERS.'.r_password' => $rndm_pwd
        );
        
        $where = array(
          TBL_USERS.'.user_id' => $id
        );
        
        $this->save( $save, $where);
        
        return $rndm_pwd;
			
    }
    
    public function generate_unique_token($username){

        $token = time() . rand(10, 5000) . sha1(rand(10, 5000)) . md5(__FILE__);
        $token = str_shuffle($token);
        $token = sha1($token) . md5(microtime()) . md5($username);

        return $token;
    }
        
    public function generate_password_hash($password, $token){
        return md5(md5($token) . md5($password));
    }
        
    public function generate_random_password($length = 12){

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$";
        $password = substr( str_shuffle( $chars ), 0, $length );
	    return $password;
        
    }
    
    public function _auth($post, $type = ''){
 
        $username = $this->security->xss_clean($post['username']);
        $password = $this->security->xss_clean($post['password']);
        
        $where = array('user_name' => $username);
        
        $usr_details = parent::fetchRow($where);
        
        if(count($usr_details) > 0 && $usr_details){
            
            if($this->generate_password_hash($password, $usr_details->unique_token) == $usr_details->password){

                if($usr_details->user_status == 1){

                    $this->load->library('encrypt');

                    $data['logged_in'] = array(

                        'user_id' => $this->encrypt->encode($usr_details->user_id),
                        'name' => $this->encrypt->encode($usr_details->first_name),
                        'username' => $usr_details->user_name,
                        'password' => $this->encrypt->encode($usr_details->password),
                        'status' => $this->encrypt->encode(1),
                        'type' => $usr_details->grp_id,
                        'validated' => $this->encrypt->encode(1)
                    );

                    $this->session->set_userdata($data);
                    return true;

                }else{

                    $this->session->set_flashdata('message', 'User account has been blocked. Please contact administrator...!');
                    redirect('admin/login');

                }

            }else{

                $this->session->set_flashdata('message', 'Hi! ... Something went wrong with your password. Check whether caps lock is on!');
                redirect('admin/login');
            }
            
        }else{
                
            $this->session->set_flashdata('message', 'User <strong>'.$username.'</strong> not found');
            redirect('admin/login');
        }
        
    }
    
    public function is_email_exists($email)
    {
        
        $where = array('email' => $email);
        
        $this->load->library('user_service');
        $usr_details = $this->user_service->get_user_by_row($where);
        
        if(count($usr_details) > 0 && $usr_details){
            
            return true;
        }else{
            return false;
        }
        
    }
    
}