<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Eliminar Curso</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/CursosController/eliminar" method="post" accept-charset="utf-8">

                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">C&oacute;digo</label>
                                  <input type="text" class="form-control" name="txtCodigo" readonly="true" placeholder="codigo..." value="<?php echo $cursos["CURID"] ?>">
                              </div>

                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">Digite el Nombre</label>
                                  <input type="text" class="form-control" name="txtNombre" readonly="true" placeholder="nombre..." value="<?php echo $cursos["CURNOMBRE"] ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtFecha_Inicio">Seleccione Fecha Inicio</label>
                                  <input type="date" class="form-control" name="txtFecha_Inicio" readonly="true" placeholder="seleccione fecha..." value="<?php echo $cursos["CURFECINICIO"] ?>">
                              </div>                               
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtFecha_Final">Seleccione Fecha Final</label>
                                  <input type="date" class="form-control" name="txtFecha_Final" readonly="true" placeholder="seleccione fecha..."  value="<?php echo $cursos["CURFECFINAL"] ?>">
                              </div>                               
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtPrecio">Digite el Precio</label>
                                  <input type="number" class="form-control" name="txtPrecio" readonly="true" placeholder="$0.00" value="<?php echo $cursos["CURPRECIO"] ?>">
                              </div>
                            </div>                            
                          </div>     
                          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNº_Estudiantes">Digite Nº Estudiantes</label>
                                  <input type="number" class="form-control" name="txtNº_Estudiantes" readonly="true" placeholder="#" value="<?php echo $cursos["CURNUMESTUDIANTES"] ?>">
                              </div>                               
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtModalidad">Seleccione Modalidad</label>
                                  <?php 
                                  
                                  $options = [
                                    'PRESENCIAL'  => 'PRESENCIAL',
                                    'VIRTUAL'    => 'VIRTUAL',
                                    'NOCTURNA'    => 'NOCTURNA'
                                  ];

                                  echo "<select class='form-control' name='txtModalidad' readonly='true' id='txtModalidad'>";
                                  foreach ($options as $item){
                                    if($cursos["CURMODALIDAD"]==$item) {
                                      echo "<option value='" . $item . "'selected>" . $item . "</option>";
                                    }else{
                                        echo "<option value='" . $item . "'>" . $item . "</option>";
                                    }
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>
                          </div>   
                          
                          
                          <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtEstado">Seleccione Estado</label>
                                  <?php 
                                  
                                  $options = [
                                    'ACTIVO'  => 'ACTIVO',
                                    'INACTIVO'    => 'INACTIVO'
                                  ];

                                  echo "<select class='form-control' name='txtEstado' readonly='true' id='txtEstado'>";
                                  foreach ($options as $item){
                                    if($cursos["CURESTADO"]==$item) {
                                      echo "<option value='" . $item . "'selected>" . $item . "</option>";
                                    }else{
                                        echo "<option value='" . $item . "'>" . $item . "</option>";
                                    }
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="cmbAreas">Seleccione &Aacute;rea</label>
                                  <?php 
                                  
                                  echo "<select class='form-control' name='cmbAreas' readonly='true' id='cmbAreas'>";
                                  foreach ($areas as $item){
                                    if($cursos["AREID"]==$item->AREID) {
                                      echo "<option value='" . $item->AREID . "'selected>" . $item->ARENOMBRE . "</option>";
                                    }else{
                                        echo "<option value='" . $item->AREID . "'>" . $item->ARENOMBRE . "</option>";
                                    }                                    
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>
                          </div>
                            <button type="button" class="btn btn-light" onclick="location.href='<?php echo base_url();?>/CursosController'">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
