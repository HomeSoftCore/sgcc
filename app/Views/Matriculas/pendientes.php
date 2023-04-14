 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Gesti&oacute;n de Matriculas Pendientes</h3>

            </div>
            <div class="card-body">

            <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                            <th>Codigo</th>
                            <th>Curso</th>
                            <th>Estudiante</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Valor del Curso</th>
                            <th>Fecha Registro</th>
                            <th>Estado</th>
                            <th>Acción</th> 
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $contador =0;
                        foreach ($matriculas as $matricula) {
                            $contador = $contador + 1;
                        ?>
                        <tr>
                            <td><?=$contador;?></td>
                            <td><?php echo $matricula['CURNOMBRE']; ?></td>
                            <td><?php echo $matricula['ESTNOMBRE']; ?></td>
                            <td><?php echo $matricula['ESTTELEFONO']; ?></td>
                            <td><?php echo $matricula['ESTCORREO']; ?></td>
                            <td>$<?php echo $matricula['CURPRECIO']; ?></td>
                            <td><?php echo $matricula['RCUFECHA']; ?></td>
                            <td><?php echo $matricula['RCUESTADO']; ?></td>
                            <td><button type="button" onclick="location.href='<?php echo base_url();?>/MatriculasController/matriculaPendiente?id=<?php echo $matricula['RCUID'];?>'" class="btn btn-primary">Matricular</button></td>
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

