
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Registro Docente
            <small><i class="fa fa-tags"></i></small>
        </h1>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Docente</h3>
            </div>
            <div class="box-body">
              <div class="row" style="margin-top: 15px;">
                <div class="col-xs-12">
                <form action="<?php echo base_url('/RegistroDocentesController/guardar');?>" method="post">
                    <div class="col-xs-4">
                      <label for="item">Docente:</label>
                      <select name="docente" id="docente" class="form-control">
                        <?php
                        foreach($docentes as $docente){
                        ?>
                        <option value="<?=$docente['DOCID']?>"><?=$docente['DOCNOMBRE']?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-xs-4">
                      <label for="item">Curso:</label>
                      <select name="curso" id="curso" class="form-control">
                        <?php
                        foreach($cursos as $curso){
                        ?>
                        <option value="<?=$curso['CURID']?>"><?=$curso['CURNOMBRE']?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-xs-4">
                      <label for="item">Fecha:</label>
                      <input type="date" name="fecha" id="fecha" class="form-control">
                    </div>
                    <div class="col-xs-2" style="margin-top: 15px;">
                      <button type="submit" class="btn btn-primary btn-xy">Registrar Calificacion</button>
                    </div>
                    <div class="col-xs-2" style="margin-top: 15px;">
                      <a href="<?php echo base_url('/RegistroDocentesController');?>" class="btn btn-danger btn-xy">Cancelar</a>
                    </div>
                </form>
                </div>
              </div>
            </div>
        </div>
			</div>
		</div>
	</section>
</div>