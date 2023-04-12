<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Cursos</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/CursosController/nuevo'" class="btn btn-primary">Crear Curso</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>C&oacute;digo</th>
                            <th>Nombre &Aacute;rea</th>
                            <th>Nombre</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Final</th>
                            <th>Precio</th>
                            <th>Nº Estudiantes</th>
                            <th>Modalidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        $contador = 0;
                        foreach($cursos as $curso) {
                            $contador++;
                    ?>
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $curso['ARENOMBRE']; ?></td>
                        <td><?php echo $curso['CURNOMBRE']; ?></td>
                        <td><?php echo $curso['CURFECINICIO']; ?></td>
                        <td><?php echo $curso['CURFECFINAL']; ?></td>
                        <td><?php echo $curso['CURPRECIO']; ?></td>
                        <td><?php echo $curso['CURNUMESTUDIANTES']; ?></td>
                        <td><?php echo $curso['CURMODALIDAD']; ?></td>
                        <td><?php echo $curso['CURESTADO']; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CursosController/editar?id=<?php echo $curso['CURID'];?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CursosController/borrar?id=<?php echo $curso['CURID'];?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
