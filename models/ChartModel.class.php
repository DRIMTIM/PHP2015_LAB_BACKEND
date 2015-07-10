<?php
class ChartModel extends AbstractModel{
    
	protected $pieData;
	
	public function onConstruct(){
    	$this->pieData = NULL;
    }

	public function obtenerDataPieChart(){
        $sql = "SELECT o.id , o.descripcion_corta label, COUNT(*) value,  " . 
        		"'color' color,  'highlight' highlight " .
				"FROM OFERTAS o, COMPRAS c " .
				"WHERE o.id = c.id_oferta " .
				"GROUP BY o.id " .
				"LIMIT 10";	
        return $result = $this->registry->db->rawQuery($sql);
	}


	
}
?>