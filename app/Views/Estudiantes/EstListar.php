
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Estudiantes
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Estudiantes</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url()?>/EstudianteController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user"></i>
		        					Crear Estudiante
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
							                <th>Cedula</th>
											<th>Nombre</th>
											<th>Direccion</th>
											<th>Telefono</th>
											<th>Correo</th><th>Estado</th>
							                <th>Acciones</th>
							            </tr>
							            </thead>
                                        <?php
										//var_dump($estudiantes);
										
										foreach ($estudiantes as $estudiante) {
												
                                        ?>
                                        <tbody>

                                            <tr>
												<td><?php echo $estudiante->ESTID; ?></td>
                                                <td><?php echo $estudiante->ESTCEDULA; ?></td>
                                                <td><?php echo $estudiante->ESTNOMBRE; ?></td>
                                                <td><?php echo $estudiante->ESTDIRECCION; ?></td>
                                                <td><?php echo $estudiante->ESTTELEFONO; ?></td>
                                                <td><?php echo $estudiante->ESTCORREO; ?></td>
                                                <td><?php echo $estudiante->ESTESTADO; ?></td>
                                                
                                                
                                                <td>                            
                                                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/EstudianteController/editar?id=<?php echo $estudiante->ESTID;?>"><i class="fa fa-pencil"> Editar </i></a>
                                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/EstudianteController/borrar?id=<?php echo $estudiante->ESTID;?>"><i class="fa fa-trash"> Borrar </i></a>
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