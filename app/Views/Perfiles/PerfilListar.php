<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Perfiles
			<small><i class="fa fa-tags"></i></small>
		</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Administrar Perfiles</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-2">
								<a href="<?php echo base_url(); ?>/PerfilesController/nuevo" class="btn btn-primary btn-block">
									<i class="fa fa-user-tags"></i>
									CREAR NUEVO PERFIL
								</a>
							</div>
							
						</div>
						<div class="row" style="margin-top: 15px;">
							<div class="col-xs-12">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-hover dt-responsive display nowrap"
												 cellspacing="0">
										<thead>
										<tr>
											<th>Código</th>
											<th>Nombre</th>
											<th>Estado</th>
											<th>Acciones</th>

										</tr>
										</thead>
										<?php
										$cont = 0;
										foreach ($perfiles

										as $perfil) {
										$cont++;
										?>
										<tbody>

										<tr>
										
											<th><?php echo $perfil->PERID; ?></th>
											<td><?php echo $perfil->PERNOMBRE; ?></td>
											<td><?php echo $perfil->PERESTADO; ?></td>
											<td>

											<a class="btn btn-success btn-xs"
													 href="<?php echo base_url(); ?>/PerfilesController/editar?id=<?php echo $perfil->PERID; ?>">
													<i class="fa fa-pencil-square"> Editar </i></a>
												
												<a class="btn btn-danger btn-xs"
													 href="<?php echo base_url(); ?>/PerfilesController/borrar?id=<?php echo $perfil->PERID; ?>">
													<i class="fa fa-trash"> Eliminar </i></a>

													<a class="btn btn-primary btn-xs"
													 href="<?php echo base_url(); ?>/PerfilesController/editarOpciones?id=<?php echo $perfil->PERID; ?>">
													<i class="fa fa-pencil-square"> Agregar Opciones </i>
												</a>
												
											</td>
										</tr>
										<?php
										}
										?>
										</tbody>
									</table>
									<!-- Pagination -->
									<!--<div class="d-flex justify-content-end">-->
										<?php //if ($pager) : ?>
											<?php //$pagi_path = $pagi_path ?>
											<?php //$pager->setPath($pagi_path); ?>
											<?//= $pager->links() ?>
										<?php// endif ?>
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


