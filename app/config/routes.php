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


$route['default_controller'] = "inicio";
$route['404_override'] = 'inicio/redirecionamento';

/******************
 * dynamic routes *
 *****************/
include_once APPPATH . "cache/config/routes.php";

/******************
 *  manual routes *
 *****************/
// para sistema de banners
$route['banner/(:any)'] = "inicio/$1";

// controller de notícias
$route['portfolio/index/[tag:|pag:](:any)'] = "portfolio/index/$1";// paginação/tags
$route['portfolio/getmore/(:any)'] = "portfolio/getmore/$1";// demais
$route['portfolio/getmore'] = "portfolio/getmore";// demais
//$route['portfolio/texts'] = "portfolio/texts";
$route['portfolio/(:any)'] = "portfolio/show/$1";// demais

// controller de notícias
$route['noticias/[tag:|pag:](:any)'] = "noticias/index/$1";// paginação/tags
$route['noticias/c/(:any)'] = "noticias/categoria/$1";// categoria
$route['noticias/(:any)'] = "noticias/display/$1";



// para pesquisa
//$route['pesquisa/r/(:any)'] = "pesquisa/results/$1";
$route['pesquisa/(:any)'] = "pesquisa/results/$1";




// rereescrevendo
//$route['pagina-a/pagina-interna'] = "file";

/*
| -------------------------------------------------------------------------
| ROTAS GENÉRICAS PARA SITES MULTILINGUES
| Para rotas específicas definir abaixo destas regras.
| -------------------------------------------------------------------------
 */
//$route['^../(.+)$'] = "$1"; // For 2 chars
//$route['^...../(.+)$'] = "$1"; // For 5 chars ex.: /pt_br/about
//$route['^..$'] = $route['default_controller'];

// URI like '/en/about' -> use controller 'about'
$route['^fr/(.+)$'] = "$1";
$route['^en/(.+)$'] = "$1";
$route['^pt/(.+)$'] = "$1";
$route['^es/(.+)$'] = "$1";

// '/en' and '/fr' URIs -> use default controller
$route['^fr$'] = $route['default_controller'];
$route['^en$'] = $route['default_controller'];
$route['^pt$'] = $route['default_controller'];
$route['^es$'] = $route['default_controller'];
/*
| -------------------------------------------------------------------------
| /FIM/ DAS ROTAS GENÉRICAS PARA SITES MULTILINGUES
| -------------------------------------------------------------------------
 */

/* End of file routes.php */
/* Location: ./application/config/routes.php */