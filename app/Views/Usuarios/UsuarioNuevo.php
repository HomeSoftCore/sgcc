<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Crear Usuario</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/UsuariosController/guardar" method="post" accept-charset="utf-8">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtNombre">Digite el Nombre</label>
                                  <input type="text" class="form-control" name="txtNombre" placeholder="nombres...">
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCedula">Digite No. C&eacute;dula</label>
                                  <input type="text" class="form-control" name="txtCedula" placeholder="c&eacute;dula...">
                              </div>                               
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtClave">Digite Clave</label>
                                  <input type="paswword" class="form-control" name="txtClave" placeholder="clave...">
                              </div>  

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtCorreo">Digite Correo</label>
                                  <input type="text" class="form-control" name="txtCorreo" placeholder="correo...">
                              </div> 
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="txtEstado">Digite Estado</label>
                                  <input type="text" class="form-control" name="txtEstado" placeholder="estado...">
                              </div>    

                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="cmbPerfiles">Seleccione Perfil</label>
                                  <?php 
                                  
                                  echo "<select class='form-control' name='cmbPerfiles' id='cmbPerfiles'>";
                                  foreach ($perfiles as $perfil){
                                    echo "<option value='".$perfil->PERID."'>".$perfil->PERNOMBRE."</option>";
                                  }
                                  echo "</select>";                                
                                  
                                  ?>
                              </div>  
                            </div>
                          </div>
                            <button type="button" class="btn btn-light" onclick="location.href='<?php echo base_url();?>/UsuariosController'">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
