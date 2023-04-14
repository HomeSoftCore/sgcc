 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Asignaci&oacute;n de Curso a Docente</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/RegistroDocentesController/nuevo'" class="btn btn-primary">Asignar Curso</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
						<th>C&oacute;digo</th>
						<th>Curso</th>
						<th>Docente</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Accion</th>
                        </tr>
                    </thead>
                <tbody>                   
                    <?php 
						$contador = 0;
                        foreach($registros as $registro) {
						$contador++;
                    ?>
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $registro['CURNOMBRE']; ?></td>
                        <td><?php echo $registro['DOCNOMBRE']; ?></td>
                        <td><?php echo $registro['RDOFECHA']; ?></td>
                        <td><?php echo $registro['RDOESTADO']; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/RegistroDocentesController/eliminar?id=<?php echo $registro['RDOID'];?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

