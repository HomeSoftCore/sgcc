
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Calificaciones
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Editar Calificacion</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
            <?php
            $base=base_url();
                echo form_open('/CalificacionesController/modificar'); //equivale al <form></form> en html
                echo "<br>";
                
                $codigo=0;
                foreach($calificaciones as $value){
                    $codigo=$value['CALID'];
                    $CALDESCRIPCION=$value['CALDESCRIPCION'];
                    $CALPUNTAJE=$value['CALPUNTAJE'];
                    $CALPUNAPROBACION=$value['CALPUNAPROBACION'];
                    $CALESTADO=$value['CALESTADO'];
                }

                echo form_input(array('name' => 'txtCodigo', 'readOnly'=>'true','class'=>'form-control','value'=>$codigo));
                echo "<br>";

                echo form_label('Descripcion:', 'Descripcion');
                echo "<br>";
                echo form_input(array('name' => 'txtDescripcion', 'placeholder' => 'Ingrese la Descripcion', 'class'=>'form-control','value'=>$CALDESCRIPCION));
                echo "<br>";
                echo form_label('Puntaje:', 'Puntaje');
                 echo "<br>";
                echo form_input(array('name' => 'txtPuntaje', 'placeholder' => 'Ingrese el Puntaje', 'class'=>'form-control','value'=>$CALPUNTAJE));
                echo "<br>";
                echo form_label('Aprobado:', 'Aprobado');
                echo "<br>";
                echo form_input(array('name' => 'txtAprobado', 'placeholder' => 'Ingrese lo Aprobado', 'class'=>'form-control','value'=>$CALPUNAPROBACION));
                echo "<br>";
                echo form_label('Estado:', 'Estado');
                 echo "<br>";
                 $options = [
                    'ACTIVO'  => 'ACTIVO',
                    'INACTIVO'    => 'INACTIVO'
                  ];
                  $class = ['class'=>'form-control'];
                  echo form_dropdown('txtEstado', $options,$CALESTADO ,$class);
                
                echo "<br>";

                echo form_button (array('name'=>'btnGuardar', 'type'=>'submit', 'class'=>'btn btn-success', 'content'=>'Modificar'));
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