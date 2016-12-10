<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['en'] = "en/index/";
$route['en/(:any)'] = "en/$1";
$route['async/(:any)'] = "async/$1";
$route['auth/(:any)'] = "auth/$1";
$route['login'] = "login/index/";
$route['signup/(:any)'] = "signup/$1";
$route['welcome/(:any)'] = "welcome/$1";
$route['lang/(:any)'] = "lang/index/$1";

$route['subscribers/(:any)'] = "subscribers/$1";
$route['admin/(:any)'] = "admin/$1";
$route['adminlogin'] = "adminlogin/index";
$route['maps/ll/(:any)'] = "maps/ll/$1/$2";

$route['maps/ll/(:any)'] = "maps/ll/$1/$2";

$route['s404'] = 'p/s404';
$route['(:any)'] = "p/index/$1";
$route['(:any)'] = "p/index/$1/$2";
$route['get_listed'] = "en/get_listed";