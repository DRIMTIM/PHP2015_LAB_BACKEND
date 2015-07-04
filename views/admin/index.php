<!-- Formulario del Administrador -->

<div class="col-md-7">
	<div class="panel panel-info">
		<div class="panel-heading dark-overlay">
			<span class="glyphicon glyphicon-user"></span>
									<b>Datos del Administrador</b></div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo __ROOT . "/admin"?>" 
																			method="POST">
				<fieldset>

					<!-- id - readonly -->
					<div id="idAdmin" class="form-group">
						<label class="col-md-3 control-label" for="nombre">ID:</label>
						<div class="col-md-2">
							<input id="id" name="id" type="text" readonly="readonly" 
							value="<?php echo $admin["id"];?>" class="form-control">
						</div>
					</div>

					<!-- Nick -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="nombre">Nick:</label>
						<div class="col-md-6">
							<input id="nick" name="nick" type="text" placeholder="..." 
							value="<?php echo $admin["nick"];?>" class="form-control">
						</div>
					</div>

					<!-- Nombre -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="nombre">Nombre:</label>
						<div class="col-md-8">
							<input id="nombre" name="nombre" type="text" placeholder="..." 
							value="<?php echo $admin["nombre"];?>" class="form-control">
						</div>
					</div>

					<!-- Apellido -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="nombre">Apellido:</label>
						<div class="col-md-8">
							<input id="apellido" name="apellido" type="text" placeholder="..." 
							value="<?php echo $admin["apellido"];?>" class="form-control">
						</div>
					</div>

					<!-- Email -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="nombre">Email:</label>
						<div class="col-md-7">
							<input id="email" name="email" type="text" 
								placeholder="user@host.com" 
							value="<?php echo $admin["email"];?>" class="form-control">
						</div>
					</div>	

					<!-- Password -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="nombre">Password:</label>
						<div class="col-md-6">
							<input id="password" name="password" type="password"
								class="form-control">
						</div>
					</div>

					<!-- Confirm Password -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="nombre">Confirmar:</label>
						<div class="col-md-6">
							<input id="confirmPass" name="confirmPass" type="password" 
								class="form-control">
						</div>
					</div>													
					
					<!-- Form actions -->
					<div class="panel-footer divider">



						<button id="submitAdmin" type="submit" 
								class="btn btn-primary btn-md pull-right">
								<span class="glyphicon glyphicon-floppy-saved"></span>
								&nbsp;Guardar</button>			
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>