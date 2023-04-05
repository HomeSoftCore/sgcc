
<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Gestión de  Matriculas
            <small><i class="fa fa-book"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		             <center><h1 class="box-title"style="font-size:20px;">Listado de Matriculas</h1> <small><i class="fa fa-book"></i></small></center>
                      
		            </div>
		            <div class="box-body">
                        
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
							            <tr>
							                              <th style="text-align:center" >Codigo</th>
                                            <th style="text-align:center" >Estudiante</th>
							                             <th style="text-align:center" >Curso</th>
							                              <th style="text-align:center" >Forma Pago</th>
                                            <th style="text-align:center" >Precio Total</th>
                                            <th style="text-align:center" >Cuotas</th>
                                            <th style="text-align:center" >Cuotas Mensuales</th>
                                            <th style="text-align:center" >Fecha Registro</th>
                                            <th style="text-align:center" >Fecha Fin</th>
                                            <th style="text-align:center" >Estado Pago</th>
                                            <th style="text-align:center" >Estado Matricula</th>
                                            
							            </tr>
							            </thead>
                                        <?php
                                            //var_dump($matriculas);
                                            $contador =0;
                                          foreach ($matriculas as $matricula) {
                                                $contador = $contador + 1;
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center" ><?=$contador;?></td>
                                                <td style="text-align:center" ><?php echo $matricula['ESTNOMBRE']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['CURNOMBRE']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['MATTIPPAGO']; ?></td>
                                                <td style="text-align:center" >$<?php echo $matricula['CURPRECIO']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['MATCUOTAS']; ?></td>
                                                <td style="text-align:center" >$<?php echo $matricula['pagoCuota'];?></td>
                                                <td style="text-align:center" ><?php echo $matricula['MATFECHA']; ?></td>
                                                <td style="text-align:center" ><?php echo  $matricula['PAGFECREGPAGO']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['PAGESTADO']; ?></td>
                                                <td style="text-align:center" ><?php echo $matricula['MATESTADO']; ?></td>
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

<script>
      $(function () {
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</div>



