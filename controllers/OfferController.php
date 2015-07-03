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
		return $this->registry->template->show('ofertas/alta');
	}

	public function crearOfertaValidator() {
		$errores = array();
	}
}

 ?>
