<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
} else {
    require 'header.php';
    if ($_SESSION['siafi']==1) {
        ?>
<style media="screen">
form#formulario .help-block {
    margin-bottom: -5px !important;
    color: #dd4b39 !important;
    font-size: 12px !important;
}
</style>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Administrar Presupuesto Disponible
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Presupuesto</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary box-solid">
                      <div class="box-header with-border">
                            <h1 class="box-title"><button class="btn btn-default" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Registra Presupuesto</button></h1>
                            <h3 class="box-title mytext"><i class="fas fa-chalkboard-teacher"></i> Formulario Presupuesto</h3>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                        <div class="panel-body table-responsive" id="listadoregistros">
                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                              <thead style="background-color:#d2d6de">
                                <th>Opciones</th>
                                <th>Nombre Objeto</th>
                                <th>Codigo</th>
                                <th>Pres. Vigente</th>
                                <!-- <th>Pres Disminuciones</th> -->
                                <th>Pres. Por Ejecutar</th>
                                <th>Pres. Ejecutado Siafi</th>
                                <th>Estado</th>
                              </thead>
                              <tbody>
                            </table>
                        </div>
                        <div class="panel-body" id="formularioregistros" style="padding: 5px 15px 15px 15px !important;">
                          <form name="formulario" id="formulario" method="POST">
                            <div class="box-body">

                              <div class="row">

                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <label for="nombre_objeto">Objeto:(*)</label>
                                  <input type="hidden" name="idpresupuesto_disponible" id="idpresupuesto_disponible">
                                  <input type="text" class="form-control input-sm" name="nombre_objeto" id="nombre_objeto" maxlength="100"  placeholder="Nombre de Objeto...">
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="grupo">Grupo:(*)</label>
                                  <input type="text" class="form-control input-sm"  name="grupo" id="grupo" maxlength="45" placeholder="Ingresa Grupo...">
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="subgrupo">Sub-Grupo:(*)</label>
                                  <input type="text" class="form-control input-sm"  name="subgrupo" id="subgrupo" maxlength="45" placeholder="Ingresa Sub Grupo...">
                                  <div class="messages"></div>
                                </div>

                              </div>

                             <div class="row">

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="codigo">Codigo:(*)</label>
                                  <input type="text" class="form-control input-sm" name="codigo" id="codigo" maxlength="45" placeholder="Digita Codigo...">
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="presupuesto_anual">Vigente:</label>
                                  <input type="text" class="form-control input-sm decimal" name="pres_vigente" id="pres_vigente" required>
                                  <div class="messages"></div>
                                </div>


                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="presupuesto_anual">Pres. Por Ejecutar:</label>
                                  <input type="text" class="form-control input-sm decimal" name="pres_ejecutar" id="pres_ejecutar" required>
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="fondos_disponibles">Pres. SIAFI Ejecutado:</label>
                                  <input type="text" class="form-control input-sm decimal"  name="pres_ejecutado" id="pres_ejecutado" required>
                                  <div class="messages"></div>
                                </div>

                             </div>

                            </div>
                            <div class="box-footer">
                              <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                          </form>
                    </div>
                      </div>
                  </div>
              </div>
           </div>
        </section>
    </div>
<?php
    } else {
        require 'noacceso.php';
    }
    require 'footer.php'; ?>
<script type="text/javascript" src="scripts/presupuesto_disponible.js"></script>
<?php
}
ob_end_flush();
?>
