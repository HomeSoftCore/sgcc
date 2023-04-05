
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Docentes
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Docentes</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/docentesController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					Crear Docente
                                </a>
		        			</div>
		        			
		        		</div>
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
                                                <tr>
                                                    <th>CODIGO</th>
                                                    <th>CEDULA</th>
                                                    <th>NOMBRE</th>
                                                    <th>TITULO</th>
                                                    <th>TELEFONO</th>
                                                    <th>CORREO</th>
                                                    <th>ESTADO</th>
                                                    <th>ACCIONES</th>
                                                    

                                                </tr>
                                            </thead>
                                            <?php
                                            $contador =0;
                                            foreach ($docentes as $docente) {

                                                ?>
                                                    <tbody>
    
                                                        <tr>
                                                        <th><?php echo $docente->DOCID; ?></th>
                                                            <td><?php echo $docente->DOCCEDULA; ?></td>
                                                            <td><?php echo $docente->DOCNOMBRE; ?></td>
                                                            <td><?php echo $docente->DOCTITULO; ?></td>
                                                            <td><?php echo $docente->DOCTELEFONO; ?></td>
                                                            <td><?php echo $docente->DOCCORREO; ?></td>
                                                            <td><?php echo $docente->DOCESTADO; ?></td>
                                                        
                                                        
                                                        <td>                            
                                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/docentesController/editar?id=<?php echo $docente->DOCID;?>"><i class="fa fa-pencil-square"></i> Editar</a>
                                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/docentesController/borrar?id=<?php echo $docente->DOCID;?>"><i class="fa fa-trash"></i> Eliminar</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>

                                        </tbody>
							        </table>
                                    <!-- Pagination -->
									<div class="d-flex justify-content-end">
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