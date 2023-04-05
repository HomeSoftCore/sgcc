
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
</script>