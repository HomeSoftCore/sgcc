 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Opciones</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/OpcionesController/nuevo'" class="btn btn-primary">Crear Opci&oacute;n</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
							<th>Nombre</th>
							<th>Ruta</th>
							<th>Estado</th>
							<th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($opciones as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->OPCNOMBRE; ?></td>
                        <td><?php echo $item->OPCRUTA; ?></td>
                        <td><?php echo $item->OPCESTADO; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/OpcionesController/editar?id=<?php echo $item->OPCID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/OpcionesController/borrar?id=<?php echo $item->OPCID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

