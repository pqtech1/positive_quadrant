<?php
defined('BASEPATH') or exit('No direct script access allowed');

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



$route['sitemap.xml'] = 'Home/sitemap';

$route['book-free-trial'] = 'Home/caseStudy'; 



$route['about-us'] = 'Home/about';
// $route['it-development'] = 'Home/development';
$route['it-development'] = 'Home/technology';
// $route['it-consultancy-services'] = 'Home/consultancy';
$route['it-consultancy'] = 'Home/industry';
$route['software-products'] = 'Home/SoftwareProduct';
$route['it-training-and-placement'] = 'Home/training';
$route['internship-program'] = 'Home/Internship';
$route['projects'] = 'Home/project';
$route['careers'] = 'Home/career';
// $route['careers'] = 'Home/jobopenings';
$route['contact-us'] = 'Home/contact';

// $route['course/(:any)'] = 'Home/training_details/$1';

// $route['training_details/(:any)'] = 'Home/training_details/$1';
// $route['(:any)'] = 'Home/training_details/$1';




// routes added after the modification

$route['technology'] = 'Home/technology';
$route['industry'] = 'Home/industry';
$route['web-development'] = 'Home/WebDevelopment';
$route['seo'] = 'Home/SEO';
$route['mobile-development'] = 'Home/MobileDevelopment';
$route['web-design'] = 'Home/WebDesign';
$route['machine-learning'] = 'Home/MachineLearning';
$route['e-commerce'] = 'Home/ECommerce';
$route['managed-hosting'] = 'Home/ManagedHosting';
$route['website-maintainance'] = 'Home/WebsiteMaintainance';
$route['search-engine-maintenance'] = 'Home/SearchEngineMaintenance';
$route['web-application'] = 'Home/WebApplication';
$route['iot'] = 'Home/IOT';
$route['software-product'] = 'Home/SoftwareProduct';
$route['hire-(:any)'] = 'home/Hire/$1';

$route['(:any)'] = 'Home/training_details/$1';
$route['hire'] = 'Home/Hire';            // For the main hire page
           // For the main hire page
// $route['hire/(:any)'] = 'home/Hire/$1';
// For hire page with specific ID





$route['default_controller'] = 'home';
$route['404_override'] = 'MyCustom404Ctrl';
$route['translate_uri_dashes'] = FALSE;
