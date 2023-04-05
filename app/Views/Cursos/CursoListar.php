
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cursos
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Cursos</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/CursosController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					Crear Curso
                                </a>
		        			</div>
		        			
		        		</div>
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
        
      <tr class="col-12">
            <th scope="col">CODIGO</th>
            <th scope="col">NOMBRE_AREA</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha_Inicio</th>
            <th scope="col">Fecha_Final</th>
            <th scope="col">Precio</th>
            <th scope="col">Nº Estudiantes</th>
            <th scope="col">Modalidad</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cont=0;
          foreach($cursos as $curso){
            $cont++;
          ?>
            <tr>
                <td style="text-align:center" ><?php echo $cont; ?></td>
                <td><?php echo $curso['ARENOMBRE']; ?></td>
                <td><?php echo $curso['CURNOMBRE']; ?></td>
                <td><?php echo $curso['CURFECINICIO']; ?></td>
                <td><?php echo $curso['CURFECFINAL']; ?></td>
                <td>$ <?php echo $curso['CURPRECIO']; ?></td>
                <td style="text-align:center"><?php echo $curso['CURNUMESTUDIANTES']; ?></td>
                <td><?php echo $curso['CURMODALIDAD']; ?></td>
                <td><?php echo $curso['CURESTADO']; ?></td>
                <td>
              <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/CursosController/editar?id=<?php echo $curso['CURID'];?>"><i class="fa fa-pencil"> Editar </i></a>
              <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/CursosController/borrar?id=<?php echo $curso['CURID'];?>"><i class="fa fa-trash"> Eliminar </i></a>
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