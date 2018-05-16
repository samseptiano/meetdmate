<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'UlalaLanding';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'ulalaLogin/index';
// $route['forgot-password'] = 'ulala/forgotpass';
$route['register'] = 'ulalaRegister/index';
$route['checkemail'] = 'ulalaRegister/check_availability_email';
$route['checkpassword'] = 'Ulala/check_availability_password';
$route['home'] = 'Ulala/index';
$route['profile'] = 'Ulala/profile';
$route['profile-friend/(:any)'] = 'Ulala/friendprofile/$1';
$route['profile-edit'] = 'Ulala/edit_profile';
$route['search-filter'] = 'Ulala/edit_searchfriend';
$route['process-edit-profile'] = 'Ulala/process_edit_profile';
$route['friendslist'] = 'Ulala/friendslist';
$route['searchfriends'] = 'Ulala/searchfriend';
$route['message/(:any)'] = 'Ulala/chatting/$1';
$route['inbox'] = 'ulala/inbox';
$route['processregister'] = 'ulalaRegister/processregister';
$route['processlogin'] = 'ulalaLogin/processlogin';
$route['logout'] = 'ulalaLogin/logout';
$route['delete-photo/(:any)'] = 'ulala/delete_photo/$1';
$route['upload-photo'] = 'ulala/update_photo';
$route['eq-test'] = 'ulala/EQtest';
$route['processEQ'] = 'ulala/processEQtest';
$route['sq-test'] = 'ulala/SQtest';
$route['processSQ'] = 'ulala/processSQtest';
$route['password-edit'] = 'Ulala/processeditpassword';
$route['about_us'] = 'Ulala/about';
$route['delete_permanently'] = 'Ulala/delete_permanent';
$route['forget-password'] = 'UlalaLogin/forgotpassword';
$route['delete-message/(:any)'] = 'Ulala/deletemessage/$1';
$route['reset-password/(:any)'] = 'UlalaLogin/resetpassword/$1';

$route['about-us'] = 'UlalaLanding/about';
$route['what-is-sq'] = 'UlalaLanding/sq';
$route['what-is-eq'] = 'UlalaLanding/eq';
