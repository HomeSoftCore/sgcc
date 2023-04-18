 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Perfiles</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/PerfilesController/nuevo'" class="btn btn-primary">Crear Perfil</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
							<th>Nombre</th>
							<th>Estado</th>
							<th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($perfiles as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->PERNOMBRE; ?></td>
                        <td><?php echo $item->PERESTADO; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/PerfilesController/editar?id=<?php echo $item->PERID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/PerfilesController/borrar?id=<?php echo $item->PERID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
							<button type="button" title="Asignar Opciones" onclick="location.href='<?php echo base_url();?>/PerfilesController/editarOpciones?id=<?php echo $item->PERID;?>'" class="btn btn-icon btn-success"><i class="ik ik-check-circle"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
