<div class="content-wrapper">
	<?php
	$codigo = $perfiles['PERID'];
	$PERNOMBRE = $perfiles['PERNOMBRE'];
	$PERESTADO = $perfiles['PERESTADO'];
	?>
	<section class="content-header">
		<h1>
			Perfiles - <?php echo $perfiles['PERNOMBRE']; ?>
			<small><i class="fa fa-tags"></i></small>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Editar Perfil</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<?php
								$base = base_url();
								echo form_open('/PerfilesController/modificar'); //equivale al <form></form> en html
								echo "<br>";
								echo form_input(['name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo]);
								echo "<br>";

								echo form_label('Nombre:', 'Nombre');//equivale al <label></label> en html
								echo "<br>";
								echo form_input(['name' => 'txtNombre', 'placeholder' => 'Ingrese el Nombre', 'class' => 'form-control', 'value' => $PERNOMBRE]);
								?>
								<br>
								<div class="custom-control custom-checkbox">
									<?php echo form_checkbox(['name' => 'txtEstado', 'id' => 'estado', 'value' => '1', 'checked' => $PERESTADO == 'ACTIVO', 'class' => 'custom-control-input']); ?>
									<?php echo form_label('Activo', 'estado', ['class' => 'custom-control-label']); ?>
								</div>
								<br>
								<?php
								echo form_button(['name' => 'btnGuardar', 'type' => 'submit', 'class' => 'btn btn-success', 'content' => 'Guardar']);
								echo form_button(['name' => 'btnCancelar', 'type' => 'button', 'class' => 'btn btn-danger', 'content' => 'Cancelar', 'onclick' => 'location.href=\'' . $base . '/PerfilesController/index\'']);
								echo form_close();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
