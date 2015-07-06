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
    
    public function obtener($idCat){
        
        $oferta = $this->registry->db->where("id", $idCat)->get($this->table_name);
        return $oferta[0];
    }    

    public function getAll(){

        $sql = "SELECT t.id, t.titulo as titulo, t.imagen as imagen, t.descripcion as descripcion, t.descripcion_corta as descripcion_corta, t.precio as precio, "
                                ."t.moneda as moneda, t.activa as activa, t.fecha_inicio, t.fecha_fin, t.stock, t.tipo, co.id_categoria, c.nombre "
                ."FROM "
                ."( "
                        ."SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
                                ."o.moneda as moneda, o.activa as activa, null as fecha_inicio, null as fecha_fin, null as stock, 'normal' as tipo "
                        ."FROM PHP_LAB.OFERTAS o "

                        ."WHERE NOT EXISTS(SELECT 1 FROM PHP_LAB.OFERTAS_STOCK s "
                                        ."WHERE s.id = o.id "
                                        ."UNION "
                                        ."SELECT 1 FROM PHP_LAB.OFERTAS_TEMPORALES t "
                                        ."WHERE t.id = o.id "
                                        .") "
                        ."UNION "

                        ."SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
                                ."o.moneda as moneda, o.activa as activa, t.fecha_inicio as fecha_inicio, t.fecha_fin as fecha_fin, null as stock, 'temporal' as tipo  "
                        ."FROM PHP_LAB.OFERTAS o "
                        ."INNER JOIN PHP_LAB.OFERTAS_TEMPORALES t ON t.id = o.id "

                        ."UNION "

                        ."SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
                                ."o.moneda as moneda, o.activa as activa, null as fecha_inicio, null as fecha_fin, s.stock as stock, 'stock' as  tipo "
                        ."FROM PHP_LAB.OFERTAS o "
                        ."INNER JOIN PHP_LAB.OFERTAS_STOCK s ON s.id = o.id "
                .") t INNER JOIN PHP_LAB.CATEGORIAS_OFERTAS co ON t.id = co.id_oferta INNER JOIN PHP_LAB.CATEGORIAS c ON c.id = co.id_categoria ";

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

        if($data['activa'] == 'on') {
            $data['activa'] = true;
        }
        else {
            $data['activa'] = false;
        }
        $data['fecha_inicio'] = GenericUtils::getInstance()->getFormatDateIn($data["fecha_inicio"]);
        $data['fecha_fin'] = GenericUtils::getInstance()->getFormatDateIn($data["fecha_fin"]);

        $path = $_FILES['imagen']['name'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        //Obtengo la imagen y la pasamos a b64
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
        $imagen = 'data:image/' . $type . ';base64,' . base64_encode($imagen);

        $data['imagen'] = $imagen;

        $this->tipo = $data['tipo'];
        $this->id_categoria = $data['id_categoria'];

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

    public function getOferta($id, $tipo) {
        $sql = NULL;
        switch ($tipo) {
            case 'normal':
                $sql = "SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
                                ."o.moneda as moneda, o.activa as activa, co.id_categoria, c.nombre "
                        ."FROM PHP_LAB.OFERTAS o INNER JOIN PHP_LAB.CATEGORIAS_OFERTAS co ON o.id = co.id_oferta INNER JOIN PHP_LAB.CATEGORIAS c ON c.id = co.id_categoria "
                        ."WHERE NOT EXISTS(SELECT 1 FROM PHP_LAB.OFERTAS_STOCK s "
                                        ."WHERE s.id = o.id AND o.id = ?"
                                        ."UNION "
                                        ."SELECT 1 FROM PHP_LAB.OFERTAS_TEMPORALES t "
                                        ."WHERE t.id = o.id AND o.id = ?"
                                        .") ";
                break;
            case 'temporal':
                $sql = "SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
                                ."o.moneda as moneda, o.activa as activa, co.id_categoria, c.nombre, ot.fecha_fin, ot.fecha_inicio "
                        ."FROM PHP_LAB.OFERTAS o INNER JOIN PHP_LAB.CATEGORIAS_OFERTAS co ON o.id = co.id_oferta "
                                               ."INNER JOIN PHP_LAB.CATEGORIAS c ON c.id = co.id_categoria "
                                               ."INNER JOIN PHP_LAB.OFERTAS_TEMPORALES ot ON o.id = ot.id "
                        ."WHERE o.id = ? ";
                break;
            case 'stock':
                $sql = "SELECT o.id, o.titulo as titulo, o.imagen as imagen, o.descripcion as descripcion, o.descripcion_corta as descripcion_corta, o.precio as precio, "
                                ."o.moneda as moneda, o.activa as activa, co.id_categoria, c.nombre, ot.stock "
                        ."FROM PHP_LAB.OFERTAS o INNER JOIN PHP_LAB.CATEGORIAS_OFERTAS co ON o.id = co.id_oferta "
                                               ."INNER JOIN PHP_LAB.CATEGORIAS c ON c.id = co.id_categoria "
                                               ."INNER JOIN PHP_LAB.OFERTAS_STOCK ot ON o.id = ot.id "
                        ."WHERE o.id = ?";
                break;
            default:
                break;
        }

        $ofertas = $this->registry->db->rawQuery($sql, array($id));

        $errors = $this->registry->db->getLastError();

        if(!empty(trim($errors))) {
            return $errors;
        }
        return $ofertas;
    }

    public function update($oferta) {

        $this->fromArray($_POST);
        $data = $this->toArray();
        $tipo = $data['tipo'];
        $id_categoria = $data['id_categoria'];
        $id = $data['id'];

        $fecha_fin = $data['fecha_fin'];
        $fecha_inicio = $data['fecha_fin'];
        $stock = $data['stock'];
        $activa = $data['activa'];

        $path = $_FILES['imagen']['name'];
        $type = pathinfo($path, PATHINFO_EXTENSION);

        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
        $imagen = 'data:image/' . $type . ';base64,' . base64_encode($imagen);

        $data['imagen'] = $imagen;

        if(activa == 'on') {
            $data['activa'] = true;
        }
        else {
            $data['activa'] = false;
        }

        unset($data['stock']);
        unset($data['fecha_inicio']);
        unset($data['fecha_fin']);
        unset($data['id']);
        unset($data['tipo']);
        unset($data['id_categoria']);

        $oferta_vieja = $this->registry->db->where ("id_oferta", $id)->getOne('CATEGORIAS_OFERTAS');
        $id_categoria_vieja = $ofertaVieja['id_categoria'];
        //Si cambio la categoria entonces actualizamos la tabla relacion
        if($id_categoria_vieja != $id_categoria) {
            $this->updateIdCategoriaOferta($id_oferta, $id_categoria);
        }
        //Actualizamos la oferta
        $this->registry->db->where('id', $id)->update($this->table_name, $data);
        //Dependiendo del tipo de oferta updateamos
        if($tipo == 'stock' && !empty($stock)) {
            updateOfertaStock($id, array('stock'=>$stock));
        }
        else if($tipo == 'temporal' && !empty($fecha_fin) && !empty($fecha_inicio)) {
            updateOfertaTemporal($id, array('fecha_fin' => $fecha_fin, 'fecha_inicio' => $fecha_inicio));
        }
    }

    private function updateOfertaTemporal($id, $data) {
        $this->registry->db->where('id', $id)->update($this->table_temporales, $data);
    }

    private function updateOfertaStock($id,$data) {
        $this->registry->db->where('id', $id)->update($this->table_stock, $data);
    }

    private function updateIdCategoriaOferta($id_oferta,$id_cat_nuevo) {
        $this->registry->db->where('id_oferta', $id_oferta)->update('CATEGORIAS_OFERTAS', array('id_categoria' => $id_cat_nuevo));
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
    
    public function borrar($idOffer){
        return $this->registry->db->where("id", $idOffer)->delete($this->table_name, 1);
    }

}
?>
