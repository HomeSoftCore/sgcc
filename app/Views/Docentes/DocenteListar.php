<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Docentes</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/DocentesController/nuevo'" class="btn btn-primary">Crear Docente</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>C&eacute;dula</th>
                            <th>Titulo</th>
							<th>Tel&eacute;</th>
                            <th>Correo</th>
							<th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                <tbody>                   
                    <?php 
                        foreach($docentes as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->DOCID; ?></td>
                        <td><?php echo $item->DOCNOMBRE; ?></td>
                        <td><?php echo $item->DOCCEDULA; ?></td>
                        <td><?php echo $item->DOCTITULO; ?></td>
                        <td><?php echo $item->DOCTELEFONO; ?></td>
                        <td><?php echo $item->DOCCORREO; ?></td>
                        <td><?php echo $item->DOCESTADO; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/DocentesController/editar?id=<?php echo $item->DOCID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/DocentesController/borrar?id=<?php echo $item->DOCID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
