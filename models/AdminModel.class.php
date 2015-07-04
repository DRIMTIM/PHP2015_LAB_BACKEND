<?php
class AdminModel extends AbstractModel{
    
	protected $id = NULL;
	protected $email = NULL;
	protected $nombre = NULL;
	protected $apellido = NULL;
	protected $pass = NULL;
	protected $nick = NULL;

    
    public function onConstruct(){
    	$this->table_name = "ADMINISTRADORES";
    }
	
	public function borrar($idAdmin){
		return $this->registry->db->where("id", $idAdmin)->delete($this->table_name, 1);
	}

	public function obtener($email){
		$admin = $this->registry->db->where("email", $email)->get($this->table_name);
		return $admin[0];
	}
	
	public function editar($idAdmin){
		$this->fromArray($_POST);
		$data = $this->toArray();
		unset($data['id']);

		return $this->registry->db->where("id", $idAdmin)->update($this->table_name, $data); 
	}
}
?>