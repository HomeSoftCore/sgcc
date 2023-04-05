
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Estudiantes
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
		            <div class="box-header with-border">
		              <h3 class="box-title">Borrar Estudiante</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
                <?php
                $base = base_url();
                echo form_open('EstudianteController/eliminar'); //equivale al <form></form> en html
                echo "<br>";

                
                foreach ($estudiantes as $value) {
                    $codigo = $value['ESTID'];
                    $ESTCEDULA = $value['ESTCEDULA'];
                    $ESTNOMBRE = $value['ESTNOMBRE'];
                    $ESTDIRECCION = $value['ESTDIRECCION'];
                    $ESTTELEFONO = $value['ESTTELEFONO'];
                    $ESTCORREO = $value['ESTCORREO'];
                    $ESTESTADO = $value['ESTESTADO'];


                }

                echo form_input(array('name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo));
                echo "<br>";

                echo form_label('Cedula:', 'Cedula'); 
                echo "<br>";
                echo form_input(array('name' => 'txtCedula', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $ESTCEDULA));
                echo "<br>";
                echo form_label('Nombre:', 'Nombre'); 
                echo "<br>";
                echo form_input(array('name' => 'txtNombre', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $ESTNOMBRE));
                echo "<br>";
                echo form_label('Dreccion:', 'Dreccion'); 
                echo "<br>";
                echo form_input(array('name' => 'txtDreccion', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $ESTDIRECCION));
                echo "<br>";
                echo form_label('Telefono:', 'Telefono'); 
                echo "<br>";
                echo form_input(array('name' => 'txtTelefono', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $ESTTELEFONO));
                echo "<br>";
                echo form_label('Correo:', 'Correo'); 
                echo "<br>";
                echo form_input(array('name' => 'txtCorreo', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $ESTCORREO));
                echo "<br>";
                echo form_label('Estado:', 'Estado'); 
                echo "<br>";
                echo form_input(array('name' => 'txtEstado', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $ESTESTADO));
                echo "<br>";
                

                echo form_button(array('name' => 'btnBorrar', 'type' => 'submit', 'class' => 'btn btn-danger', 'content' => 'ELIMINAR'));
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