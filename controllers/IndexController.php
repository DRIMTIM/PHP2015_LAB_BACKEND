<?php

Class IndexController Extends baseController {

	private $categoriasModel = NULL;
	private $ofertasStockModel = NULL;
	private $ofertasTemporalesModel = NULL;
	
	public function onConstruct(){
		$this->categoriasModel = new CategoryModel($this->registry);
		$this->ofertasStockModel = new StockOfferModel($this->registry);
		$this->ofertasTemporalesModel = new TemporalOfferModel($this->registry);
	}
		
	public function index() {
		/*** Cargo las categorias en el template para mostrarlas ***/
	    $this->registry->template->categorias = $this->categoriasModel->getAll();
	    /*** Cargo las ofertas en el template para mostrarlas ***/
	    $this->registry->template->ofertasStock = $this->ofertasStockModel->getAll();
	    $this->registry->template->ofertasTemporales = $this->ofertasTemporalesModel->getOfertasDelDia();
		/*** load the index template ***/
	    $this->registry->template->show('index');
	}

}

?>
