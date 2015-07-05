<?php
class OfferModel extends AbstractModel{

    /* Para los errores
    error_reporting(-1);
    ini_set('display_errors', 'On');
    */
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

        $sql = "SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
                ."o.moneda as moneda, o.activa as activa, null as fecha_inicio, null as fecha_fin, null as stock, 'normal' as tipo "
            ."FROM PHP_LAB.OFERTAS o "
            ."WHERE NOT EXISTS(SELECT 1 FROM PHP_LAB.OFERTAS_STOCK s, PHP_LAB.OFERTAS_TEMPORALES t "
                                ."WHERE s.id = o.id OR t.id = o.id) "
            ."UNION "

            ."SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
            ."    o.moneda as moneda, o.activa as activa, t.fecha_inicio as fecha_inicio, t.fecha_fin as fecha_fin, null as stock, 'temporal' as tipo "
            ."FROM PHP_LAB.OFERTAS o "
            ."INNER JOIN PHP_LAB.OFERTAS_TEMPORALES t ON t.id = o.id "

            ."UNION "

            ."SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
            ."    o.moneda as moneda, o.activa as activa, null as fecha_inicio, null as fecha_fin, s.stock as stock, 'stock' as  tipo "
            ."FROM PHP_LAB.OFERTAS o "
            ."INNER JOIN PHP_LAB.OFERTAS_STOCK s ON s.id = o.id ";

        $ofertas = $this->registry->db->rawQuery($sql);

        $errors = $this->registry->db->getLastError();

        if(!empty(trim($errors))) {
            return $errors;
        }
        return $ofertas;
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
        //Obtengo la imagen y la pasamos a b64
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
        $imagen = base64_encode($imagen);

        $this->tipo = $data['tipo'];
        $this->id_categoria = $data['id_categoria'];
        $data['imagen'] = $imagen;


        unset($data['tipo']);
        unset($data['id_categoria']);

        switch ($this->tipo) {
            case 'normal':
                $this->insertarOfertaNormal($this->id_categoria, $data);
                break;
            case 'temporal':
                $this->insertarOfertaTemporal($this->id_categoria, $data);
                break;
            case 'stock':
                $this->insertarOfertaStock($this->id_categoria, $data);
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
        $this->insertCategoriasOfertas($id_categoria, $id);
        $insertTemporal = array('fecha_inicio' => $this->fecha_inicio, 'fecha_fin' => $this->fecha_fin, 'id' => $id);
        $id = $this->registry->db->insert($this->table_temporales, $insertTemporal);

    }

    private function insertarOfertaNormal($id_categoria, $data) {

        unset($data['fecha_inicio']);
        unset($data['fecha_fin']);
        unset($data['stock']);

        $id = $this->registry->db->insert($this->table_name, $data);
        $this->insertCategoriasOfertas($id_categoria, $id);

    }
    private function insertarOfertaStock($id_categoria, $data) {

        $this->stock = $data['stock'];

        unset($data['fecha_inicio']);
        unset($data['fecha_fin']);
        unset($data['stock']);

        $id = $this->registry->db->insert($this->table_name, $data);
        $this->insertCategoriasOfertas($id_categoria, $id);
        $insertStock = array('id' => $id, 'stock' => $this->stock);
        $this->registry->db->insert($this->table_stock, $insertStock);
    }

    private function insertCategoriasOfertas($id_categoria, $id_oferta) {
        $this->registry->db->insert('CATEGORIAS_OFERTAS', array('id_categoria' => $id_categoria, 'id_oferta' => $id_oferta));
    }
}
?>
