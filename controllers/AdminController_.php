<?php

class AdminController extends baseController {

	private $adminModel = NULL;

		public function onConstruct(){
		$this->adminModel = new AdminModel($this->registry);
	}
	public function index() {
        $this->registry->template->show('admin/index');
	}

	public function account(){
		$this->registry->template->show('admin/account');
	} 
	
	/*public function login(){

		$email = $_POST["email"];
		$password = $_POST["password"];
		if(!empty($email) && empty($password)){
			$admin = $this->adminModel->obtenerAdmin($email);
			if($admin !== null){
				$this->registry->template->admin = $admin;
			}		
		}else if(!empty($password) && !empty($email)){
			$admin = $this->adminModel->obtenerAdmin($email);
			$_SESSION[__ADMIN] = $admin;
			return;
		}
		$this->registry->template->show('index');
	}*/

	/*public function getAdmin($email){

		$admin = $this->adminModel->obtener($email);
		return $admin[0];

	}*/	
	
	/*public function logout(){
		session_unset();
		$this->registry->template->showOther('index');
	}*/
	
	/*public function modificarDatos(){
			
		if($modificarPassword !== "true"){
			$_POST["password"] = $this->admin["password"];
		}
		$this->adminModel->updateadmin($this->admin["id"]);
		$_SESSION[__ADMIN] = $this->adminModel->obteneradmin($this->admin["nick"]);
		$this->index();
	}*/
	
	/*public function bajaCuenta($idAdmin){
	
		$this->adminModel->borrar($idAdmin);
		session_unset();
		$this->registry->template->showOther('index');
	}*/
	
}
?>