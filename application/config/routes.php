<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['register'] = 'user/register';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['calendar'] = 'calendar/calendarHome';

$route['default_controller'] = 'forum';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
