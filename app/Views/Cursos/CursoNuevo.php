<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Crear Curso</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/CursosController/guardar" method="post" accept-charset="utf-8">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">Digite el Nombre</label>
                                  <input type="text" class="form-control" name="txtNombre" placeholder="nombre...">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtFecha_Inicio">Seleccione Fecha Inicio</label>
                                  <input type="date" class="form-control" name="txtFecha_Inicio" placeholder="seleccione fecha...">
                              </div>                               
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtFecha_Final">Seleccione Fecha Final</label>
                                  <input type="date" class="form-control" name="txtFecha_Final" placeholder="seleccione fecha...">
                              </div>                               
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtPrecio">Digite el Precio</label>
                                  <input type="number" class="form-control" name="txtPrecio" placeholder="$0.00">
                              </div>
                            </div>                            
                          </div>     
                          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNº_Estudiantes">Digite Nº Estudiantes</label>
                                  <input type="number" class="form-control" name="txtNº_Estudiantes" placeholder="#">
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

                                  echo "<select class='form-control' name='txtModalidad' id='txtModalidad'>";
                                  foreach ($options as $item){
                                    echo "<option value='".$item."'>".$item."</option>";
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

                                  echo "<select class='form-control' name='txtEstado' id='txtEstado'>";
                                  foreach ($options as $item){
                                    echo "<option value='".$item."'>".$item."</option>";
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="cmbAreas">Seleccione &Aacute;rea</label>
                                  <?php 
                                  
                                  echo "<select class='form-control' name='cmbAreas' id='cmbAreas'>";
                                  foreach ($areas as $item){
                                    echo "<option value='".$item->AREID."'>".$item->ARENOMBRE."</option>";
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>
                          </div>                           


                            <button type="button" class="btn btn-light" onclick="location.href='<?php echo base_url();?>/CursosController'">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
