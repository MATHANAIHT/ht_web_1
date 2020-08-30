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

// For User Routing :
$route['default_controller'] = 'frontend';
$route['login'] = 'frontend/login';
$route['register'] = 'frontend/register';
$route['verify'] = 'frontend/verify';
$route['forgot-password'] = 'frontend/forgotPassword';
$route['update-password'] = 'frontend/updatePassword';
$route['change-password'] = 'frontend/changePassword';
//$route['(:any)'] = '';


// For Admin Routing :
$route['admin_controller'] = 'admin';
$route['admin'] = 'admin/login';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/login'] = 'admin/login';
$route['admin/forgot-password'] = 'admin/forgotPassword';
$route['admin/update-password'] = 'admin/updatePassword';
$route['admin/change-password'] = 'admin/changePassword';
//Masters
$route['admin/mother-tongue'] = 'admin/motherTongue';
// Location info
$route['admin/country'] = 'admin/country';
$route['admin/state'] = 'admin/state';
$route['admin/city'] = 'admin/city';
// Religion info
$route['admin/religion'] = 'admin/religion';
$route['admin/caste'] = 'admin/caste';
$route['admin/sub-caste'] = 'admin/subCaste';
$route['admin/raasi'] = 'admin/raasi';
$route['admin/star'] = 'admin/star';
// Professional Info
$route['admin/education-category'] = 'admin/educationCategory';
$route['admin/education'] = 'admin/education';
$route['admin/occupation-category'] = 'admin/occupationCategory';
$route['admin/occupation'] = 'admin/occupation';
$route['admin/annual-income'] = 'admin/annualIncome';
$route['admin/employed-in'] = 'admin/employedIn';

// For API Call
$route['api_controller'] = 'api';
$route['api/login'] = 'api/login';
$route['api/user-type'] = 'api/userType';
$route['api/admin-user'] = 'api/adminUser';
$route['api/annual-income'] = 'api/annualIncome';
$route['api/delete'] = 'api/delete';

$route['api/country'] = 'api/country';
$route['api/save-country'] = 'api/saveCountry';
$route['api/state'] = 'api/state';
$route['api/save-state'] = 'api/saveState';
$route['api/caste'] = 'api/caste';
$route['api/save-caste'] = 'api/saveCaste';
$route['api/city'] = 'api/city';
$route['api/save-city'] = 'api/saveCity';
$route['api/sub-caste'] = 'api/subCaste';
$route['api/save-sub-caste'] = 'api/saveSubCaste';
$route['api/occupation'] = 'api/occupation';
$route['api/save-occupation'] = 'api/saveOccupation';
$route['api/education'] = 'api/education';
$route['api/save-education'] = 'api/saveEducation';
$route['api/religion'] = 'api/religion';
$route['api/save-religion'] = 'api/saveReligion';
$route['api/raasi'] = 'api/raasi';
$route['api/star'] = 'api/star';
$route['api/save-raasi'] = 'api/saveRaasi';
$route['api/save-star'] = 'api/saveStar';
$route['api/mother-tongue'] = 'api/motherTongue';
$route['api/save-mother-tongue'] = 'api/saveMotherTongue';
$route['api/employed-in'] = 'api/employedIn';
$route['api/save-employed-in'] = 'api/saveEmployedIn';
$route['api/education-category'] = 'api/educationCategory';
$route['api/save-education-category'] = 'api/saveEducationCategory';
$route['api/occupation-category'] = 'api/occupationCategory';
$route['api/save-occupation-category'] = 'api/saveOccupationCategory';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
