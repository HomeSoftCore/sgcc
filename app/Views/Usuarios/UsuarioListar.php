<!-- 
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuarios
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Administrar Usuarios</h3>
		            </div>
		            <div class="box-body">
		        		<div class="row">
		        			<div class="col-md-2">
		        				 <a href="<?php echo base_url();?>/UsuariosController/nuevo" class="btn btn-primary btn-block" >
		        					<i class="fa fa-user-tags"></i>
		        					CREAR NUEVO USUARIO
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
            <th scope="col">Nombre</th>
            <th scope="col">CEDULA</th>
            <th scope="col">CLAVE</th>
            <th scope="col">CORREO</th>
            <th scope="col">ESTADO</th>
            <th scope="col">NOMBRE_PERFIL</th>
            <th scope="col">ACCIONES</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($usuarios as $usuario){

          ?>
            <tr>
                <td ><?php echo $usuario->USUID ; ?></td>
                <td><?php echo $usuario->USUNOMBRE; ?></td>
                <td><?php echo $usuario->USUCEDULA; ?></td>
                <td><?php echo $usuario->USUCLAVE; ?></td>
                <td><?php echo $usuario->USUCORREO; ?></td>
                <td><?php echo $usuario->USUESTADO; ?></td>
                <td><?php echo $usuario->PERNOMBRE; ?></td>
                
                <td>
              <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>/UsuariosController/editar?id=<?php echo $usuario->USUID ;?>"><i class="fa fa-pencil"> Editar </i></a>
              <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>/UsuariosController/borrar?id=<?php echo $usuario->USUID ;?>"><i class="fa fa-trash"> Eliminar </i></a>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3>Administrar Usuarios</h3>
            <div class="card-header-right">
                <button type="button" onclick="location.href='<?php echo base_url();?>/UsuariosController/nuevo'" class="btn btn-primary">Crear Usuario</button>
            </div>

            </div>
            <div class="card-body">
                <table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>C&eacute;dula</th>
                            <th>Clave</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Nombre Perfil</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody>                   
                    <?php 
                        foreach($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td><?php echo $usuario->USUID; ?></td>
                        <td><?php echo $usuario->USUNOMBRE; ?></td>
                        <td><?php echo $usuario->USUCEDULA; ?></td>
                        <td><?php echo $usuario->USUCLAVE; ?></td>
                        <td><?php echo $usuario->USUCORREO; ?></td>
                        <td><?php echo $usuario->USUESTADO; ?></td>
                        <td><?php echo $usuario->PERNOMBRE; ?></td>
                        <td>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/UsuariosController/editar?id=<?php echo $usuario->USUID;?>'" class="btn btn-icon btn-info"><i class="ik ik-edit"></i></button>
                            <button type="button" onclick="location.href='<?php echo base_url();?>/UsuariosController/borrar?id=<?php echo $usuario->USUID;?>'" class="btn btn-icon btn-danger"><i class="ik ik-trash-2"></i></button>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
