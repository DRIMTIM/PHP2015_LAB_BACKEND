<?php

Class CategoryController Extends baseController {

	private $categoriasModel = NULL;
	private $categoria = NULL;
	
	public function onConstruct(){
		$this->categoriasModel = new CategoryModel($this->registry);
	}
		
	public function index() {
	    $this->registry->template->categorias = $this->categoriasModel->getAll();
	    $this->registry->template->show('category/index');
	}

	public function altaCategoria(){
		$this->categoriasModel->guardar();
		$this->index();
	}

	public function getCategoria(){
		$categoria = $this->categoriasModel->obtener($_GET['idCat']);
		$this->registry->template->categoria = $categoria;
		$this->index();
	}

	public function editarCategoria(){
		$this->categoriasModel->editar($_POST['idCat']);
		$this->index();
	}	

	public function borrarCategoria(){
		$this->categoriasModel->borrar($_GET['idCat']);
		$this->index();
	}	

}

?>