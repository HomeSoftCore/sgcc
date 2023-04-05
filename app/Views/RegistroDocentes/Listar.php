
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Registro Docentes
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<!-- CALIFICACIONES REGISTRADAS -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Registro Docentes</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/RegistroDocentesController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					Registrar Docente
                                </a>
		        			</div>
		        			
		        		</div>
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
											<tr>
												<th>Codigo</th>
												<th>Curso</th>
												<th>Docente</th>
												<th>Fecha</th>
												<th>Estado</th>
												<th>Accion</th>
											</tr>
							            </thead>
                                        <?php
											$contador = 0;
                                            foreach ($registros as $registro) {
											$contador++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?=$contador?></th>
                                                <td><?=$registro['CURNOMBRE']?></td>
												<td><?=$registro['DOCNOMBRE']?></td>
												<td><?=$registro['RDOFECHA']?></td>
												<td><?=$registro['RDOESTADO']?></td>
                                                <td>                            
                                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/RegistroDocentesController/eliminar?id=<?php echo $registro['RDOID'];?>">
														<i class="fa fa-trash"> Eliminar</i>
													</a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
							        </table>
						        </div>
		        			</div>
		        		</div>
		            </div>
	          	</div>
			</div>
		</div>

	</section>



</div>



