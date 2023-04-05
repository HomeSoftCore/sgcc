<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Items
			<small><i class="fa fa-tags"></i></small>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Editar Items</h3>
					</div>
					<div class="box-body">
						<div class="row" style="margin-top: 15px;">
							<div class="col-xs-12">
								<?php
								$base = base_url();
								echo form_open('/ItemsController/modificar'); //equivale al <form></form> en html
								echo "<br>";

								$codigo = 0;
								foreach ($items as $value) {
									$codigo = $value['ITEID'];
									$ITENOMBRE = $value['ITENOMBRE'];
                                    $ITEOBSERVACION = $value['ITEOBSERVACION'];
                                    $ITEESTADO = $value['ITEESTADO'];
								}

								echo form_input(['name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo]);
								echo "<br>";

								echo form_label('Nombre:', 'Nombre'); //equivale al <label></label> en html
								echo "<br>";
                                echo form_input(['name' => 'txtNombre', 'placeholder' => 'Ingrese el Nombre', 'class' => 'form-control', 'value' => $ITENOMBRE]);
								echo "<br>";
                                echo form_label('Observación:', 'Observación'); //equivale al <label></label> en html
								echo "<br>";
                                echo form_input(['name' => 'txtObservacion', 'placeholder' => 'Ingrese la Observación', 'class' => 'form-control', 'value' => $ITEOBSERVACION]);
								echo "<br>";
                                echo form_label('Estado:', 'Estado'); //equivale al <label></label> en html
								echo "<br>";
								$options = [
									'ACTIVO'  => 'ACTIVO',
									'INACTIVO'    => 'INACTIVO'
								  ];
								  $class = ['class'=>'form-control'];
								  echo form_dropdown('txtEstado', $options, $ITEESTADO, $class);
								echo "<br>";
								echo form_button(['name' => 'btnGuardar', 'type' => 'submit', 'class' => 'btn btn-success', 'content' => 'Guardar']);
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
