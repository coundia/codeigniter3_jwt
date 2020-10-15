<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//hello
$route['hello']          = 'hello';
//auth
$route['auth/login']['post']           = 'auth/login';
$route['auth/logout']['post']          = 'auth/logout';

//others
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//book
$route['book']['get']          	       = 'book';
$route['book/detail/(:num)']['get']    = 'book/detail/$1';
$route['book/create']['post']   	   = 'book/create';
$route['book/update/(:num)']['put']    = 'book/update/$1';
$route['book/delete/(:num)']['delete'] = 'book/delete/$1';
