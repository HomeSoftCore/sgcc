
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Opciones
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Editar Opcion</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
            <?php
            $base=base_url();
                echo form_open('/OpcionesController/modificar'); //equivale al <form></form> en html
                echo "<br>";
                
                $codigo=0;
                foreach($opciones as $value){
                    $codigo=$value['OPCID'];
                    $OPCNOMBRE=$value['OPCNOMBRE'];
                    $OPCRUTA=$value['OPCRUTA'];
                    $OPCESTADO=$value['OPCESTADO'];
                }

                echo form_input(array('name' => 'txtCodigo', 'readOnly'=>'true','class'=>'form-control','value'=>$codigo));
                echo "<br>";

                echo form_label('Nombre:', 'Nombre'); //equivale al <label></label> en html
                echo "<br>";
                 echo form_input(array('name' => 'txtNombre', 'placeholder' => 'Ingrese el nombre', 'class'=>'form-control','value'=>$OPCNOMBRE));
                echo "<br>";
                echo form_label('Ruta:', 'Ruta'); //equivale al <label></label> en html
                echo "<br>";
                 echo form_input(array('name' => 'txtRuta', 'placeholder' => 'Ingrese la Ruta', 'class'=>'form-control','value'=>$OPCRUTA));
                echo "<br>";
                echo form_label('Estado:', 'Estado'); //equivale al <label></label> en html
                echo "<br>";
                $options = [
                    'ACTIVO'  => 'ACTIVO',
                    'INACTIVO'    => 'INACTIVO'
                  ];
                  $class = ['class'=>'form-control'];
                  echo form_dropdown('txtEstado', $options, $OPCESTADO ,$class);
                echo "<br>";

                echo form_button (array('name'=>'btnGuardar', 'type'=>'submit', 'class'=>'btn btn-success', 'content'=>'Guardar'));
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