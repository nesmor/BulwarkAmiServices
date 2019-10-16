<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['api/asterisk_manager/users/(:num)'] = 'api/asterisk_manager/users/id/$1'; // Example 4
$route['api/asterisk_manager/execute/(:action)'] = 'api/asterisk_manager/execute/action/$1'; // Example 4
$route['api/asterisk_manager/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/asterisk_manager/users/id/$1/format/$3$4'; // Example 8
