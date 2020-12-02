<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = 'Home/error_404';
$route['translate_uri_dashes'] = FALSE;
