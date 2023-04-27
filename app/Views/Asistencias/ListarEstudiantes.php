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
                        <td><button type="button" onclick="location.href='<?php echo base_url();?>/RegistroCalificacionesController/indexCalificacion?id=<?php echo $item['ESTID'];?>&mat=<?php echo $item['MATID'];?>'" class="btn btn-primary">Marcar Asistencia</button></td>                        
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
