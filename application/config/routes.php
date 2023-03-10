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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['api/home']['GET'] = 'Auth/UserController/index';
$route['api/register']['POST'] = 'Auth/UserController/register';

$route['api/login']['POST'] = 'Auth/UserController/login';
$route['api/logout']['GET'] = 'Auth/UserController/logout';

$route['api/addQuestion']['POST'] = 'Auth/QuestionController/addQuestion';
$route['api/modal']['GET'] = 'Auth/QuestionController/modal';
$route['api/delete/(:any)/(:any)'] = 'Auth/QuestionController/deleteQuestion/$1/$2';
$route['api/edit/(:any)/(:any)'] = 'Auth/QuestionController/editQuestion/$1/$2';
$route['api/allQuestions']['GET'] = 'Auth/QuestionController/allQuestions';
$route['api/userDetails']['GET'] = 'Auth/UserController/userDetails';

$route['api/search'] = 'Auth/QuestionController/search';
$route['api/upVote/(:any)'] = 'Auth/QuestionController/upVote/$1';
$route['api/downVote/(:any)'] = 'Auth/QuestionController/downVote/$1';

$route['api/answerModal']['GET'] = 'Auth/AnswerController/modal';
$route['api/addAnswer']['POST'] = 'Auth/AnswerController/addAnswer';
$route['api/allAnswers/(:any)']['GET'] = 'Auth/AnswerController/allAnswers/$1';
