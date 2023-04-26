<!-- 
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Calificaciones & Items
            <small><i class="fa fa-check-square-o"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-10">
				<div class="box box-success">
		            <div class="box-header with-border">
                    <a href="<?php echo base_url();?>/CalificacionesController" class="btn btn-info pull-right"><i class="fa fa-caret-square-o-left"></i> Retornar</a>
		              <h3 class="box-title">Registrar Items</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-5">
                                <input type="hidden" value="<?=$calificacion['CALID']?>" id="txtCalificacion">
                            <?php
                                //echo form_open('test');
                                echo form_label('Calificación', 'calificacion');
                                echo "<br>";
                                echo form_input(array('name' => 'calificacion', 'placeholder' => '', 'class'=>'form-control', 'value'=> $calificacion['CALDESCRIPCION'], 'readonly'=>'true'));
                                echo "<br>";
                            ?>
		        			</div>
                            <div class="col-xs-5">
                                <label for="item">Item:</label>
                                <select name="item" id="item" class="form-control">
                                    <?php
                                        foreach ($items as $item) {
                                     ?>
                                    <option value="<?=$item['ITEID']?>"><?=$item['ITENOMBRE']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <?php
                                if (count($items) > 0) {
                                ?>
                                    <label for="btnAgregarItem">Agregar Item</label>
                                    <a class="btn  btn-warning" id="btnAgregarItem" onclick="insertarItem();">
                                        <i class="fa fa-plus"> Agregar Item</i> 
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <?php 
                            echo "<br>";
                            //echo form_close();
                            ?>
		        		</div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-10">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
							            <tr>
							                <th>#</th>
							                <th>Calificacion</th>
                                            <th>Item</th>
							                <th>Acciones</th>
							            </tr>
							            </thead>
                                        <?php
											$contador = 0;
                                            foreach ($calificacionesItems as $ci) {
												$contador = $contador+1;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?php echo $contador; ?></th>
                                                <td><?php echo $ci['CALDESCRIPCION']; ?></td>
                                                <td><?php echo $ci['ITENOMBRE']; ?></td>
                                                <td>             
                                                    <button class="btn btn-danger btn-xs" onclick="deleteItem(<?=$ci['CITID']?>);">
                                                        <i class="fa fa-trash"> Eliminar</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
							        </table>
						        </div>
                            </div>
                        </div>
		            </div>
	          	</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">

    function insertarItem()
    {
        //data
        var txtCalificacion = $("#txtCalificacion").val();
        if (txtCalificacion =="" || txtCalificacion== null ){
            swal("Error al seleccionar la calificacion !", "", "info");
            return false;
        }//end if

        var item = $("#item option:selected").val();
        if (item =="" || item== null || item=="Seleccione:"){
            swal("Seleccione un Item !", "", "info");
            return false;
        }//end if
        var baseurl = "<?php echo base_url(); ?>";

         $.ajax({
             method: "post",
             url: "<?= base_url('calificaciones/insertItem'); ?>",
             data: {
                txtCalificacion:$("#txtCalificacion").val(),
                item: $("#item option:selected").val()
             },
             dataType: "json",
             success: function(response) {
                //console.log(response);
                location.reload();
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
    }

    function deleteItem(item)
    {

        if (item =="" || item== null || item=="Seleccione:"){
            swal("Error al seleccionar item!", "", "info");
            return false;
        }//end if
        var baseurl = "<?php echo base_url(); ?>";

         $.ajax({
             method: "post",
             url: "<?= base_url('calificaciones/deleteItem'); ?>",
             data: {
                item: item
             },
             dataType: "json",
             success: function(response) {
                location.reload();
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
    }
</script> -->




<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Asignar Items a Calificaci&oacute;n</h3>
            <div class="card-header-right">
				<button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController'" class="btn btn-light">Cancelar</button>
            </div>

            </div>
            <div class="card-body">
				<form accept-charset="utf-8">
                    <input type="hidden" value="<?=$calificacion['CALID']?>" id="txtCalificacion">
					<div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="calificacion">Calificaci&oacute;n</label>
                                <input type="text" disabled class="form-control" name="calificacion" value="<?php echo $calificacion['CALDESCRIPCION'] ?>" placeholder="calificaci&oacute;n...">
                            </div>
						</div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="calificacionPuntaje">Calificaci&oacute;n Puntaje</label>
                                <input type="text" disabled class="form-control" name="calificacionPuntaje" value="<?php echo $calificacion['CALPUNTAJE'] ?>" placeholder="calificaci&oacute;n puntaje...">
                            </div>
						</div>       

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="calificacionAprobacion">Calificaci&oacute;n Aprobaci&oacute;n</label>
                                <input type="text" disabled class="form-control" name="calificacionAprobacion" value="<?php echo $calificacion['CALPUNAPROBACION'] ?>" placeholder="calificaci&oacute;n puntaje...">
                            </div>
						</div>                                           			

					</div>

                    <div class="row">
                        <div class="col-md-4">
							<div class="form-group">
								<label for="item">Seleccione Item</label>
								<?php 
								
								echo "<select class='form-control' name='item' id='item'>";
								echo "<option value=''>seleccione opci&oacute;n...</option>";
								foreach ($items as $item){
									echo "<option value='".$item['ITEID']."'>".$item['ITENOMBRE']."</option>";
								}
								echo "</select>";                                
								
								?>
							</div> 

						</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ponderacion">Ponderaci&oacute;n</label>
                                <input type="number" class="form-control" name="ponderacion" id="ponderacion" placeholder="digite ponderaci&oacute;n...">
                            </div>
						</div> 
                        
                        <div class="col-md-2">
                              <div class="form-group">
                                  <label for="tipo">Seleccione Tipo</label>
                                  <?php 
                                  
                                  $options = [
                                    'VALOR'  => 'VALOR',
                                    'PORCENTAJE'    => 'PORCENTAJE'
                                  ];

                                  echo "<select class='form-control' name='tipo' id='tipo'>";
                                  echo "<option value=''>seleccione tipo...</option>";
                                  foreach ($options as $item){
                                    echo "<option value='".$item."'>".$item."</option>";
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                        </div>                        


						<div class="col-md-4">
							<button type="button" class="btn btn-primary" onclick="insertarItem();">Agregar</button>							
						</div>	                        
                    </div>
				</form>

                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Calificaci&oacute;n</th>
                            <th>Item</th>
                            <th>Ponderaci&oacute;n</th>
                            <th>Valor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

					<tbody>                   
					<?php 
						foreach($calificacionesItems as $item) {
						?>
						<tr>
							<td><?php echo $item['CALDESCRIPCION']; ?></td>
                            <td><?php echo $item['ITENOMBRE']; ?></td>
                            <td><?php echo $item['CITPONDERACION']; ?></td>
                            <td><?php echo $item['CITTIPO']; ?></td>
							<td>
								<button type="button" onclick="deleteItem(<?=$item['CITID']?>);" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
							</td>
						</tr>

						<?php } ?>
					</tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function insertarItem()
    {
        var txtCalificacion = $("#txtCalificacion").val();
        if (txtCalificacion =="" || txtCalificacion== null ){
            alert("Error al seleccionar la calificacion !");
            return false;
        }

        var item = $("#item option:selected").val();
        if (item =="" || item== null || item=="Seleccione:"){
            alert("Seleccione un Item !");
            return false;
        }

        var tipo = $("#tipo option:selected").val();
        if (tipo =="" || tipo== null || tipo=="Seleccione:"){
            alert("Seleccione un Tipo !");
            return false;
        }

        var ponderacion = $("#ponderacion").val();
        if (ponderacion =="" || ponderacion== null ){
            alert("Digite valor de ponderacion");
            return false;
        }
        
        var baseurl = "<?php echo base_url(); ?>";

         $.ajax({
             method: "post",
             url: "<?= base_url('calificaciones/insertItem'); ?>",
             data: {
                txtCalificacion:$("#txtCalificacion").val(),
                item: $("#item option:selected").val(),
                tipo,
                ponderacion
             },
             dataType: "json",
             success: function(response) {
                //console.log(response);
                location.reload();
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
    }

    function deleteItem(item)
    {

        if (item =="" || item== null || item=="Seleccione:"){
            swal("Error al seleccionar item!", "", "info");
            return false;
        }//end if
        var baseurl = "<?php echo base_url(); ?>";

         $.ajax({
             method: "post",
             url: "<?= base_url('calificaciones/deleteItem'); ?>",
             data: {
                item: item
             },
             dataType: "json",
             success: function(response) {
                location.reload();
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
    }
</script>

