<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Areas</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController/nuevo'" class="btn btn-primary">Crear Area</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="true" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        $contador = 0;
                        foreach($areas as $area) {
                            $contador++;
                    ?>
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $area['ARENOMBRE']; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController/editar?id=<?php echo $area['AREID'];?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/AreasController/borrar?id=<?php echo $area['AREID'];?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
