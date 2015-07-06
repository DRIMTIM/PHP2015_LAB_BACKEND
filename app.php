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

$protocolo = $_SERVER["HTTPS"];

if(empty($protocolo)){
	$protocolo = "http://";
}else{
	$protocolo = "https://";
}

define('__CONTAINER_FOLDER', substr($site_path, 0, strripos($site_path, '/')));

define ( '__APPLICATION_FILES_FOLDER', __CONTAINER_FOLDER . '/APPLICATION_FILES/DT_MARKET');

define ( '__APPLICATION_FILES_FOLDER_SERVER', $protocolo . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . '/APPLICATION_FILES/DT_MARKET');

define ( '__APPLICATION_FILES_OFERTAS_FOLDER', __APPLICATION_FILES_FOLDER . '/OFERTAS');

define ( '__APPLICATION_FILES_OFERTAS_FOLDER_SERVER', __APPLICATION_FILES_FOLDER_SERVER . '/OFERTAS');

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