<!-- 
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
		              <h3 class="box-title">Crear Area</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
                            <?php
                                echo form_open('/AreasController/guardar');
                                echo form_label('Áreas', 'areas');
                                echo "<br>";
                                echo form_input(array('name' => 'txtAreas', 'placeholder' => 'Ingrese el Área', 'class'=>'form-control'));
                                
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
</div> -->



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Crear Area</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController/nuevo'" class="btn btn-primary">Crear Area</button>
            </div>

            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>
