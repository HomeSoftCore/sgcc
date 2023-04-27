<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Registrar Asistencias / Listado de cursos</h3>
            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Nombre Curso</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Final</th>
                            <th>Nº Estudiantes</th>
                            <th>Modalidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($cursos as $curso) {
                    ?>
                    <tr>
                        <td><?php echo $curso['CURNOMBRE']; ?></td>
                        <td><?php echo $curso['CURFECINICIO']; ?></td>
                        <td><?php echo $curso['CURFECFINAL']; ?></td>
                        <td><?php echo $curso['CURNUMESTUDIANTES']; ?></td>
                        <td><?php echo $curso['CURMODALIDAD']; ?></td>
                        <td><button type="button" onclick="location.href='<?php echo base_url();?>/AsistenciasController/indexEstudiantes?id=<?php echo $curso['CURID'];?>'" class="btn btn-primary">Ver Estudiantes</button></td>                        
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
