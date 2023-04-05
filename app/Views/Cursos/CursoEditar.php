
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cursos
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Editar Curso</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
                <?php
                $base = base_url();
                echo form_open('CursosController/modificar'); //equivale al <form></form> en html
                echo "<br>";

               
                foreach ($cursos as $value) {
                    $codigo = $value['CURID'];
                    $codigoA = $value['AREID'];
                    $CURNOMBRE = $value['CURNOMBRE'];
                    $CURFECINICIO = $value['CURFECINICIO'];
                    $CURFECFINAL = $value['CURFECFINAL'];
                    $CURPRECIO = $value['CURPRECIO'];
                    $CURNUMESTUDIANTES = $value['CURNUMESTUDIANTES'];
                    $CURMODALIDAD = $value['CURMODALIDAD'];
                    $CURESTADO = $value['CURESTADO'];
                }

                echo form_input(array('name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo));
                echo "<br>";

                echo form_label('Nombre:', 'Nombre'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtNombre', 'placeholder' => 'Ingrese el Nombre', 'class' => 'form-control', 'value' => $CURNOMBRE));
                echo "<br>";

                echo form_label('Fecha_Inicio:', 'Fecha_Inicio'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('type'=>'date','name' => 'txtFecha_Inicio', 'placeholder' => 'Ingrese la Fecha_Inicio', 'class' => 'form-control', 'value' => $CURFECINICIO));
                echo "<br>";

                echo form_label('Fecha_Final:', 'Fecha_Final'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('type'=>'date','name' => 'txtFecha_Final', 'placeholder' => 'Ingrese la Fecha_Final', 'class' => 'form-control', 'value' => $CURFECFINAL));
                echo "<br>";

                echo form_label('Precio:', 'Precio'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtPrecio', 'placeholder' => '$', 'class' => 'form-control', 'value'=> $CURPRECIO));
                echo "<br>";
                echo form_label('Nº_Estudiantes:', 'Nº_Estudiantes'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtNº_Estudiantes', 'placeholder' => 'Ingrese el nº Estudiantes', 'class'=>'form-control', 'value' => $CURNUMESTUDIANTES));
                echo "<br>";
               echo form_label('Modalidad:', 'Modalidad'); //equivale al <label></label> en html
               echo "<br>";
               $optionsModalidad = [
                'PRESENCIAL'  => 'PRESENCIAL',
                'VIRTUAL'    => 'VIRTUAL',
                'NOCTURNA'    => 'NOCTURNA',
                'SEMIPRESENCIAL'  => 'SEMIPRESENCIAL',
              ];
              $class = ['class'=>'form-control'];
              echo form_dropdown('txtModalidad', $optionsModalidad, $CURMODALIDAD, $class);
               echo "<br>";
                 echo form_label('Estado:', 'Estado'); //equivale al <label></label> en html
                echo "<br>";
                $options = [
                  'ACTIVO'  => 'ACTIVO',
                  'INACTIVO'    => 'INACTIVO'
                ];
                echo form_dropdown('txtEstado', $options, $CURESTADO, $class);
               echo "<br>";

               echo form_label('Areas:', 'cmbAreas');
                echo "<select class='form-control' name='cmbAreas' id='cmbCiudad'>";
                foreach($areas as $area){
                  if($area->AREID==$codigoA){
                   echo "<option value='" . $area->AREID . "'selected>" . $area->ARENOMBRE . "</option>";
               }else{
                      echo "<option value='" . $area->AREID . "'>" . $area->ARENOMBRE . "</option>";
                  }
                  
               } 
                echo "</select>";
                echo "<br>";

                echo form_button(array('name' => 'btnModificar', 'type' => 'submit', 'class' => 'btn btn-success', 'content' => 'Modificar'));
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