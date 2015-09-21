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

$route['default_controller'] = "login_ci";
$route['login'] = "login_ci";
$route['login/logout'] = "login_ci/logout";

$route['inicio'] = "home";
$route['home/getDetalle'] = "home/get_detalle";

$route['admin'] = "usuario_ci";
$route['admin/agregar']    = "usuario_ci/mult_user";
$route['admin/usuario']    = "usuario_ci/getUsuario";
$route['admin/eliminar']   = "usuario_ci/eliminar_user";

$route['apertura_general'] = "apergen_ci";
$route['apertura_detalle'] = "apertdet_ci";
$route['insignias'] = "insignias_ci";

$route['promedio_general'] = "promgen_ci";
$route['promedio_general/GetItemCursos/(:num)'] = "promgen_ci/get_itemcursos/$1";
$route['promedio_general/GetPromedioGeneral'] = "promgen_ci/getPromedioGeneral";

$route['promedio_grupo'] = "promgrupo_ci";
$route['promedio_grupo/GetPromedioGeneral'] = "promgrupo_ci/getPromedioGeneral";

$route['ejecutivo_general'] = "ejegen_ci";

$route['ejecutivo_detalle'] = "ejedet_ci";
$route['ejecutivo_detalle/getDetalle'] = "ejedet_ci/get_Detalle";


$route['diplomas'] = "pdf_ci";
$route['diplomas/getDiploma'] = "pdf_ci/get_Diploma";

$route['segdocente'] = "segdocente_ci";
//$route['segdocente/getSegDocente'] = "segdocente_ci/segDocente_Ajax";


$route['diplomas_emitidos'] = "diplomaemitido_ci";
//$route['diplomas_emitidos/getDataAjax'] = "diplomaemitido_ci/getData_Ajax";

$route['entrega_final'] = "entregafinal_ci";
//$route['entrega_final/getDataAjax'] = "entregafinal_ci/getData_Ajax";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */