<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Usuarios</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/UsuariosController/nuevo'" class="btn btn-primary">Crear Usuario</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>C&eacute;dula</th>
                            <th>Clave</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Nombre Perfil</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td><?php echo $usuario->USUID; ?></td>
                        <td><?php echo $usuario->USUNOMBRE; ?></td>
                        <td><?php echo $usuario->USUCEDULA; ?></td>
                        <td><?php echo $usuario->USUCLAVE; ?></td>
                        <td><?php echo $usuario->USUCORREO; ?></td>
                        <td><?php echo $usuario->USUESTADO; ?></td>
                        <td><?php echo $usuario->PERNOMBRE; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/UsuariosController/editar?id=<?php echo $usuario->USUID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/UsuariosController/borrar?id=<?php echo $usuario->USUID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
