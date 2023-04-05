
<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Gestion de  Matriculas Pendientes
            <small><i class="fa fa-book"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border"><br>
                    <center><h1 class="box-title"style="font-size:20px;">Listado de Matriculas Pendientes</h1> <small><i class="fa fa-book"></i></small></center>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table  id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead  >
							            <tr>
							                <th style="text-align:center" >Codigo</th>
                                            <th style="text-align:center" >Curso</th>
                                            <th style="text-align:center" >Estudiante</th>
                                            <th style="text-align:center" >Telefono</th>
                                            <th style="text-align:center" >Correo</th>
                                            <th style="text-align:center" >Valor del Curso</th>
							                <th style="text-align:center" >Fecha Registro</th>
                                            <th style="text-align:center" >Estado</th>
                                            <th style="text-align:center" >Acción</th>
							            </tr>
							            </thead>
                                        <?php
                                            $contador =0;
                                            foreach ($matriculas as $matricula) {
                                                $contador = $contador + 1;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?=$contador;?></td>
                                                <td style="text-align:center" ><?php echo $matricula['CURNOMBRE']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['ESTNOMBRE']; ?></td>
                                                 <td style="text-align:center" ><?php echo $matricula['ESTTELEFONO']; ?></td>
                                                 <td style="text-align:center" ><?php echo $matricula['ESTCORREO']; ?></td>
                                                 <td style="text-align:center" >$<?php echo $matricula['CURPRECIO']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['RCUFECHA']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['RCUESTADO']; ?></td>
                                                <td>                            
                                                    <a class="btn btn-warning btn-xs" href="<?php echo base_url();?>/MatriculasController/matriculaPendiente?id=<?php echo $matricula['RCUID'];?>"><i class="fa fa-book"> Matricular</i></a>
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



