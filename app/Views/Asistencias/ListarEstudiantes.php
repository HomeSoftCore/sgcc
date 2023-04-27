<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Registrar Asistencias</h3>

                <div class="card-header-right">
                    <button type="button" onclick="location.href='<?php echo base_url();?>/AsistenciasController/index'" class="btn btn-light">Regresar</button>
                </div>                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">Curso: <b><?php echo $curso["CURNOMBRE"] ?></b></div>
                    <div class="col-md-12">No. Estudiantes: <b><?php echo $curso["CURNUMESTUDIANTES"] ?></b></div>
                    <div class="col-md-12">Modalidad: <b><?php echo $curso["CURMODALIDAD"] ?></b></div>
                </div>
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Nombre Estudiante</th>
                            <th>C&eacute;dula</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($estudiantes as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item['ESTNOMBRE']; ?></td>
                        <td><?php echo $item['ESTCEDULA']; ?></td>
                        <td><?php echo $item['ESTCORREO']; ?></td>
                        <td>
                            <button type="button" 
                                onclick="registrarAsistencia(<?php echo $item['MATID']; ?>, '<?php echo $item['ESTNOMBRE']; ?>')"
                                class="btn btn-success"
                                data-toggle="modal"
                                data-target="#modal-default-asistencia">Marcar Asistencia
                            </button>

                        </td>                        
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-default-asistencia" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <form action="<?php echo base_url();?>/AsistenciasController/guardar" method="POST" autocomplete="off">
        <input type="hidden" id="MATID" name="MATID">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Registro de Asistencia <div id="item-data"></div></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            Estudiante: <span id="nombre_estudiante"></span>
                        </div>                      
                    </div> 
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                <label for="asistencia">Estado</label>
                                <select name="asistencia" id="asistencia" class="form-control" require>
                                    <option value="SI">ASISTE</option>
                                    <option value="NO">NO ASISTE</option>
                                </select>
                              </div>
                        </div>                      
                    </div>  
                    
                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                  <label for="observacion">Observacion</label>
                                  <input type="text" class="form-control" id="observacion" name="observacion" value="" placeholder="observacion...">
                              </div>
                        </div>                      
                    </div>  
                    
                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                  <label for="fecha">Fecha</label>
                                  <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha_actual ?>" placeholder="fecha...">
                              </div>
                        </div>                      
                    </div>                     
                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    function registrarAsistencia(MATID, nombre){
        $("#modal-default-asistencia #MATID").val(MATID);
        $("#modal-default-asistencia #nombre_estudiante").html(nombre);
    }
</script>
