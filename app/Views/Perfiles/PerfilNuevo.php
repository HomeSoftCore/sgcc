
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Perfiles
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">CREAR NUEVO PERFIL</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
            <?php
            echo form_open('/PerfilesController/guardar');
            //<label></label>
            echo form_label('Nombre_Perfil:', 'Nombre');
            echo "<br>";
            echo form_input(array('name' => 'txtNombre', 'placeholder' => 'Ingrese el Nombre', 'class'=>'form-control'));
            echo "<br>";
            echo form_label('Estado:', 'Estado');
            echo "<br>";
            $options = [
              'ACTIVO'  => 'ACTIVO',
              'INACTIVO'    => 'INACTIVO'
            ];
            $class = ['class'=>'form-control'];
            echo form_dropdown('txtEstado', $options,'' ,$class);
            echo "<br>";
            echo form_button(array('name'=>'btnGuardar','type'=>'submit','class'=>'btn btn-success','content'=>'Guardar'));
            
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