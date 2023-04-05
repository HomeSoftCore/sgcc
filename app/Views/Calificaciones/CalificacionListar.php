
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Calificaciones
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Calificaciones</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/CalificacionesController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					Crear Calificaciones
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
                        <th>Descripcion</th>
                        <th>Puntaje</th>
                        <th>Aprobacion</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <?php
                $cont=0;
                foreach ($calificaciones as $calificacion) {
                $cont++;
                ?>
                    <tbody>

                        <tr>
                            <th><?php echo $calificacion->CALID; ?></th>
                            <td><?php echo $calificacion->CALDESCRIPCION; ?></td>
                            <td><?php echo $calificacion->CALPUNTAJE; ?></td>
                            <td><?php echo $calificacion->CALPUNAPROBACION; ?></td>
                            <td><?php echo $calificacion->CALESTADO; ?></td>
                            
                            <td>                        
                                <a class="btn btn-warning btn-xs" href="<?php echo base_url();?>/CalificacionesController/registrarItems?id=<?php echo $calificacion->CALID;?>">
                                    <i class="fa fa-plus-square"> Editar Items</i> 
                                </a>
                                <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/CalificacionesController/editar?id=<?php echo $calificacion->CALID;?>"><i class="fa fa-pencil-square"></i> Editar</a>
                                <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/CalificacionesController/borrar?id=<?php echo $calificacion->CALID;?>"><i class="fa fa-trash"></i> Eliminar</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
             </tbody>
							        </table>
                                    <!-- Pagination -->
									<!--<div class="d-flex justify-content-end">-->
										<?php //if ($pager) :?>
										<?php //$pagi_path= $pagi_path ?>
										<?php //$pager->setPath($pagi_path); ?>
										<?//= //$pager->links() ?>
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