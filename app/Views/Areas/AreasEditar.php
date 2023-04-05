<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Areas
			<small><i class="fa fa-tags"></i></small>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Editar Area</h3>
					</div>
					<div class="box-body">
						<div class="row" style="margin-top: 15px;">
							<div class="col-xs-12">
								<?php
								$base = base_url();
								echo form_open('/AreasController/modificar'); //equivale al <form></form> en html
								echo "<br>";

								$codigo = 0;
								foreach ($areas as $value) {
									$codigo = $value['AREID'];
									$areaNombre = $value['ARENOMBRE'];
								}

								echo form_input(['name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo]);
								echo "<br>";

								echo form_label('Área:', 'area'); //equivale al <label></label> en html
								echo "<br>";


								echo form_input(['name' => 'txtArea', 'placeholder' => 'Ingrese el Área', 'class' => 'form-control', 'value' => $areaNombre]);
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
