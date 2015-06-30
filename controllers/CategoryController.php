<?php

Class CategoryController Extends baseController {

	private $categoriasModel = NULL;
	
	public function onConstruct(){
		$this->categoriasModel = new CategoryModel($this->registry);
	}
		
	public function index() {
		/*** Cargo las categorias en el template para mostrarlas ***/
	    $this->registry->template->categorias = $this->categoriasModel->getAll();

	    $this->registry->template->show('category/index');
	}

}

?>