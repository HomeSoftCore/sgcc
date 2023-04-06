
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Eliminars Area</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="<?php echo base_url(); ?>/AreasController/eliminar" method="post" accept-charset="utf-8">
							              <div class="form-group">
                                <label for="txtCodigo">C&oacute;digo de &Aacute;rea</label>
                                <?php echo form_input(array('name' => 'txtCodigo', 'readOnly' => 'true', 'placeholder' => 'C&oacute;digo', 'class'=>'form-control','value'=>$areas["AREID"])); ?>
                            </div>

                            <div class="form-group">
                                <label for="txtAreas">Digite el &Aacute;rea</label>
                                <?php echo form_input(array('name' => 'txtAreas', 'readOnly' => 'true', 'placeholder' => '&aacute;rea', 'class'=>'form-control','value'=>$areas["ARENOMBRE"])); ?>
                            </div>
                            <button type="button" class="btn btn-light" onclick="location.href='<?php echo base_url();?>/AreasController'">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
