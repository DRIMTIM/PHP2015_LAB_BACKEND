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
	
    public function __construct($registry) {
        parent::__construct(registry);
        $this->table_name = "OFERTAS";
    }

    public function onConstruct(){ }
    
}
?>