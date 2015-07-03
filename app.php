<?php 

session_start ();

/**
 * * error reporting on **
 */
error_reporting ( E_ALL );

/**
 * * define the site path **
*/
$site_path = realpath ( dirname ( __FILE__ ) );
define ( '__SITE_PATH', $site_path );

/**
 * cargo las inicializaciones
 */

/**
 * * include the init.php file **
 */
include 'includes/init.php';

/**
 * * load the router **
 */
$registry->router = new router ( $registry );

/**
 * * set the controller path **
*/
$registry->router->setPath ( __SITE_PATH . '/controllers');

/**
 * * load up the template **
*/
$registry->template = new template ( $registry );

/**
 * Defino pattern para ajax
 */
define('__AJAX_URL_PATTERN', "ajax");
define('__LOGIN_URL', "login");
define('__BACKEND_URL', "backend");

$ajax = __AJAX_URL_PATTERN;
$login = __LOGIN_URL;
$__DEFAULT = __BACKEND_URL;
$ambito = $__DEFAULT;

/**
 * Obtengo la url del request
 */
$url = $_SERVER['REQUEST_URI'];
	
/**
 * Evaluo si es un request de ajax o no
 */
if(stripos($url, __AJAX_URL_PATTERN)){
	/**
	 * Inicio la carga de la respuesta del request ajax
	 */
	$ambito = "ajaxHandler";
}

define('__AMBITO', $ambito);

include __AMBITO . '.php';

?>