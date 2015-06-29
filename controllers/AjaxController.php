<?php

Class AjaxController extends BaseController {

	private $ofertasTemporalesModel = NULL;
	
	public function onConstruct(){
		$this->ofertasTemporalesModel = new TemporalOfferModel($this->registry);
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
	
}
