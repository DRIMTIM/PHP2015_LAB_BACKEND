<?php

Class AjaxController extends BaseController {

	private $ofertas_model = NULL;
	private $categoriasModel = NULL;
	private $adminModel = NULL;
	
	public function onConstruct(){
		$this->ofertas_model = new OfferModel($this->registry);
		$this->categoriasModel = new CategoryModel($this->registry);
		$this->adminModel = new AdminModel($this->registry);
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

	public function getAdmin($email){
		$admin = $this->adminModel->obtener($email);
		echo json_encode($admin);

	}	

	public function editAdmin($idAdmin){
		$this->adminModel->editar($_POST['id']);
		$admin = $this->adminModel->obtener($_POST['email']);
		echo json_encode($admin);
	}	


	//*************************************************************//
	// Response AJAX para Ofertas 						    	   //
	//*************************************************************//

	public function getOferta(){



	}

	public function getAllOfertas() {
		$ofertas = $this->ofertas_model->getAll();
		//$this->registry->template->ofertas = $ofertas;
		echo json_encode($ofertas);
	}

	public function borrarOferta(){
		$this->ofertas_model->borrar($_GET['idOffer']);
	}

	public function activar_desactivarOferta(){

		$this->ofertas_model->activarDesactivar($_POST['idOffer']);

	}
	
}

?>
