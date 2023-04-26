<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Calificaciones</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController/nuevo'" class="btn btn-primary">Crear Calificaci&oacute;n</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Puntaje</th>
                            <th>Aprobacion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($calificaciones as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->CALDESCRIPCION; ?></td>
                        <td><?php echo $item->CALPUNTAJE; ?></td>
                        <td><?php echo $item->CALPUNAPROBACION; ?></td>
                        <td><?php echo $item->CALESTADO; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController/editar?id=<?php echo $item->CALID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/CalificacionesController/borrar?id=<?php echo $item->CALID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                            <button type="button" title="Asignar Items" onclick="location.href='<?php echo base_url();?>/CalificacionesController/registrarItems?id=<?php echo $item->CALID;?>'" class="btn btn-icon btn-success"><i class="ik ik-check-circle"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

