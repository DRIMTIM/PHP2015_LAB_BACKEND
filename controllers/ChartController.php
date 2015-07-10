<?php

Class ChartController Extends baseController {

	protected $chartModel;

	public function onConstruct(){

		$this->chartModel = new ChartModel($this->registry);

	}

	public function index() {		
		
		$this->getDataPieChart();
        $this->registry->template->show('charts/index');
	}

	public function getDataPieChart(){

		$datos = $this->chartModel->obtenerDataPieChart();

		$colors = array("#30a5ff", "#ffb53e", "#1ebfae", "#f9243f", "#669900", "#FF9999", 
						"#6699FF", "#52529B", "#CC3300", "#660066", "#006666", "#996633");
		$highlights = array("#62b9fb", "#fac878", "#3cdfce", "#f6495f", "#BEBEDE", "#C299AD"
							,"#B2D1B2", "#D6C2AD", "#66C266", "#D68533", "#FF8533", "#70704D");

		$i = 0;
		foreach ($datos as $key => $dato) {

			$dato['color'] = $colors[$i];
			$dato['highlight'] = $highlights[$i];
			$result[$i]['value'] = $dato['value'];
			$result[$i]['label'] = $dato['label'];
			$result[$i]['color'] = $dato['color'];
			$result[$i]['highlight'] = $dato['highlight'];
			$i++;
			
		}

		$this->registry->template->dataPieChart = json_encode($result);

	}


}

?>