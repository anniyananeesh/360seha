<?php
 
class Notifications_service
{
	//Save a notification
	public static function saveNotification($save, $where = array(), $send = false)
	{
		$CI = & get_instance();
		$CI->load->model('notifications_model');
		$notificationId = $CI->notifications_model->save($save, $where);

		return $notificationId;
	}
	
	//Delete a notification
	public static function deleteNotification($id)
	{
		$CI = & get_instance();
		$CI->load->model('notifications_model');

		$where = array(
       		TBL_NOTIFY_JOB.'.job_id' => $id
     	);

		return $CI->notifications_model->delete($where);
	}

	//List all notification
	public static function getNotifications()
	{
		$CI = & get_instance();
		$CI->load->model('notifications_model');
		return $CI->notifications_model->get();
	}

	//Get Notification by Id
	public static function getNotificationByPk($id)
	{
		$CI = & get_instance();
		$CI->load->model('notifications_model');
		return $CI->notifications_model->fetchById($id);
	}

	//Send a notification
	public static function sendNotification($notificationId)
	{
		$save = array(
			TBL_NOTIFY_JOB.'.send' => 1,
			TBL_NOTIFY_JOB.'.send_on' => date('Y-m-d h:i:s')
		);

		$where = array(
			TBL_NOTIFY_JOB.'.job_id' => $notificationId
		);
		return self::saveNotification($save,$where);
	} 

}