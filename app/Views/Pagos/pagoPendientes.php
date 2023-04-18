<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Gesti&oacute;n Pago de Matr&iacute;culas</h3>

            </div>
            <div class="card-body">

            <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                            <th>Estudiante</th>
                            <th>Curso</th>
                            <th>Valor del Curso</th>
                            <th>No. de Cuotas</th>
                            <th>Acción</th> 
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach ($matriculas as $matricula) {
                        ?>
                        <tr>
                            <td><?php echo $matricula->ESTNOMBRE ; ?></td>
                            <td><?php echo $matricula->CURNOMBRE; ?></td>
                            <td>$<?php echo $matricula->CURPRECIO; ?></td>
                            <td><?php echo $matricula->MATCUOTAS; ?></td>
                            <td><button type="button" onclick="location.href='<?php echo base_url();?>/PagosController/index?id=<?php echo $matricula->MATID;?>'" class="btn btn-primary">Pagar</button></td>
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

