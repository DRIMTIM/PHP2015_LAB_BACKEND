<?php
class OfferModel extends AbstractModel{
    
	protected $id = NULL;
    protected $titulo = NULL;
    protected $imagen = NULL;
    protected $descripcion = NULL;
    protected $descripcion_corta = NULL;
    protected $precio = NULL;
    protected $moneda = NULL;
    protected $activa = NULL;
	
    public function onConstruct(){
    	$this->table_name = "OFERTAS";
    }
    
}
?>