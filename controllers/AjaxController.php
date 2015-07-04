<?php

Class AjaxController extends BaseController {

	private $ofertasTemporalesModel = NULL;
	private $categoriasModel = NULL;
	private $adminModel = NULL;
	
	public function onConstruct(){
		$this->ofertasTemporalesModel = new TemporalOfferModel($this->registry);
		$this->categoriasModel = new CategoryModel($this->registry);
	}
	
	public function index() {
		$this->registry->template->show('user/index');
	}
	
	public function saveClientTimeZone(){
		$_SESSION[__CLIENT_TIME_ZONE] = $_POST[__CLIENT_TIME_ZONE];
		$response = $_SESSION[__CLIENT_TIME_ZONE];
		echo $this->getOKMessage($response);
	}
	
	public function refreshOfertasDelDia(){
		$this->registry->template->ofertasTemporales = $this->ofertasTemporalesModel->getOfertasDelDia();
		$this->registry->template->show('product/ofertasTemporales');
	}

	//*************************************************************//
	// Response AJAX para las Categorias 						   //
	//*************************************************************//
	public function getCategoria(){

		$categoria = $this->categoriasModel->obtener($_GET['idCat']);
		$this->registry->template->categoria = $categoria;
		echo json_encode($categoria);

	}

	public function getCategorias(){

		$categorias = $this->categoriasModel->getAll();
		$this->registry->template->categorias = $categorias;
		echo json_encode($categorias);

	}

	public function editarCategoria(){
		$this->categoriasModel->editar($_POST['id']);
	}

	public function borrarCategoria(){
		$this->categoriasModel->borrar($_GET['idCat']);
	    $this->registry->template->categoria = $this->categoriasModel->getAll();	
	}	


	//*************************************************************//
	// Response AJAX para Admin 						    	   //
	//*************************************************************//

	/*public function getAdmin($email){

		$admin = $this->adminModel->obtener($email);
		echo json_encode($admin[0]);

	}*/	
	
}

?>
