<?php
class OfferModel extends AbstractModel{

    private $table_temporales = "OFERTAS_TEMPORALES";
    private $table_stock = "OFERTAS_STOCK";

	protected $id;
    protected $titulo;
    protected $imagen;
    protected $descripcion;
    protected $descripcion_corta;
    protected $precio;
    protected $moneda;
    protected $activa;

    protected $id_categoria;

    protected $fecha_inicio;
    protected $fecha_fin;

    protected $stock;

    protected $tipo;

    public function __construct($registry) {
        parent::__construct($registry);
        $this->table_name = "OFERTAS";
    }

    public function onConstruct(){ }


    public function getAll(){

    }

    public function crearOferta() {

        $tipoOferta = NULL;
        $this->fromArray($_POST);
        $data = $this->toArray();

        if($this->activa == 'on') {
            $data['activa'] = true;
        }
        else {
            $data['activa'] = false;
        }
        $data['fecha_inicio'] = GenericUtils::getInstance()->getFormatDateIn($data["fecha_inicio"]);
        $data['fecha_fin'] = GenericUtils::getInstance()->getFormatDateIn($data["fecha_fin"]);

        $this->tipo = $data['tipo'];
        $this->id_categoria = $data['id_categoria'];

        unset($data['tipo']);
        unset($data['id_categoria']);

        switch ($this->tipo) {
            case 'normal':
                $this->insertarOfertaNormal($this->id_categoria, $data);
                break;
            case 'temporal':
                break;
            case 'stock':
                break;
            default:
                break;
        }

    }

    private function insertarOfertaTemporal($id_categoria, $data) {

        $fecha_inicio = $this->fecha_inicio;
        $fecha_fin = $this->fecha_fin;

        unset($data['fecha_inicio']);
        unset($data['fecha_fin']);
        unset($data['stock']);

        $id = $this->registry->db->insert($this->table_name, $data);

    }

    private function insertarOfertaNormal($id_categoria, $data) {

        unset($data['fecha_inicio']);
        unset($data['fecha_fin']);
        unset($data['stock']);

        $id = $this->registry->db->insert($this->table_name, $data);
        $this->insertCategoriasOfertas($id_categoria, $id);
        
    }
    private function insertarOfertaStock($id_categoria, $data) {

    }

    private function insertCategoriasOfertas($id_categoria, $id_oferta) {
        $this->registry->db->insert('CATEGORIAS_OFERTAS', array('id_categoria' => $id_categoria, 'id_oferta' => $id_oferta));
    }
}
?>
