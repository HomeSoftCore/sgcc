
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Asistencia
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<!-- ASISTENCIAS REGISTRADAS -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Asitencia</h3>
		            </div>
		            <div class="box-body">

		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="tableAsistencia" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
							            <tr>
							                <th>Codigo</th>
							                <th>Curso</th>
							                <th>Nombre del Estudiante</th>
											<th>Fecha</th>
											<th>Asiste</th>
											<th>Observación</th>
							            </tr>
							            </thead>
                                        <?php
											$contador =0;
                                            foreach ($asistencias as $asistencia) {
											$contador++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?=$contador?></th>
                                                <td><?=$asistencia['CURNOMBRE']?></td>
												<td><?=$asistencia['ESTNOMBRE']?></td>
												<td><?=$asistencia['ASIFECHA']?></td>
												<td><?=$asistencia['ASIESTADO']?></td>
												<td><?=$asistencia['ASIOBSERVACION']?></td>
                                                <td>                            
                                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/AsistenciasController/eliminar?id=<?=$asistencia['ASIID']?>"><i class="fa fa-trush"></i> Eliminar</a>
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

		<!-- REGISTRAR ASISTENCIAS -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Listado Alumnos</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="tableAlumnos" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
							            <tr>
							                <th>Codigo</th>
							                <th>Curso</th>
							                <th>Nombre del Estudiante</th>
											<th>Acción</th>
							            </tr>
							            </thead>
                                        <?php
											$contador =0;
                                            foreach ($alumnos as $alumno) {
											$contador++;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th><?=$contador?></th>
                                                <td><?=$alumno['CURNOMBRE']?></td>
												<td><?=$alumno['ESTNOMBRE']?></td>
                                                <td>                            
                                                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/AsistenciasController/nuevo?id=<?=$alumno['MATID']?>"><i class="fa fa-check"></i> Registrar Asistencia</a>
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



