<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Aneesh
*/
/* Library service */

Class Patient_service{
 
    public static function get_patients( $condition = array(), $orderBy = array(), $limit = null, $offset = null, $join = array()){
        
        $CI = & get_instance();
        $CI->load->model('patient_model');
        
        $order_by = array(
          TBL_PATIENTS.'.id' => 'DESC'  
        );
        
        return $CI->patient_model->get( $condition, $order_by, $limit, $offset, $join);
 
    }
    
    public static function save($save, $where = array())
    {
        $CI = & get_instance();
        $CI->load->model('patient_model');
        
        return $CI->patient_model->save( $save, $where);
    }
    
    public static function get_patient_row($where = array(), $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('patient_model');
        
        return $CI->patient_model->fetchRow($where, $join);
    }
    
    public static function get_patient_by_pk($id, $join = array())
    {
        $CI = & get_instance();
        $CI->load->model('patient_model');
        
        return $CI->patient_model->fetchById( $id, $join);
        
    }
    
    /*
     *  Unset product details from table
     * @params $where
     * 
     * For more doc ... See base_model
     */
    public static function unset_patient($where)
    {
        $CI = & get_instance();
        $CI->load->model('patient_model');
        
        return $CI->patient_model->delete($where);    
    }
    
    /*
     * Check if the username is already taken or not
     * @params $where
     * 
     * For more doc .. see base_model
     */
    public function has_username($where)
    {
        $user = $this->get_patients($where);
        
        if($user AND count($user) > 0)
        {
            return true;
        }else{
            
            return false;
        }
    }
    
    /*
     * Check patient login area
     * 
     */
    public function _auth( $post)
    {
        $CI = & get_instance();
        $CI->load->model('auth_model');
        $CI->load->library('encrypt');
        $CI->load->library('session');
        
        $email = $CI->security->xss_clean($post['uname']);
        $password = $CI->security->xss_clean($post['pwd']);
        
        $where = array( TBL_PATIENTS.'.email' => $email);
        
        $patient = $this->get_patient_row($where);
        
        if(count($patient) > 0 && $patient)
        {
            
            if($CI->auth_model->generate_password_hash($password, $patient->unique_token) == $patient->password_hash)
            {
                if($patient->is_verified == 1)
                {
                    if($patient->status == 1)
                    {
                        $data['logged_public'] = array(

                            'user_id' => $CI->encrypt->encode($patient->id),
                            'name' => $patient->full_name,
                            'username' => $patient->email,
                            'type' => 'patient',
                            'validated' => true
                        );
                        
                        $CI->session->set_userdata($data);
                        return 'logged';//User logged
                        
                    }else{
                        return 'blocked'; //Status blocked
                    }
                    
                }else{
                    
                    return 'verified'; //Status not verified
                }
            }else{
                return 'password'; // issue with the password typed;
            }
        }else{
            
            return 'user'; //No user has been found;
        }
        
    }
    
    /*
     * Reset n update the password
     * 
     */
    public function _rst( $id, $username){
        
        $CI = & get_instance();
        $CI->load->model('auth_model');
        
        $rndm_pwd = $CI->auth_model->generate_random_password();
        $uniq_token = $CI->auth_model->generate_unique_token($username);
        $pwd_hash = $CI->auth_model->generate_password_hash( $rndm_pwd, $uniq_token);
        
        $save = array(
          TBL_PATIENTS.'.pwd_hash' => $pwd_hash,
          TBL_PATIENTS.'.uniq_token' => $uniq_token,
          TBL_PATIENTS.'.r_password' => $rndm_pwd
        );
        
        $where = array(
          TBL_PATIENTS.'.id' => $id
        );
        
        $this->save( $save, $where);
	return $rndm_pwd;
    }
    
    /*
    Get total reward points from patient
    @params $patId as Integer
    returns a count 
    */
    public static function getPatientRewrdPts($patId)
    {
        $CI = & get_instance();

        $CI->db->select('reward_points')
               ->from(TBL_PATIENTS)
               ->where(TBL_PATIENTS.'.id = '.$patId)
               ->limit(1);
        $query = $CI->db->get();

        return ($query->num_rows() > 0) ? $query->result() : 0;
    }

    /*  
    Set total reward points for patient
    @params $patId as Integer
    @params $count as Integer
    return true if write success
    */
    public static function setPatientRewrdPts($patId, $count)
    {
        $save = array(
            TBL_PATIENTS.'.reward_points' => $count
        );

        $where = array(
            TBL_PATIENTS.'.id' => $patId
        );

        return self::save($save,$where);
    }

    /*
    Get if the patient is alread y liked a subcriber
    @params $patientId as integer
    @params $susbcriberId as Integer
    return bool
    */
    public function hasLiked($patientId, $susbcriberId)
    {
        $CI = & get_instance();

        $CI->db->select('patient_id')
               ->from(TBL_PATIENT_LIKES)
               ->where(TBL_PATIENT_LIKES.'.patient_id = '.$patientId.' AND '.TBL_PATIENT_LIKES.'.subscriber = '.$susbcriberId)
               ->limit(1);
        $query = $CI->db->get();

        return ($query->num_rows() > 0) ? true : false;
    }

    /*
    Post a like to the subscriber selected
    @params $patientId as integer
    @params $subscriberId as Integer
    */

    public function postLike($patientId, $subscriberId)
    {
        $CI = & get_instance();

        $save = array(
            TBL_PATIENT_LIKES.'.patient_id' => $patientId,
            TBL_PATIENT_LIKES.'.subscriber' => $subscriberId
        );

        $CI->load->library('subscriber_service');
        $likesCount = $CI->subscriber_service->getLikesCount($subscriberId);
        $likesCount = ++$likesCount->likes;
        $CI->subscriber_service->updateLikesCount($likesCount,$subscriberId);
        $CI->db->insert(TBL_PATIENT_LIKES, $save);

        //Update patient reward points
        $currentRwdPts = self::getPatientRewrdPts($patientId);
        $currentRwdPts = ++$currentRwdPts[0]->reward_points;
        self::setPatientRewrdPts($patientId, $currentRwdPts);

        return $likesCount;
    }

    /*
    Remove a like to the subscriber selected
    @params $patientId as integer
    @params $subscriberId as Integer
    */

    public function removeLike($patientId, $subscriberId)
    {
        $CI = & get_instance();

        $where = array(
            TBL_PATIENT_LIKES.'.patient_id' => $patientId,
            TBL_PATIENT_LIKES.'.subscriber' => $subscriberId
        );

        $CI->load->library('subscriber_service');
        $likesCount = $CI->subscriber_service->getLikesCount($subscriberId);
        $likesCount = --$likesCount->likes;
        $CI->subscriber_service->updateLikesCount($likesCount,$subscriberId);
        $CI->db->delete(TBL_PATIENT_LIKES, $where);

        //Update patient reward points
        $currentRwdPts = self::getPatientRewrdPts($patientId);
        $currentRwdPts = --$currentRwdPts[0]->reward_points;
        self::setPatientRewrdPts($patientId, $currentRwdPts);

        return $likesCount;
    }

    /*
    Check if the user is the favourite for patient
    @params $patientId as integer
    @params $subscriberId as Integer
    return bool
    */
    public function isFav($patientId, $susbcriberId)
    {
        $CI = & get_instance();

        $CI->db->select('patient_id')
               ->from(TBL_FAVS)
               ->where(TBL_FAVS.'.patient_id = '.$patientId.' AND '.TBL_FAVS.'.subs_id = '.$susbcriberId)
               ->limit(1);
        $query = $CI->db->get();

        return ($query->num_rows() > 0) ? true : false;
    }
 
    /*
        Post an item into favourite list
        @params $patientId as integer
        @params $subscriberId as Integer
    */
    public function postFav($patientId,$subscriberId)
    {
        $CI = & get_instance();

        $save = array(
            TBL_FAVS.'.patient_id' => $patientId,
            TBL_FAVS.'.subs_id' => $subscriberId
        );
 
        $CI->db->insert(TBL_FAVS, $save);

        //Update patient reward points
        $currentRwdPts = self::getPatientRewrdPts($patientId);
        $currentRwdPts = ++$currentRwdPts[0]->reward_points;
 
        return self::setPatientRewrdPts($patientId, $currentRwdPts);
    }
 
    /*
        Removes an item into favourite list
        @params $patientId as integer
        @params $subscriberId as Integer
    */
    public function removeFav($patientId, $subscriberId)
    {
        $CI = & get_instance();

        $where = array(
            TBL_FAVS.'.patient_id' => $patientId,
            TBL_FAVS.'.subs_id' => $subscriberId
        );
 
        $CI->db->delete(TBL_FAVS, $where);

        //Update patient reward points
        $currentRwdPts = self::getPatientRewrdPts($patientId);
        $currentRwdPts = --$currentRwdPts[0]->reward_points;
    
        return self::setPatientRewrdPts($patientId, $currentRwdPts);

    }

}