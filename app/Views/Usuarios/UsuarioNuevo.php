
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuario
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">CREAR NUEVO USUARIO</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
                <?php
                $base=base_url();
                echo form_open('UsuariosController/guardar'); //equivale al <form></form> en html
                
                echo form_label('Nombre:', 'Nombre'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtNombre', 'placeholder' => 'Ingrese el Nombre', 'class'=>'form-control'));
                echo "<br>";

                echo form_label('Cedula:', 'Fecha_Inicio'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtCedula', 'placeholder' => 'Ingrese la Cedula', 'class'=>'form-control'));
                echo "<br>";

                echo form_label('Clave:', 'Clave'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('type' => 'paswword','name' => 'txtClave', 'placeholder' => 'Ingrese la Clave', 'class'=>'form-control'));
                echo "<br>";

                echo form_label('Correo:', 'Correo'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtCorreo', 'placeholder' => 'Ingrese el Correo', 'class'=>'form-control'));
                echo "<br>";
                echo form_label('Estado:', 'Estado'); //equivale al <label></label> en html
                echo "<br>";
                echo form_input(array('name' => 'txtEstado', 'placeholder' => 'Ingrese el Estado', 'class'=>'form-control'));
                echo "<br>";
              
                 echo form_label('Perfil:', 'cmbPerfiles');
                echo "<select class='form-control' name='cmbPerfiles' id='cmbPerfiles'>";
                foreach ($perfiles as $perfil){
                  echo "<option value='".$perfil->PERID."'>".$perfil->PERNOMBRE."</option>";
             }
             echo "</select>";
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