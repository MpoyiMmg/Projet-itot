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

$route['default_controller']  =  'welcome';
$route['login_valide']        = 'login/loginController/login_validation';

//le routing du client

$route['annuler_rdv']         = 'client/ClientController';
$route['modifier_rdv']        = 'client/ClientController/modifier_rdv';
$route['login_validation']    = 'login/loginController/login_validation';

//rooting vers le controlleur de l'entreprise

$route['entreprise']          = 'welcome/list_entreprise';   
$route['lister_entreprise']   = 'entreprise/EntrepriseController/get_Entreprise';
$route['horaire']             = 'horaire/HoraireController';
$route['rdv']                 = 'rdv/RdvController';
$route['404_override']        = '';
$route['translate_uri_dashes']= FALSE;
$route['ajouter_horaire']             = 'entreprise/horaire/HoraireController/ajouter_horaire';


// rooting vers le controlleur login

$route['login']               = 'login/LoginController';
$route['register']            = 'entreprise/EntrepriseController/register';
$route['inscription']         = 'entreprise/EntrepriseController/inscription_entreprise';
$route['inscription2']        = 'entreprise/EntrepriseController/upload_logo';
$route['agent']               = 'agent/AgentController';  
$route['ajouter_agent']       = 'agent/AgentController/ajouter_agent';
$route['ajouter_departement'] = 'departement/DepartementController/enregstrer_departement';
$route['modifier_agent']      = 'agent/AgentController/modifier_agent';
$route['delete_agent']        = 'agent/AgentController/delete_agent';
$route['logout']              = 'login/LoginController/logout_entreprise';
$route['logout_agent']        = 'login/LoginController/logout_agent';
$route['login_agent']         = 'login/loginController/login_agent';
$route['agent_login']         = 'login/loginController/load_login_view';
$route['entreprise2']         = 'welcome/entreprise';
$route['Prendre_Rdv']         = 'rdv/RdvController/prendre_rdv';
$route['welcome']             = 'Welcome/index';