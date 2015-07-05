<?php
class OfferController extends baseController {

	private $offer_model;
	private $categorias_model;

	public function __construct($registry) {
		parent::__construct($registry);
		$this->offer_model = new OfferModel($this->registry);
		$this->categorias_model = new CategoryModel($this->registry);
	}

	public function onConstruct() {}

	public function index() {
		return alta();
	}

	public function alta() {
		$this->registry->template->categorias = $this->categorias_model->getAll();
		return $this->registry->template->show('ofertas/alta');
	}

	public function crearOferta() {
		$this->offer_model->crearOferta();
		return $this->alta();
	}

	public function getAll() {
		$ofertas = $this->offer_model->getAll();
		return $ofertas;
	}
	// public function validateAlta() {
	//
	// 	$errores = array();
	// 	$titulo $_POST['titulo'];
	// 	$imagen = $_FILES['imagen'];
	// 	$descripcion = $_POST['descripcion'];
	// 	$descripcion_corta = $_POST['descripcion_corta'];
	// 	$precio = $_POST['precio'];
	// 	$moneda = $_POST['moneda'];
	// 	$fecha_inicio = $_POST['fecha_inicio'];
	// 	$fecha_fin = $_POST['fecha_fin'];
	// 	$stock = $_POST['stock'];
	//
	// 	if(empty($titulo)) {
	// 		array_push($errores, 'Titulo vacio.');
	// 	}
	// 	if(empty($imagen)) {
	// 		array_push($errores, 'Imagen vacia.');
	// 	}
	// 	if(empty($descripcion) || empty($descripcion_corta)) {
	// 		array_push($errores, 'Descripcion vacia');
	// 	}
	// 	if(empty($precio)) {
	// 		array_push($errores, 'Precio vacio.');
	// 	}
	// 	if ($tipo == 'temporal') {
	// 		if(!GenericUtils::getInstance()->isFechaValida($fecha_inicio)){
	// 			array_push($errores, "La fecha ingresada no es valida!");
	// 		}
	// 		if(!GenericUtils::getInstance()->isFechaValida($fecha_fin)){
	// 			array_push($errores, "La fecha ingresada no es valida!");
	// 		}
	// 	}
	// 	else if ($tipo == 'stock') {
	// 		if(empty($precio) || $precio < 0) {
	// 			array_push($errores, "Precio incorrecto.");
	// 		}
	// 	}
	// 	else if ($tipo != 'normal'){
	// 		array_push($errores,'Tipo incorrecto');
	// 	}
	// 	return $errores;
	// }
}

 ?>
