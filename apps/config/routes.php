<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
#$route['docs/(:any)'] = 'docs/index/$1';

$route['(movie|news|help)/(:num)'] = '$1/index/$2';
$route['(movie|news|help)/(:num)/(:num)'] = '$1/index/$2/$3';
$route['(login|logout|register|facebookLogin)(.*)'] = 'member/$1$2';
$route['(aboutus|conditions|privacy|conditions|contactus)(.*)'] = 'statics/$1$2';

$route['api/(:any)/(:num)'] = 'api/$1/index/$2';

$route['samsung'] = 'samsung/home';
$route['samsung/movie/(:num)/(:num)'] = 'samsung/movie/index/$1/$2';
$route['samsung/(a-Z)/(:num)'] = 'samsung/$1/index/$2';


$route['backoffice'] = 'backoffice/dashboard';
$route['backoffice/([a-z]+)/(:num)'] = 'backoffice/$1/index/$2';
$route['backoffice/docs/([a-z]+)'] = 'backoffice/home/example/$1/';


/* End of file routes.php */
/* Location: ./application/config/routes.php */