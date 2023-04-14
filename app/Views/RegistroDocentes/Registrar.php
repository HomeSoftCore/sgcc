
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3>Asignar Curso a Docente</h3>
              <div class="card-header-right">
                  <button type="button" onclick="location.href='<?php echo base_url();?>/RegistroDocentesController'" class="btn btn-light">Cancelar</button>
              </div>               
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>/RegistroDocentesController/guardar" method="post" accept-charset="utf-8">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="docente">Seleccione Docente</label>
                                <select name="docente" id="docente" class="form-control">
                                  <?php
                                  foreach($docentes as $docente){
                                  ?>
                                    <option value="<?=$docente['DOCID']?>"><?=$docente['DOCNOMBRE']?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                            </div>  
                          </div>

                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="curso">Seleccione Curso</label>
                                <select name="curso" id="curso" class="form-control">
                                  <?php
                                  foreach($cursos as $curso){
                                  ?>
                                    <option value="<?=$curso['CURID']?>"><?=$curso['CURNOMBRE']?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                            </div>  
                          </div>

                        </div>     
                        

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="item">Seleccione Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha_actual ?>">
                              </div>  
                            </div>

                          </div>                          


                          <div class="d-flex flex-column align-items-center">
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-primary btn-block">Asignar</button>
                            </div>
                          </div>  

                        </form>            
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
