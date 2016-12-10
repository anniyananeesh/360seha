<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Subscription_service{

    //Get Followers by subscriber
    public static function get_followers($subsId)
    {
        $CI = & get_instance();
        $CI->load->model('subscription_model');

        $where = array(
            TBL_FOLLOW.'.subs_id' => $subsId
        );
        $emails = $CI->subscription_model->get($where);
        $retArrayFormatEmail = array();

        if($emails)
        {
            foreach ($emails as $eml) {
               array_push($retArrayFormatEmail, $eml->follower_email);
            }

            return $retArrayFormatEmail;
        }else{
            return false;
        }
    }

    //Get followers as object
    public static function get_followers_by_subscriber($subsId)
    {
        $CI = & get_instance();
        $CI->load->model('subscription_model');

        $where = array(
            TBL_FOLLOW.'.subs_id' => $subsId
        );
        return $CI->subscription_model->get($where);
    }

    //Set Follower to subcriber
    public static function set_follower($save)
    {
        $CI = & get_instance();
        $CI->load->model('subscription_model');
        
        //Check if the user is already subscribed
        if($CI->subscription_model->isAlreadyRegistered($save))
        {
            return false;
        }else{

            $CI->subscription_model->save($save);

            //Send thanks mail to user registered
            self::send_subscription_mail_user($save);

            //Send information mail to subscriber
            self::send_subscription_mail_subscriber($save);

            //Send message to 360seha admin
            self::send_subscription_mail_admin($save);

            return true;
        } 
    }

    //TODO Unscubscribe the user from subscriber

    //Send Emails to subscribed users
    public static function send_subscription_mail_user($params)
    {
        $CI = & get_instance();

        $CI->load->library('mail_service');
        $CI->load->library('subscriber_service');

        $subs = $CI->subscriber_service->get_subscriber_by_pk($params['subs_id']);

        $mentry = array(

            "from" => 'info@360seha.com',
            "from_name" => '360Seha Team',
            "reply_to" => 'no-reply@360seha.com',
            "reply_title" => 'No reply',
            "subject" => 'Thanks for your subcription with '.$subs->subs_title,
            "alt_body" => "Plain text message",
            "to" => $params['follower_email'],
            "to_title" => ''
        );

        $query = array(
            "title" => 'Dear',
            "content1" => 'Thanks for your subscription with '.$subs->subs_title. ' on 360Seha.com',
            "content2" => "You'll be receiving all news and offers updates from <strong>".$subs->subs_title."</strong> very soon",
            "content3" => "Have a nice day"
        );

        $template = 'profile/email_templates/subscription_thanks';
        $CI->mail_service->Send( $query, $template, $mentry);
    }

    //Send Email to subscriber
    public static function send_subscription_mail_subscriber($params)
    {
        $CI = & get_instance();

        $CI->load->library('mail_service');
        $CI->load->library('subscriber_service');

        $subs = $CI->subscriber_service->get_subscriber_by_pk($params['subs_id']);

        $mentry = array(

            "from" => 'info@360seha.com',
            "from_name" => '360Seha Team',
            "reply_to" => 'no-reply@360seha.com',
            "reply_title" => 'No reply',
            "subject" => 'Hi '.$subs->subs_title.', Someone just followed you on 360Seha',
            "alt_body" => "Plain text message",
            "to" => $subs->subs_email,
            "to_title" => $subs->subs_title
        );

        $query = array(
            "title" => $subs->subs_title,
            "content1" => 'Someone just followed your account on 360Seha',
            "content2" => "From now onwards, your news and offers updates will reach him within no time. Contact him to his mail : ".$params['follower_email'],
            "content3" => "Have a nice day"
        );

        $template = 'profile/email_templates/subscription_thanks';
        $CI->mail_service->Send( $query, $template, $mentry);
    }

    //Send Email to subscriber
    public static function send_subscription_mail_admin($params)
    {
        $CI = & get_instance();

        $CI->load->library('mail_service');
        $CI->load->library('subscriber_service');

        $subs = $CI->subscriber_service->get_subscriber_by_pk($params['subs_id']);

        $mentry = array(

            "from" => 'info@360seha.com',
            "from_name" => '360Seha Team',
            "reply_to" => 'no-reply@360seha.com',
            "reply_title" => 'No reply',
            "subject" => 'Follower Notification',
            "alt_body" => "Plain text message",
            "to" => 'info@360seha.com',
            "to_title" => '360Seha Info'
        );

        $query = array(
            "title" => '360Seha Admin',
            "content1" => 'Someone just followed the account of <strong>'.$subs->subs_title.'</strong> on 360Seha',
            "content2" => "From now onwards, news and offers updates will reach him within no time. Contact him to his mail : ".$params['follower_email'],
            "content3" => "Thanks :)"
        );

        $template = 'profile/email_templates/subscription_thanks';
        $CI->mail_service->Send( $query, $template, $mentry);
    }

}