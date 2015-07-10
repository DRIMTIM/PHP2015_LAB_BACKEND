		
<div class="col-lg-12">
	<div class="panel panel-info">
		<div class="panel-heading dark-overlay">
			<span class="glyphicon glyphicon-shopping-cart"></span>Catalogo de Ofertas</div>
		<div class="panel-body">
			<table id="offerTable" data-toggle="table" data-show-refresh="true" 
			data-show-toggle="true" data-show-columns="true" data-search="true" 
			data-select-item-name="toolbar1" data-pagination="true" 
			data-sort-order="desc">
			<thead>
				<tr>
					<th data-field="state"><b>Activa</b></th>
					<th ></th>
					<th data-field="id" data-sortable="true"><b>ID</b></th>
					<th data-field="name"  data-sortable="true"><b>Titulo</b></th>
					<th data-field="desc" data-sortable="true"><b>Descripcion</b></th>
					<th data-field="moneda" data-sortable="true"> <b>$ / $US</b></th>
					<th data-field="price" data-sortable="true"><b>Precio</b></th>
					<th ></th>
				</tr>
			</thead>
			<tbody>

				<?php 
				if(!empty($ofertas)){	
					foreach ($ofertas as $oferta){ 

						if($oferta['activa'] == 1){
							$checked = " checked ";
							$class = 'default';
						}else{
							$checked = "";
							$class = 'danger';
						}
						?>
					<tr class=<?php echo "'" . $class . "'";?>>
						<td >    
      						<input type='checkbox' <?php echo $checked;?>
      								onclick="activarDesactivarOfferById
      								(<?php echo $oferta["id"];?>)" />
    					</td>
						<td>
							<a href="<?php echo __ROOT .  '/offer/getOferta?id=' 
										. $oferta['id']?>" style="cursor: pointer" >
								<span class="glyphicon glyphicon-edit"></span>
							</a>						
						</td>					
						<td><?php echo $oferta["id"];?></td>
						<td><?php echo $oferta["titulo"];?></td>
						<td><?php echo $oferta["descripcion"];?></td>
						<td><?php echo $oferta["moneda"];?></td>
						<td><?php echo $oferta["precio"];?></td>
						<td>
							<a style="cursor: pointer" onclick="deleteOfferById
												(<?php echo $oferta["id"];?>)">
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