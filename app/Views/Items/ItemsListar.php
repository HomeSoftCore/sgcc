
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Items
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Items</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/ItemsController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					Crear Items
                                </a>
		        			</div>
		        			
		        		</div>
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
							            <tr>
							                <th style="text-align:center">Código</th>
							                <th style="text-align:center">Nombre</th>
                                            <th style="text-align:center">Observación</th>
                                            <th style="text-align:center">Estado</th>
							                			<th>Acciones</th>
							            </tr>
							            </thead>
                                        <?php
											$cont=0;
                                            foreach ($items as $item) {
												$cont++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th style="text-align:center"><?php echo $cont; ?></th>
                                                <td style="text-align:center"><?php echo $item['ITENOMBRE']; ?></td>
                                                <td style="text-align:center"><?php echo $item['ITEOBSERVACION']; ?></td>
                                                <td style="text-align:center"><?php echo $item['ITEESTADO']; ?></td>
                                                <td>                            
                                                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/ItemsController/editar?id=<?php echo $item['ITEID'];?>"><i class="fa fa-pencil"> Editar </i></a>
                                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/ItemsController/borrar?id=<?php echo $item['ITEID'];?>"><i class="fa fa-trash"> Eliminar </i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
							        </table>
									<!-- Pagination -->
									<div class="d-flex justify-content-end">
										<?php if ($pager) :?>
										<?php $pagi_path= $pagi_path ?>
										<?php $pager->setPath($pagi_path); ?>
										<?= $pager->links() ?>
										<?php endif ?>
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



