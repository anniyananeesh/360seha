<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['admin/(:any)'] = "admin/$1";
$route['adminlogin'] = "adminlogin/index";
$route["maintanence"] = "maintanence/index";
$route["launch"] = "launch/index";
$route['subscribers/(:any)'] = "subscribers/$1";

$route["contact"] = "contact/index";
$route["advertise"] = "advertise/index";
$route["privacy_policy"] = "privacy_policy/index";
$route["terms"] = "terms/index";
$route["search"] = "search/index";
$route["offers"] = "offers/index";
$route["async/(:any)"] = "async/$1";
$route["account/async/(:any)"] = "account/async/$1";
$route["signin"] = "signin/index";
$route["forgot"] = "forgot/index";
$route["join"] = "join/index";
$route["articles"] = "articles/index";
$route["articles/details/(:any)"] = "articles/details/$1";
$route["news"] = "news/index";
$route["news/details/(:any)"] = "news/details/$1";
$route["lang/(:any)"] = "lang/index/$1";
$route["health_tips"] = "health_tips/index";
$route["health_tips/details/(:any)"] = "health_tips/details/$1";
$route["account/basic"] = "account/basic/index";
$route["account/location"] = "account/location/index";
$route["account/contact"] = "account/contact/index";
$route["account/departments"] = "account/departments/index";
$route["account/departments/add"] = "account/departments/add";
$route["account/timings"] = "account/timings/index";
$route["account/photos"] = "account/photos/index";
$route["account/videos"] = "account/videos/index";
$route["account/details"] = "account/details/index";
$route["account/doctors"] = "account/doctors/index";
$route["account/doctors/all"] = "account/doctors/all";
$route["account/doctors/add"] = "account/doctors/add";
$route["account/doctors/edit/(:any)"] = "account/doctors/edit/$1";
$route["account/doctors/status/(:any)/(:any)"] = "account/doctors/status/$1/$2";
$route["account/doctors/delete/(:any)"] = "account/doctors/delete/$1";
$route["account/settings"] = "account/settings/index";
$route["country/(:any)"] = "country/index/$1";
$route["account/logout"] = "account/logout/index";
$route["account/logo"] = "account/logo/index";
$route["account/login"] = "account/login/index";
$route["account/access"] = "account/access/index";
$route["account/insurance"] = "account/insurance/index";
$route["about"] = "about/index";
$route["account/specializations"] = "account/specializations/index";
$route["account/reviews"] = "account/reviews/index";
$route["account/reviews/view/(:any)"] = "account/reviews/view/$1";
$route["account/reviews/approve/(:any)/(:any)"] = "account/reviews/approve/$1/$2";
$route["account/reviews/delete/(:any)"] = "account/reviews/delete/$1";

$route["account/appointments"] = "account/appointments/index";
$route["account/appointments/add"] = "account/appointments/add";
$route["account/appointments/edit/(:any)"] = "account/appointments/edit/$1";
$route["account/appointments/delete/(:any)"] = "account/appointments/delete/$1";

$route["account/news"] = "account/news/index";
$route["account/news/add"] = "account/news/add";
$route["account/news/edit/(:any)"] = "account/news/edit/$1";
$route["account/news/delete/(:any)"] = "account/news/delete/$1";
$route["account/news/status/(:any)"] = "account/news/status/$1/$2";

$route["account/offers"] = "account/offers/index";
$route["account/offers/add"] = "account/offers/add";
$route["account/offers/edit/(:any)"] = "account/offers/edit/$1";
$route["account/offers/delete/(:any)"] = "account/offers/delete/$1";
$route["account/offers/status/(:any)"] = "account/offers/status/$1/$2";
$route["account/offers/send/(:any)"] = "account/offers/send/$1";

$route['s404'] = 'p/s404';
$route['(:any)'] = "profile/index/$1";
