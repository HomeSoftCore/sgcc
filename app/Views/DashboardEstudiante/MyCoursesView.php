<!-- 
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>
    
        <section class="content-header">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Datos del Estudiante</h3>
                  </div>
                  <div class="box-body">
                          <div style="display: flex;align-items: center;justify-content: space-around;">
                            <?php
                              	$session=session();
                                $id=$session->get('usuId');
                                $usuNombre=$session->get('usuNombre');
                                $usuCedula=$session->get('usuCedula');
                            ?>
                            <div>
                              CODIGO: <?php echo $id;?>
                            </div>
                            <div>
                              CEDULA: <?php echo $usuCedula;?>
                            </div>
                            <div>
                              NOMBRE:  <?php echo $usuNombre;?>
                            </div>
                          </div>
                  </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Listado  de Cursos</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
          
        <tr class="col-12">
              <th scope="col">CODIGO</th>
              <th scope="col">NOMBRE</th>
              <th scope="col">MODALIDAD</th>
              <th scope="col">PRECIO</th>
              <th scope="col">FECHA INICIO</th>
              <th scope="col">FECHA FIN</th> 
              <th scope="col"></th>          
            </tr>
          </thead>
          <tbody>
            <?php
            
            foreach($cursos as $curso){
              
            ?>
              <tr>
              <td ><?php echo $curso->CURID; ?></td>
                  <td ><?php echo $curso->CURNOMBRE; ?></td>
                  <td ><?php echo $curso->CURMODALIDAD; ?></td>
                  <td><?php echo $curso->CURPRECIO; ?></td>
                  <td><?php echo $curso->CURFECINICIO; ?></td>
                  <td><?php echo $curso->CURFECFINAL; ?></td>
                  <td>
                  <?php
                      echo form_open('MyCoursesController/matricular');
                      echo form_input(array('type' => 'hidden','name' => 'curid', 'value'=> $curso->CURID));
                      echo form_button(array('name' => 'btnMatricularme', 'type' => 'submit', 'class' => 'btn btn-success', 'content' => 'Registrarse'));
                      echo form_close();
                  ?>
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
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Mis Cursos</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row" style="margin-top: 15px;">
		        			<div class="col-xs-12">
						    	<div class="table-responsive"> 
							        <table id="example" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							            <thead>
        
      <tr class="col-12">
            <th scope="col">CODIGO</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">MODALIDAD</th>
            <th scope="col">INICIO</th>
            <th scope="col">FIN</th>
            <th scope="col">PRECIO</th>  
            <th scope="col">ACCIONES</th>       
          </tr>
        </thead>
        <tbody>
          <?php
        
          foreach($registrocursos as $curso){

          ?>
            <tr>
                <td ><?php echo $curso->RCUID; ?></td>
                <td ><?php echo $curso->CURNOMBRE; ?></td>
                <td ><?php echo $curso->CURMODALIDAD; ?></td>
                <td><?php echo $curso->CURFECINICIO; ?></td>
                <td><?php echo $curso->CURFECFINAL; ?></td>
                <td><?php echo $curso->CURPRECIO; ?></td>
                <td>
                <?php
                      echo form_open('MyCoursesController/unmatricular');
                      echo form_input(array('type' => 'hidden','name' => 'curid', 'value'=> $curso->RCUID));
                      echo form_button(array('name' => 'btnAbandonar', 'type' => 'submit', 'class' => 'btn btn-danger', 'content' => 'Abandonar'));
                      echo form_close();
                  ?>
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



</div> -->


<div class="row">
  <div class="col-lg-4 col-md-5">
    <div class="card">
      <div class="card-body">
          <div class="text-center"> 
              <img src="<?php echo base_url();?>/public/tema/img/user.png" class="rounded-circle" width="150" />
              <h4 class="card-title mt-10"><?php echo $session->get('usuNombre') ?></h4>
              <p class="card-subtitle"><?php echo $session->get('usuCedula') ?></p>
          </div>
      </div>
    </div>
  </div>

  <div class="col-lg-8 col-md-7">

    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="card">
          <div class="card-header d-block">
              <h3>Listado de cursos</h3>
          </div>
          <div class="card-body p-0 table-border-style">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">MODALIDAD</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">FECHA INICIO</th>
                            <th scope="col">FECHA FIN</th> 
                            <th scope="col"></th>  
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach($cursos as $curso){
                        ?>
                          <tr>
                          <td ><?php echo $curso->CURID; ?></td>
                              <td ><?php echo $curso->CURNOMBRE; ?></td>
                              <td ><?php echo $curso->CURMODALIDAD; ?></td>
                              <td><?php echo $curso->CURPRECIO; ?></td>
                              <td><?php echo $curso->CURFECINICIO; ?></td>
                              <td><?php echo $curso->CURFECFINAL; ?></td>
                              <td>
                              <?php
                                  echo form_open('MyCoursesController/matricular');
                                  echo form_input(array('type' => 'hidden','name' => 'curid', 'value'=> $curso->CURID));
                                  echo form_button(array('name' => 'btnMatricularme', 'type' => 'submit', 'class' => 'btn btn-success', 'content' => 'Registrarse'));
                                  echo form_close();
                              ?>
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

    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="card">
          <div class="card-header d-block">
              <h3>Administrar mis cursos</h3>
          </div>
          <div class="card-body p-0 table-border-style">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">MODALIDAD</th>
                            <th scope="col">INICIO</th>
                            <th scope="col">FIN</th>
                            <th scope="col">PRECIO</th>  
                            <th scope="col">ACCIONES</th> 
                          </tr>
                      </thead>
                      <tbody>
                      <?php
        
                        foreach($registrocursos as $curso){

                        ?>
                          <tr>
                              <td ><?php echo $curso->RCUID; ?></td>
                              <td ><?php echo $curso->CURNOMBRE; ?></td>
                              <td ><?php echo $curso->CURMODALIDAD; ?></td>
                              <td><?php echo $curso->CURFECINICIO; ?></td>
                              <td><?php echo $curso->CURFECFINAL; ?></td>
                              <td><?php echo $curso->CURPRECIO; ?></td>
                              <td>
                              <?php
                                    echo form_open('MyCoursesController/unmatricular');
                                    echo form_input(array('type' => 'hidden','name' => 'curid', 'value'=> $curso->RCUID));
                                    echo form_button(array('name' => 'btnAbandonar', 'type' => 'submit', 'class' => 'btn btn-danger', 'content' => 'Abandonar'));
                                    echo form_close();
                                ?>
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