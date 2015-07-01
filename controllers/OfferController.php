<?php 
class OfferController extends baseController {
	
	private $offer_model;

	function onConstruct() {
		$this->offer_model = new OfferModel($this->registry);		
	}

	public function index() {
		return $this->registry->template->show('ofertas/alta');
	}

	public function alta() {
		return $this->registry->template->show('ofertas/alta');
	}

	public function crearOferta() {
		$offer_model.crearOferta();
		return $this->registry->template->show('ofertas/alta');
	}

}

 ?>