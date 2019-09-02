<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if ($_SESSION['siafi']==1)
{
?>
<style media="screen">

form#formulario .help-block {
    margin-bottom: -5px !important;
    color: #dd4b39 !important;
    font-size: 12px !important;
}

</style>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
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
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptpresupuesto_disponible.php" target="_blank"><button class="btn btn-info">Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                          <thead style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Nombre Objeto</th>
                            <th>Codigo</th>
                            <th>Pres Inicial</th>
                            <th>Pres Disminuciones</th>
                            <th>Pres Por Ejecutar</th>
                            <th>Pres. Ejecutado Siafi</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                        </table>
                    </div>
                        <div class="panel-body" id="formularioregistros">
                          <form name="formulario" id="formulario" method="POST">
                            <div class="box-body">
                              <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <label for="nombre_objeto">Objeto:(*)</label>
                                  <input type="hidden" name="idpresupuesto_disponible" id="idpresupuesto_disponible">
                                  <input type="text" class="form-control input-sm" name="nombre_objeto" id="nombre_objeto" maxlength="100"  placeholder="Nombre de Objeto">
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="grupo">Grupo:(*)</label>
                                  <input type="text" class="form-control input-sm"  name="grupo" id="grupo" maxlength="45" placeholder="Grupo">
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="subgrupo">Sub-Grupo:(*)</label>
                                  <input type="text" class="form-control input-sm"  name="subgrupo" id="subgrupo" maxlength="45" placeholder="Sub Grupo">
                                  <div class="messages"></div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="codigo">Codigo:(*)</label>
                                  <input type="text" class="form-control input-sm" name="codigo" id="codigo" maxlength="45" placeholder="codigo">
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="pres_aprobado">Pres. Inicial:</label>
                                  <input type="text" class="form-control input-sm" onchange="sumarcampos()" onkeyup="sumarcampos()" name="pres_aprobado" id="pres_aprobado" required>
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="pres_modificado">Disminuciones:</label>
                                  <input type="text" class="form-control input-sm"  onchange="sumarcampos()" onkeyup="sumarcampos()" name="pres_modificado" id="pres_modificado" required>
                                  <div class="messages"></div>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                  <label for="presupuesto_anual">Por Ejecutar:</label>
                                  <input type="text" class="form-control input-sm"  name="presupuesto_anual" id="presupuesto_anual" required>
                                  <div class="messages"></div>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label for="fondos_disponibles">Pres. SIAFI Ejecutado:</label>
                                    <input type="text" class="form-control input-sm"  name="fondos_disponibles" id="fondos_disponibles" required>
                                    <div class="messages"></div>
                                  </div>
                               </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                              <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                          </form>

              <!-- </form> -->
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/presupuesto_disponible.js"></script>
<!-- <script type="text/javascript" src="scripts/validators/valida_formulario.js"></script> -->

<?php
}
ob_end_flush();
?>
