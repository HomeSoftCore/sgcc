<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Estudiantes</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController/nuevo'" class="btn btn-primary">Crear Estudiante</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>C&eacute;dula</th>
                            <th>Direcci&oacute;n</th>
							<th>Tel&eacute;</th>
                            <th>Correo</th>
							<th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($estudiantes as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->ESTID; ?></td>
                        <td><?php echo $item->ESTNOMBRE; ?></td>
                        <td><?php echo $item->ESTCEDULA; ?></td>
                        <td><?php echo $item->ESTDIRECCION; ?></td>
                        <td><?php echo $item->ESTTELEFONO; ?></td>
                        <td><?php echo $item->ESTCORREO; ?></td>
                        <td><?php echo $item->ESTESTADO; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController/editar?id=<?php echo $item->ESTID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/EstudianteController/borrar?id=<?php echo $item->ESTID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
