
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Actualizar Area</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="/AreasController/modificar" method="post" accept-charset="utf-8">
							<div class="form-group">
                                <label for="txtCodigo">C&oacute;digo de &Aacute;rea</label>
                                <input type="text" disabled value="<?php echo $areas["AREID"] ?>" class="form-control" name="txtCodigo" placeholder="&aacute;rea">
                            </div>

                            <div class="form-group">
                                <label for="txtAreas">Digite el &Aacute;rea</label>
                                <input type="text" value="<?php echo $areas["ARENOMBRE"] ?>" class="form-control" name="txtAreas" placeholder="&aacute;rea">
                            </div>
                            <button type="button" class="btn btn-light" onclick="location.href='<?php echo base_url();?>/AreasController'">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
