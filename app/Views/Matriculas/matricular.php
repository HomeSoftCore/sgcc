
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Matriculas
            <small><i class="fa fa-book"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-10">
				<div class="box box-success">
		            <div class="box-header with-border">
		              <h3 class="box-title">Matricular Estudiante</h3>
					  	
		            </div>
		            <div class="box-body">
						<form action="<?php echo base_url();?>/MatriculasController/matricularAlumno" method="POST">
							<input type="hidden" name="idCurso" id="idCurso" value="<?=$idCurso?>">
							<input type="hidden" name="precioCurso" id="precioCurso" value="<?=$precioCurso?>">
		        		<div class="row" style="margin-top: 30px;">
		        			<div class="">
								
								<div class="col-xs-6">
									<label for="item">Nombre del Estudiante:</label>
									<input type="text" name="alumno" id="alumno" class="form-control" value="<?php echo $estudiante;?>"disabled>
								</div>
								<div class="col-xs-2">
									<label for="item">Precio:</label>
									<select name="curso" id="curso" class="form-control" disabled>
										<?php
											foreach ($pendiente as $p) {
										?>
										<option value="<?=$p['CURID']?>">$ <?=$p['CURPRECIO']?></option><br>
										
										<?php
											}
										?>
									</select>
									
								</div>
								
								<div class="col-xs-6">
								<br>
									<label for="item">Nombre del Curso:</label>
									<select name="curso" id="curso" class="form-control" disabled>
										<?php
											foreach ($pendiente as $p) {
										?>
										<option value="<?=$p['CURID']?>"><?=$p['CURNOMBRE']?></option><br>
										
										<?php
											}
										?>
									</select>
									
								</div>
						</div>
		        		</div>
						<div class="row" style="margin-top: 25px;">
							<div class="col-xs-6">
								<label for="item">Forma de Pago:</label>
								<select name="tipoPago" id="tipoPago" class="form-control">
								<option  rvalue="">SELECCIONE  LA FORMA DE PAGO</option>
									<option value="EFECTIVO">EFECTIVO</option>
									<option value="CREDITO">CREDITO</option>
								</select>
							</div>
								
							<div class="col-xs-6"style="margin-top: -75px;">
								<label for="item"> Cuotas:</label>
								<select name="numeroCuotas" id="numeroCuotas" class="form-control">
								<option value="">SELECCIONE NUMERO DE CUOTAS</option>
									<option value="1">1 Cuota</option>
									<option value="2">2 Cuotas</option>
									<option value="3">3 Cuotas</option>
									<option value="6">6 Cuotas</option>
									<option value="12">12 Cuotas</option>
									
								</select>
							</div>				
						</div>
						<div class="row" style="margin-top: 15px;">
							<div class="col-xs-6">
								<label for="item">Fecha:</label>
								<input type="date" name="fecha" id="fecha" class="form-control" required>
							</div>
							<div class="col-xs-6" style="margin-top: -75px;">
								<label for="item">Estado Matricula:</label>
								<select name="estadoMatricula" id="estadoMatricula" class="form-control">
								<option value="">SELECCIONE EL ESTADO DE MATRICULA</option>
									<option value="PAGADO">PAGADO</option>
									<option value="PENDIENTE">PENDIENTE</option>
								</select>
							</div>
							
						</div>
						<br>
						<div class="row" style="margin-top: 15px;">
							<div class="col-xs-2">
								<button type="submit" class="btn btn-primary btn-xy" ><i class="fa fa-pencil"></i>
									Matricular
										</button>
							</div>
							<div class="col-xs-2">
								<a href="<?php echo base_url();?>/MatriculasController/pendientes" class="btn btn-danger btn-xy"><i class="fa fa-trash"></i>
									Cancelar
								</a>
							</div>
						</div>
						</form>
		            </div>
	          	</div>
			</div>
		</div>
	</section>



</div>



