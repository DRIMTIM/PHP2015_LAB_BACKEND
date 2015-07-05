		
<div class="col-lg-12">
	<div class="panel panel-info">
		<div class="panel-heading dark-overlay">
			<span class="glyphicon glyphicon-shopping-cart"></span>Catalogo de Ofertas</div>
		<div class="panel-body">
			<table data-toggle="table" data-show-refresh="true" 
			data-show-toggle="true" data-show-columns="true" data-search="true" 
			data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" 
			data-sort-order="desc">
			<thead>
				<tr>
					<th id="idOffer" data-field="state" data-checkbox="true" >Activa</th>
					<th ></th>
					<th data-field="id" data-sortable="true"><b>ID</b></th>
					<th data-field="name"  data-sortable="true"><b>Titulo</b></th>
					<th data-field="desc" data-sortable="true"><b>Descripcion</b></th>
					<th data-field="moneda" data-sortable="true"> <b>$ / US$</b></th>
					<th data-field="price" data-sortable="true"><b>Precio</b></th>
					<th ></th>
				</tr>
			</thead>
			<tbody>

				<?php 
				if(!empty($ofertas)){	
					foreach ($ofertas as $oferta){ 
						?>
					<tr>
						<td >Check</td>
						<td>
							<a style="cursor: pointer" >
								<span class="glyphicon glyphicon-edit"></span>
							</a>						
						</td>					
						<td><?php echo $oferta["id"];?></td>
						<td><?php echo $oferta["titulo"];?></td>
						<td><?php echo $oferta["descripcion"];?></td>
						<td><?php echo $oferta["moneda"];?></td>
						<td><?php echo $oferta["precio"];?></td>
						<td>
							<a style="cursor: pointer">
							<span class="glyphicon glyphicon-trash"></span> 
							</a>						
						</td>
					</tr>																																																																																				
				<?php
					}
				}else{ ?>

					<h3>No hay Ofertas cargadas en el sistema</h3>

					<?php
				}?>

			</tbody>

		</table>
	</div>
</div>
</div>