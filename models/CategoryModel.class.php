<?php
class CategoryModel extends AbstractModel{
    
	protected $id = null;
	protected $nombre = null;
	protected $descripcion = null;
	
	public function onConstruct(){
    	$this->table_name = "CATEGORIAS";
    }

	public function guardar(){
		$this->fromArray($_POST);
		$data = $this->toArray();
		return $this->registry->db->insert($this->table_name, $data);
	}  

	public function obtenerCategoria($idCat){
		$categoria = $this->registry->db->where("id", $idCat)->get($this->table_name);
		return $categoria[0];
	}
	
	public function editarCategoria($idCat){
		$this->fromArray($_POST);
		$data = $this->toArray();

		return $this->registry->db->where("id", $idCat)->update($this->table_name, $data);
	}	 

	public function borrar($idCat){
		return $this->registry->db->where("id", $idCat)->delete($this->table_name, 1);
	}	  
	
}
?>