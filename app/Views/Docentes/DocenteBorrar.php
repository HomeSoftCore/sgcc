
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Docentes
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
		            <div class="box-header with-border">
		              <h3 class="box-title">Borrar Docentes</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
                <?php
                $base = base_url();
                echo form_open('DocentesController/eliminar'); //equivale al <form></form> en html
                echo "<br>";

               
                foreach ($docentes as $value) {
                    $codigo = $value['DOCID'];
                    $DOCCEDULA = $value['DOCCEDULA'];
                    $DOCNOMBRE = $value['DOCNOMBRE'];
                    $DOCTITULO = $value['DOCTITULO'];
                    $DOCTELEFONO = $value['DOCTELEFONO'];
                    $DOCCORREO = $value['DOCCORREO'];
                    $DOCESTADO = $value['DOCESTADO'];


                }

                echo form_input(array('name' => 'txtCodigo', 'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo));
                echo "<br>";

                echo form_label('Cedula:', 'Cedula'); 
                echo "<br>";
                echo form_input(array('name' => 'txtCedula', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $DOCCEDULA));
                echo "<br>";
                echo form_label('Nombre:', 'Nombre'); 
                echo "<br>";
                echo form_input(array('name' => 'txtNombre', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $DOCNOMBRE));
                echo "<br>";
                echo form_label('Titulo:', 'Titulo'); 
                echo "<br>";
                echo form_input(array('name' => 'txtTitulo', 'readOnly' => 'true', 'placeholder' => 'Ingrese el titulo', 'class' => 'form-control', 'value' => $DOCTITULO));
                echo "<br>";
                echo form_label('Telefono:', 'Telefono'); 
                echo "<br>";
                echo form_input(array('name' => 'txtTelefono', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $DOCTELEFONO));
                echo "<br>";
                echo form_label('Correo:', 'Correo'); 
                echo "<br>";
                echo form_input(array('name' => 'txtCorreo', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $DOCCORREO));
                echo "<br>";
                echo form_label('Estado:', 'Estado'); 
                echo "<br>";
                echo form_input(array('name' => 'txtEstado', 'readOnly' => 'true', 'placeholder' => 'Ingrese la cedula', 'class' => 'form-control', 'value' => $DOCESTADO));
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