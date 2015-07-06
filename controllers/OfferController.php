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
		$ofertas = $this->offer_model->getAll();
		$this->registry->template->ofertas = $ofertas;
	    $this->registry->template->show('index');
	}

	public function alta() {
		$this->registry->template->categorias = $this->categorias_model->getAll();
		return $this->registry->template->show('ofertas/alta');
	}

	public function crearOferta() {
		$this->offer_model->crearOferta();
		return $this->alta();
	}

	public function getOferta(){
		$oferta = $this->offer_model->getOferta($_GET['id']);
		$this->registry->template->oferta = $oferta;
		$this->registry->template->categorias = $this->categorias_model->getAll();
		return $this->registry->template->show('ofertas/edit');

	}

	public function oferta(){
		echo "la concha de la lora";
		echo $_GET['id'];
	}

	public function getAll() {
		$ofertas = $this->offer_model->getAll();
		$this->registry->template->ofertas = $ofertas;
		return $ofertas;
	}

	public function borrarOferta(){
		$this->offer_model->borrar($_GET['idOffer']);
		return $this->index();
	}

	public function update() {
		$tipo = $_POST["tipo"];
		$id = $_POST["id"];
		$this->offer_model->update();
		return $this->index();
	}

}

 ?>
