<?php
class CategoryModel extends AbstractModel{
    
	protected $id = null;
	protected $nombre = null;
	protected $descripcion = null;
	
	public function onConstruct(){
    	$this->table_name = "CATEGORIAS";
    }
	
}
?>