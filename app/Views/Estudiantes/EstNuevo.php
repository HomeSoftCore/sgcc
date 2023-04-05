
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
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Crear Estudiante</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
            <?php
            echo form_open('/EstudianteController/guardar');
            //<label></label>
           
               
            echo form_label('Cedula:', 'Cedula'); 
            echo "<br>";
            echo form_input(array('name' => 'txtCedula',  'placeholder' => 'Ingrese la cedula', 'class' => 'form-control'));
            echo "<br>";
            echo form_label('Nombre:', 'Nombre'); 
            echo "<br>";
            echo form_input(array('name' => 'txtNombre',  'placeholder' => 'Ingrese el Nombre', 'class' => 'form-control'));
            echo "<br>";
            echo form_label('Dreccion:', 'Dreccion'); 
            echo "<br>";
            echo form_input(array('name' => 'txtDreccion',  'placeholder' => 'Ingrese la Direccion', 'class' => 'form-control'));
            echo "<br>";
            echo form_label('Telefono:', 'Telefono'); 
            echo "<br>";
            echo form_input(array('name' => 'txtTelefono',  'placeholder' => 'Ingrese el Telefono', 'class' => 'form-control'));
            echo "<br>";
            echo form_label('Correo:', 'Correo'); 
            echo "<br>";
            echo form_input(array('name' => 'txtCorreo',  'placeholder' => 'Ingrese el Correo', 'class' => 'form-control'));
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
            echo "<br>";
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