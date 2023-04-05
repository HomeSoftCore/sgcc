
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Opciones
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Opciones</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/OpcionesController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					CREAR NUEVA OPCION
                                </a>
		        			</div>
		        			
		        		</div>
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Ruta</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <?php
				$cont=0;
                foreach ($opciones as $opcion) {
					$cont++;

                ?>
                    <tbody>

                        <tr>
						<th><?php echo $opcion->OPCID; ?></th>
                            <td><?php echo $opcion->OPCNOMBRE; ?></td>
                            <td><?php echo $opcion->OPCRUTA; ?></td>
                            <td><?php echo $opcion->OPCESTADO; ?></td>
                            <td>                            
                                <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/OpcionesController/editar?id=<?php echo $opcion->OPCID;?>"><i class="fa fa-pencil-square"></i> Editar</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/OpcionesController/borrar?id=<?php echo $opcion->OPCID;?>"><i class="fa fa-trash"></i> Eliminar</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                   </tbody>
							        </table>
										<!-- Pagination -->
										<!--<div class="d-flex justify-content-end">-->
										<?php// if ($pager) :?>
										<?php //$pagi_path= $pagi_path ?>
										<?php //$pager->setPath($pagi_path); ?>
										<?//= $pager->links() ?>
										<?php //endif ?>
									</div>
						        </div>
		        			</div>
		        		</div>
		            </div>
	          	</div>
			</div>
		</div>
	</section>



</div>

