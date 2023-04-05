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
                        <div class="box box-danger">
                            <div class="box-header with-border">
                            <h3 class="box-title">Borrar Perfil</h3>
                            </div>
                            <div class="box-body">
                                <div class="row" style="margin-top: 15px;">
                                    <div class="col-xs-12">
                    <?php
                    $base = base_url();
                    echo form_open('PerfilesController/eliminar'); //equivale al <form></form> en html
                    echo "<br>";

                    $codigo=0;
                    foreach($perfiles as $value){
                        $codigo=$value['PERID'];
                        $PERNOMBRE=$value['PERNOMBRE'];
                        $PERESTADO=$value['PERESTADO'];
                    }

                    echo form_input(array('name' => 'txtCodigo', 'readOnly'=>'true','class'=>'form-control','value'=>$codigo));
                    echo "<br>";

                    echo form_label('Nombre_Perfil:', 'Nombre'); //equivale al <label></label> en html
                    echo "<br>";
                    echo form_input(array('name' => 'txtNombre', 'placeholder' => 'Ingrese el Nombre', 'class'=>'form-control','value'=>$PERNOMBRE));
                    echo "<br>";
                    echo form_label('Estado:', 'Estado'); //equivale al <label></label> en html
                    echo "<br>";
                    echo form_input(array('name' => 'txtEstado', 'placeholder' => 'Ingrese el Nombre', 'class'=>'form-control','value'=>$PERESTADO));
                    echo "<br>";

                    echo form_button(array('name' => 'btnBorrar', 'type' => 'submit', 'class' => 'btn btn-danger', 'content' => 'ELIMINAR'));
                    echo form_close();

                    ?>
          </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>