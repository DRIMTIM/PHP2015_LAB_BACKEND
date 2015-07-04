<?php
class AdminModel extends AbstractModel{
    
	protected $id = NULL;
	protected $email = NULL;
	protected $nombre = NULL;
	protected $apellido = NULL;
	protected $email = NULL;
	protected $fechaNac = NULL;
	protected $celular = NULL;
	protected $password = NULL;
	protected $passwordConfirm = NULL;
    protected $modificarPassword = false;
    protected $timeZone = NULL;
    
	

    public function onConstruct(){
    	$this->table_name = "ADMINISTRADORES";
    }
	
	/*public function borrar($idAdmin){
		return $this->registry->db->where("id", $idAdmin)->delete($this->table_name, 1);
	}

	public function obtener($email){
		$admin = $this->registry->db->where("nick", $email)->get($this->table_name);
		if(count($admin) > 0){
			//Formateo la fecha nac de salida
			$admin[0]["fechaNac"] = GenericUtils::getInstance()->getFormatDateOut($admin[0]["fechaNac"]);
		}
		return $admin[0];
	}
	
	public function update($idAdmin){
		$this->fromArray($_POST);
		$data = $this->toArray();
		//Quito los campos que no existen en la base
		unset($data["passwordConfirm"]);
		unset($data["modificarPassword"]);
		//Formateo la fecha de nacimiento al formato de sql
		$data["fechaNac"] = GenericUtils::getInstance()->getFormatDateIn($data["fechaNac"]);
		return $this->registry->db->where("id", $idAdmin)->update($this->table_name, $data);
	}*/
}
?>