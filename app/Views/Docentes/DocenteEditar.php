
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
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Editar Docentes</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
            <?php
            $base=base_url();
                echo form_open('/DocentesController/modificar'); //equivale al <form></form> en html
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

                echo form_input(array('name' => 'txtCodigo',  'readOnly' => 'true', 'class' => 'form-control', 'value' => $codigo));
                echo "<br>";

                echo form_label('Cedula:', 'Cedula'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtCedula', 'placeholder' => 'Ingrese la Cedula', 'class' => 'form-control', 'value' => $DOCCEDULA));
                echo "<br>";
                echo form_label('Nombre:', 'Nombre'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtNombre',  'placeholder' => 'Ingrese el Nombre', 'class' => 'form-control', 'value' => $DOCNOMBRE));
                echo "<br>";
                echo form_label('Titulo:', 'Titulo'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtTitulo',  'placeholder' => 'Ingrese el Titulo', 'class' => 'form-control', 'value' => $DOCTITULO));
                echo "<br>";
                echo form_label('Telefono:', 'Telefono'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtTelefono',  'placeholder' => 'Ingrese el Telefono', 'class' => 'form-control', 'value' => $DOCTELEFONO));
                echo "<br>";
                echo form_label('Correo:', 'Correo'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtCorreo',  'placeholder' => 'Ingrese el Correo', 'class' => 'form-control', 'value' => $DOCCORREO));
                echo "<br>";
                echo form_label('Estado:', 'Estado'); //equivale al <label></label> en html
                echo "<br>";
                $options = [
                    'ACTIVO'  => 'ACTIVO',
                    'INACTIVO'    => 'INACTIVO'
                  ];
                $class = ['class'=>'form-control'];
                echo form_dropdown('txtEstado', $options, $DOCESTADO, $class);
                echo "<br>";
                
                echo form_button (array('name'=>'btnGuardar', 'type'=>'submit', 'class'=>'btn btn-success', 'content'=>'MODIFICAR'));
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