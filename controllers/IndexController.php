<?php

Class IndexController Extends baseController {

	private $offer_model = NULL;
	private $adminModel = NULL;

	public function onConstruct(){
		$this->adminModel = new AdminModel($this->registry);
		$this->offer_model = new OfferModel($this->registry);
	}

	public function index() {		
		$ofertas = $this->offer_model->getAll();
		$this->registry->template->ofertas = $ofertas;		
        $this->registry->template->show('index');
	}

	public function getAll() {
		$ofertas = $this->offer_model->getAll();
		echo json_encode($ofertas);
	}
		

}

?>
