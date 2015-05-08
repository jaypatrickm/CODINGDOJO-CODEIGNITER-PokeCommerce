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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['admin'] = 'admins/index';
$route['admin/login'] = 'admins/login';
$route['admin/dashboard'] = 'admins/dashboard';
$route['admin_login'] = 'admins/login_check';
$route['admin/logoff'] = 'admins/logout';
$route['admin/register'] = 'admins/admin_registration';
$route['admin_register'] = 'admins/register';
$route['admin/dashboard/products'] = 'admins/product/1';
$route['admin/dashboard/products/(:any)'] = 'admins/product/$1';
$route['admin/dashboard/orders'] = 'admins/admin_orders';
$route['admin/dashboard/products/edit/(:any)'] = 'admins/edit/$1';
$route['admin/dashboard/products/add'] = 'admins/add_product';
$route['admin/dashboard/products/add_product'] = 'admins/add_product_validation';
$route['admin/dashboard/products/delete/(:any)'] = 'admins/delete_product/$1';
$route['admin/delete_product/(:any)'] = 'admins/delete/$1';
$route['admin_edit_product'] = 'admins/admin_edit_product';
$route['product/(:any)'] = 'mains/show_product/$1';
$route['checkout'] = 'mains/checkout';
$route['shippingBilling'] = 'mains/shippingBilling';
$route['default_controller'] = 'mains';
$route['products/(:any)'] = 'mains/products/$1';
$route['404_override'] = '';
$route['home'] = "/mains/products/1";
$route['addtocart'] = "mains/buytocart";
$route['allpoke'] = "mains/getshowall";
$route['products/types/(:any)'] = "mains/getallpoketypes/$1";
$route['translate_uri_dashes'] = FALSE;
