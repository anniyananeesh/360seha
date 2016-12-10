<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('SITE_NAME', '360seha');

/*
 * Email Informations goes here
 */
define('SUPPORT_EMAIL', 'support@360seha.com');
define('NO_REPLY_EMAIL', 'noreply@360seha.com');
define('INFO_EMAIL', 'info@360seha.com');

/*
 * Active Theme
 */

define('LAUNCH_THEME', '/themes/launch/');
define('HOME_THEME', '/themes/site/');
define('PROFILE_THEME', '/themes/profile/');

define('PLUGINS_DIR', '/plugins/');
/**
 * Pagination constants
 */
define('RECORDS_PER_PAGE', 15);

/**
 * Upload Folder constants
 */
define('UPLOAD_FOLDER', 'uploads/');

/*
 * Role Constants
 */
define('ROLE_SEHA_SUPER_ADMINS', 1);
define('ROLE_SEHA_ADMINS', 2);
define('ROLE_SEHA_USER', 3);

define('SEHA_SUBSCRIBER_DOCTOR', 1);
define('SEHA_SUBSCRIBER_COMPANY', 2);
define('SEHA_SUBSCRIBER_MEDICAL_CENTER', 3);
define('SEHA_SUBSCRIBER_BEAUTY_CENTER', 4);
define('SEHA_SUBSCRIBER_LABS', 5);
define('SEHA_SUBSCRIBER_HOSPITALS', 6);
/*
 * Define Layouts here
 */
define('ADMIN_LAYOUT', 'layouts/master');
define('SUBSCRIBER_LAYOUT', 'layouts/subscriber');
define('PUBLIC_PROFILE', 'layouts/public');
define('LAUNCH_LAYOUT', 'layouts/launch');

define('PROFILE_LAYOUT', 'layouts/profile/layout');
define('PROFILE_VIEW', 'profile/');

define('AD_BANNER_HOME', 1);
define('AD_BANNER_TOP_WIDTH', 970);
define('AD_BANNER_TOP_HEIGHT', 90);

define('AD_BANNER_SUBPAGE', 2);
define('AD_BANNER_SUBPAGE_WIDTH', 300);
define('AD_BANNER_SUBPAGE_HEIGHT', 250);
/*
 * Define titles here
 */
define('WEB_TITLE', 'UAE Health Directory');
define('WEB_SUBSCRIBER_TITLE', 'UAE Health Directory :: Subscribers');
define('WEB_LAUNCH_TITLE', 'UAE Health Directory');

/*
 * Image Dimensions
 */
define('CATEGORY_ICON_WIDTH','120');
define('CATEGORY_ICON_HEIGHT', '120');

/*
 *
 * URL Constants
 *
 */
define('ADMIN_URL','admin/');
define('ADMIN_HOME','admin/user/dashboard');
define('ADMIN_LOGIN_URL', 'admin/login');
define('ADMIN_LOGOUT_URL', 'admin/user/logout');

define('SUBSRIBER_URL','subscribers/');
define('SUBSRIBER_HOME','subscribers/about');
define('SUBSRIBER_LOGIN_URL', 'subscribers/login');
define('SUBSRIBER_LOGOUT_URL', 'subscribers/user/logout');

/*
 *
 * NEWSLETTER TEMPLATE CONSTANTS
 */
define('NEWSLETTER_TEMPLATES_FOLDER','uploads/newsletter/');
define('NO_THUMB_NEWSLETTER', ACTIVE_THEME.'icons/no-thumb-img.jpg');

/*
 *
 * ICONS CONSTANTS
 */
define('CATEGORY_ICON_FOLDER', 'category/');

/*
 *
 * ERROR PAGES CONSTANTS
 */
define('ERROR_404', ADMIN_URL.'errors/404');
define('ERROR_ACCESS_DENIED', ADMIN_URL.'errors/access_denied');
define('PUBLIC_ERROR_404', 's404');
/*
 *
 * MENU ACCESS CONSTANTS
 */
define('MENU_HOME_ACCESS', 'Home');
define('MENU_HOME_ID', '1');

define('MENU_ABOUT_ACCESS', 'About Us');
define('MENU_ABOUT_ID', '2');

define('MENU_DOCTORS_ACCESS', 'Our Doctors');
define('MENU_DOCTORS_ID', '3');

define('MENU_SERVICES_ACCESS', 'Our Services');
define('MENU_SERVICES_ID', '4');

define('MENU_OFFERS_ACCESS', 'Our Offers');
define('MENU_OFFERS_ID', '5');

define('MENU_CONTACT_US_ACCESS', 'Contact Us');
define('MENU_CONTACT_US_ID', '6');

define('MENU_IMAGE_GALLERY_ACCESS', 'Photo Gallery');
define('MENU_IMAGE_GALLERY_ID', '7');

define('MENU_VIDEO_GALLERY_ACCESS', 'Video Gallery');
define('MENU_VIDEO_GALLERY_ID', '8');

define('MENU_NOTES_ACCESS', 'News');
define('MENU_NOTES_ID', '9');

define('MENU_INSURANCE_CLIENTS_ACCESS', 'Insurance');
define('MENU_INSURANCE_CLIENTS_ID', '10');

define('MENU_PRODUCTS_ACCESS', 'Our Products');
define('MENU_PRODUCTS_ID', '11');

/*
 *
 * Define Tables names here
 */
define('TBL_USERS_ROLES', 'seha_roles');
define('TBL_USERS', 'seha_users');
define('TBL_CATEGORY', 'seha_categories');
define('TBL_CONFIG', 'seha_config');
define('TBL_LANGUAGES', 'seha_languages');
define('TBL_CURRENCIES', 'seha_currencies');
define('TBL_TRANSLATIONS', 'seha_translations');
define('TBL_LANGUAGES_ACTIVATED', 'seha_languages_activated');
define('TBL_CONTACT_LIST', 'seha_contact_list');
define('TBL_CONTACT_LIST_OWNERS', 'seha_contact_list_owners');
define('TBL_CONTACTS', 'seha_contacts');
define('TBL_NL_TEMPLATES', 'seha_nl_templates');
define('TBL_SUBSCRIBERS', 'seha_subscribers');
define('TBL_USER_GROUPS', 'seha_user_groups');
define('TBL_USER_PERMISSIONS', 'seha_user_permissions');
define('TBL_LOCATIONS', 'seha_locations');
define('TBL_COUNTRIES', 'seha_countries');
define('TBL_SUBSCRIBERS_MENU_ACCESS', 'seha_subscribers_menu_access');
define('TBL_PAGE_SETTINGS', 'seha_profile_page_settings');
define('TBL_ABOUT_PAGE_SETTINGS', 'seha_about_page_settings');
define('TBL_DOCTORS', 'seha_doctors');
define('TBL_SERVICES', 'seha_subcriber_services');
define('TBL_OFFERS', 'seha_subcriber_offers');
define('TBL_IMG_GALLERY', 'seha_subcriber_img_gallery');
define('TBL_VID_GALLERY', 'seha_subcriber_video_gallery');
define('TBL_CONTACT_US_PAGE', 'seha_subcriber_contact_us');
define('TBL_NOTES_PAGE', 'seha_subscriber_news');
define('TBL_INSURANCE_CLIENTS_PAGE', 'seha_subscriber_insurance_clients');
define('TBL_PRODUCTS', 'seha_subscriber_products');
define('TBL_TESTIMONIALS', 'seha_subscriber_testimonials');
define('TBL_USER_REVIEWS', 'seha_user_reviews');
define('TBL_ADS', 'seha_advertisements');
define('TBL_NEWSLETTER_SUBSCRIPTIONS', 'seha_newsletter_subscriptions');
define('TBL_PATIENTS', 'seha_patients');
define('TBL_SLIDES', 'seha_subscribers_slides');
define('TBL_ENQUIRIES', 'seha_enquiries');
define('TBL_OFFER_INTEREST', 'seha_patient_interest');
define('TBL_IP', 'seha_user_ip');
define('TBL_CITY', 'seha_cities');
define('TBL_REGION', 'seha_region');
define('TBL_SEHA_SUBS_TIMING', 'seha_subscriber_timings');
define('TBL_DEVICES', 'seha_devices');
define('TBL_SUBSCRIBERS_SMEDIA', 'seha_subscribers_smedia_settings');
define('TBL_SUBS_SPECIALIZATION', 'seha_subscribers_spl');
define('TBL_ARTICLES', 'seha_subscribers_articles');
define('TBL_FOLLOW', 'seha_subscriber_followers');
define('TBL_WALL', 'seha_subscribers_wall');
define('TBL_SPONSORS', 'seha_sponsors');
define('TBL_NOTIFICATIONS', 'seha_notifications');
define('TBL_NOTIFY_JOB', 'seha_notification_job');
define('TBL_COMMENTS', 'seha_patients_comments');
define('TBL_PATIENT_LIKES', 'seha_patients_likes');
define('TBL_FAVS', 'seha_patients_favourites');
define('TBL_TIPS', 'seha_health_tips');
define('TBL_GENERAL_NEWS', 'seha_news');
define('TBL_GENERAL_TIPS', 'seha_tips');
define('TBL_GENERAL_INSURANCE', 'seha_insurance');
define('TBL_CLIENT_INSURANCE', 'seha_subscriber_insurance');
define('TBL_DEPTS', 'seha_subscribers_departments');
define('TBL_APP_SLIDES', 'seha_slides');
define('TBL_SLIDES_DEPT', 'seha_slides_depts');
define("TBL_BANNERS", 	'seha_banners');

define("TBL_USER_DEPTS", 'seha_subscribers_depts');
define("TBL_SPECIALIZATIONS", "seha_specializations");
define("TBL_APPOINTMENTS", "seha_appointments");

/*External API Keys*/
define('GMAP_API_KEY', 'AIzaSyAImBQiqvaXOQtqeK8VC-9I96kMmB6Mz7I');
define('GOOGLE_API_KEY', 'AIzaSyA49g7Gf5UviaimPDOPNCrLHAzmKXyCtTE');

/*SUPPORT MAILS*/
define('SEHA_INFO_MAIL', 'info@360seha.com');

/* PUSHBOTS CREDENTIALS */
define('PUSHBOTS_APP_ID', '55ad33491779595a5e8b4568');
define('PUSHBOTS_APP_SECRET', 'dbb0fc50c2607f87733cd8029baaada4');

define('EDITOR_URL', 'editors/');
define("ROOT_PATH", 	$_SERVER['DOCUMENT_ROOT'].'/livework/360seha/');
define("JSON_DIR", ROOT_PATH.'m/search');
define("HTTP", 			"http://");
define("HTTP_HOST", 	$_SERVER["HTTP_HOST"].'/livework/360seha');
define("HOST_URL", 		HTTP.HTTP_HOST);

/* ONESIGNAL CREDENTIALS */
define('ONESIGNAL_APP_ID',   '83f40270-61d6-4a5d-902d-14594570eddf');
define('ONESIGNAL_AUTH_KEY', 'NDczMWIyMGQtNTFlNy00ZWYxLWJiYjctMzczZTY0ZjI5Y2U5');
define('ONESIGNAL_USER_KEY', 'MDk2NTgzOGEtMWE2ZC00YWVjLTkxN2QtNzhlN2QyMTA5NWUz');

/*
|--------------------------------------------------------------------------
| 	General Paths
|--------------------------------------------------------------------------
*/

define("BOWER_PATH",  		 			HTTP.HTTP_HOST."/bower_components");
define("PLUGINS_PATH",   				HTTP.HTTP_HOST."/plugins");
define("MISC_PATH",   					ROOT_PATH."/misc");
define("CLASSES_PATH",   				ROOT_PATH."/classes");

define('ACTIVE_THEME', HTTP.HTTP_HOST . '/themes/default/');

define("JS_PATH",  		 				  HTTP.HTTP_HOST."/assets/home/js");
define("CSS_PATH", 						  HTTP.HTTP_HOST."/assets/home/css");
define("IMG_PATH", 						  HTTP.HTTP_HOST."/assets/home/img");
define("ASSETS_PATH", 					HTTP.HTTP_HOST."/assets/home");

define("USER_JS_PATH",  		 		HTTP.HTTP_HOST."/site-assets/js");
define("USER_CSS_PATH", 				HTTP.HTTP_HOST."/site-assets/css");
define("USER_IMG_PATH", 				HTTP.HTTP_HOST."/site-assets/images");

define("INCLUDE_PATH", 	 				ROOT_PATH."/application/views/home/includes");
define("INCLUDE_ACCOUNT_PATH",  ROOT_PATH."/application/views/user/includes");
define("SITE_LAYOUT", 					'home/template');
define("USER_LAYOUT", 					'user/template');
define("SITE_MODELS", 					'site/');
define("USER_LOGIN", 					  '/signin');
define("ACCOUNT_PAGE", 					'/account/basic');

define("ADS_SHOW_PATH", 				      HTTP.HTTP_HOST.'/uploads/ads/');
define("BANNER_SHOW_PATH", 				    HTTP.HTTP_HOST.'/uploads/banners/');
define("SUBS_IMAGE_SHOW_PATH", 			  HTTP.HTTP_HOST.'/uploads/subscribers/profile/');
define("SUBS_IMAGE_PROFILE_UP_PATH", 	ROOT_PATH.'/uploads/subscribers/profile/');
define("PHOTOS_SHOW_PATH", 				    HTTP.HTTP_HOST.'/uploads/gallery/photo/');
define("VIDEOS_SHOW_PATH", 				    HTTP.HTTP_HOST.'/uploads/gallery/video/');

define("NEWS_SHOW_PATH", 				 HTTP.HTTP_HOST.'/uploads/news/');
define("ARTICLES_SHOW_PATH", 		 HTTP.HTTP_HOST.'/uploads/articles/');
define("SUBS_PHOTO_SHOW_PATH", 	 HTTP.HTTP_HOST.'/uploads/gallery/photo/');
define("SUBS_IMAGE_UP_PATH", 		 ROOT_PATH.'/uploads/gallery/photo/');
define("ARTICLES_UP_PATH", 			 ROOT_PATH.'/uploads/articles/');

define("TIPS_SHOW_PATH", 				 HTTP.HTTP_HOST.'/uploads/tips/');
define("OFFERS_IMG_SHOW_PATH", 	 HTTP.HTTP_HOST.'/uploads/subscribers/wall/');

define("DOCTORS_UP_PATH", 			 ROOT_PATH.'/uploads/doctors/');
define("DOCTORS_SHOW_PATH", 		HTTP.HTTP_HOST.'/uploads/doctors/');

/* INSTAGRAM CREDENTIALS */
define('INSTAGRAM_APP_ID',       '1239661688');
define('INSTAGRAM_APP_SECRET',   'fea7ebd96b314f8f89c3a61a14d971f2');
