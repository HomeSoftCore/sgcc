<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Registrar Calificaci&oacute;nes</h3>
            <div class="card-header-right">
				<button type="button" onclick="location.href='<?php echo base_url();?>/RegistroCalificacionesController/indexEstudiantes'" class="btn btn-light">Cancelar</button>
            </div>

            </div>
            <div class="card-body">
				<form accept-charset="utf-8">

                    <div class="row">
                        <div class="col-md-4">
							<div class="form-group">
								<label for="calificacion">Seleccione Calificaci&oacute;n</label>
								<?php 
								
								echo "<select class='form-control' name='calificacion' id='calificacion' onchange='selectedChange(this);'>";
								echo "<option value=''>seleccione opci&oacute;n...</option>";
								foreach ($calificaciones as $item){
									echo "<option value='".$item['CALID']."'>".$item['CALDESCRIPCION']."</option>";
								}
								echo "</select>";                                
								
								?>
							</div> 

						</div>                    


						<!-- <div class="col-md-4">
							<button type="button" class="btn btn-primary" onclick="insertarItem();">Agregar</button>							
						</div>	                         -->
                    </div>
				</form>

                <div id="items_calificaciones">

                </div>


            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function selectedChange( data) {

        CALID = data.value
        
        var baseurl = "<?php echo base_url(); ?>";

         $.ajax({
             method: "post",
             url: "<?= base_url('registro/calificaciones/items'); ?>",
             data: {
                calificacion: CALID
             },
             dataType: "json",
             success: function(response) {
                // location.reload();
                $('#items_calificaciones').html(response.html );
             },
             error: function(xhr, ajaxOptions, thrownError) {
                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
             }
         });
    }


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

