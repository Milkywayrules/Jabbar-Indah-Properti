<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @chocobabana
 *
 */

// $default_controller = "main";
// $controller_exceptions = array('forums');
//
// $route['default_controller'] = $default_controller;
// $route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $default_controller.'/$1';
// $route['404_override'] = '';

$route['(:any)/manage/(:any)'] = '$1/manage/$2';

$route['(:any)/(:any)'] = '$1/main/$2';
$route['default_controller'] = 'main';

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
