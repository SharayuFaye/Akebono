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
$route['default_controller'] = 'welcome';
$route['tableajax'] = 'welcome/Tableajax';
$route['login'] = 'welcome/login';
$route['logout'] = 'welcome/logout';
$route['Mold'] = 'welcome/Mold';
$route['Temp'] = 'welcome/Temp';
$route['Temp1'] = 'welcome/Temp1';
$route['welcome_message'] = 'welcome/welcome_message';
$route['Machinecontrol'] = 'welcome/Machinecontrol';
$route['Machinerunning'] = 'welcome/Machinerunning'; 
$route['Cleanhistory'] = 'welcome/Cleanhistory'; 
$route['cleanhistorydata'] = 'welcome/cleanhistorydata';
$route['forecastsetting'] = 'welcome/forecastsetting';
$route['forecast'] = 'welcome/forecast';
$route['production'] = 'welcome/production';
$route['Statushistory'] = 'welcome/Statushistory';
$route['Statushistory1'] = 'welcome/Statushistory1';
$route['Shortcounterhistory'] = 'welcome/Shortcounterhistory';
$route['Moldsetting'] = 'welcome/Moldsetting';
$route['Moldsetting1'] = 'welcome/Moldsetting1';
$route['Moldsearch'] = 'welcome/Moldsearch';
$route['download_xls'] = 'welcome/download_xls';
$route['404_override'] = '';

$route['Inspection_Result_Sheet'] = 'welcome/Inspection_Result_Sheet';
$route['Mold_Die_History_Record'] = 'welcome/Mold_Die_History_Record';

$route['operate_mold'] = 'welcome/operate_mold';




$route['manage_user'] = 'welcome/manage_user'; 

$route['profile'] = 'welcome/profile'; 
$route['about_us'] = 'welcome/about_us'; 
$route['translate_uri_dashes'] = FALSE;
