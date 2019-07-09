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

if ($_SESSION['contabilidad']==1)
{
?>

<style media="screen">
div.dataTables_wrapper div.dataTables_filter {
  margin-top: 24.5px !important;
}
.nav-tabs-custom>.nav-tabs>li.header {
    padding: 0 24px !important;
}



</style>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">

                <div class="nav-tabs-custom">
                  <br>
                  <ul class="nav nav-tabs pull-right">
                    <!-- <li><a href="#reporteseis" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte 6</a></li> -->
                    <li><a href="#reporte_uuss" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte por UUSS</a></li>
                    <li><a href="#reporte_programa" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte por Programas</a></li>
                    <li><a href="#reporte_renglon" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte por Objeto de Gasto</a></li>
                    <li><a href="#reporte_detalles" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte por Detalles</a></li>
                    <li class="active"><a href="#report_grles" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte Ctas Grales</a></li>
                    <li class="pull-left header"><i class="fas fa-file-excel" style="color:green;"></i> Reportes de Contabilidad</li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="report_grles">
                        <div class="panel-body table-responsive" id="listadoregistros">
                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label>Fecha Inicio</label>
                              <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label>Fecha Fin</label>
                              <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
                            </div>

                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="width: 100%;">
                              <thead style="background-color:#d2d6de">
                                <th>N°</th>
                                <th>Fecha</th>
                                <th>Unidad Superficie</th>
                                <th>Cheque</th>
                                <th>Descripcion</th>
                                <th>O/C</th>
                                <th>C/P</th>
                                <th>Acdo</th>
                                <th>Programa</th>
                                <th>No. Transferencia</th>
                                <th>Objeto Gasto</th>
                                <th>Total</th>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot style="background-color:#d2d6de">
                                <th>N°</th>
                                <th>Fecha</th>
                                <th>Unidad Superficie</th>
                                <th>Cheque</th>
                                <th>Descripcion</th>
                                <th>O/C</th>
                                <th>C/P</th>
                                <th>Acdo</th>
                                <th>Programa</th>
                                <th>No. Transferencia</th>
                                <th>Objeto Gasto</th>
                                <th>Total</th>
                              </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="reporte_detalles">
                        <div class="panel-body table-responsive" id="listadoregistros">
                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label>Fecha Inicio</label>
                              <input type="date" class="form-control" name="fecha_inicio_det" id="fecha_inicio_det" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label>Fecha Fin</label>
                              <input type="date" class="form-control" name="fecha_fin_det" id="fecha_fin_det" value="<?php echo date("Y-m-d"); ?>">
                            </div>

                            <table id="tbllistado_det" class="table table-striped table-bordered table-condensed table-hover" style="width: 100%;">
                              <thead style="background-color:#d2d6de">
                                <th>N°</th>
                                <th>Fecha</th>
                                <th>Unidad Superficie</th>
                                <th>Cheque</th>
                                <th>Descripcion</th>
                                <th>O/C</th>
                                <th>C/P</th>
                                <th>Acdo</th>
                                <th>Programa</th>
                                <th>No. Transferencia</th>
                                <th>Objeto Gasto</th>
                                <th>ISVR</th>
                                <th>ISRR</th>
                                <th>Total</th>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot style="background-color:#d2d6de">
                                <th>N°</th>
                                <th>Fecha</th>
                                <th>Unidad Superficie</th>
                                <th>Cheque</th>
                                <th>Descripcion</th>
                                <th>O/C</th>
                                <th>C/P</th>
                                <th>Acdo</th>
                                <th>Programa</th>
                                <th>No. Transferencia</th>
                                <th>Objeto Gasto</th>
                                <th>ISVR</th>
                                <th>ISRR</th>
                                <th>Total</th>
                              </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="reporte_renglon">
                      <div class="panel-body table-responsive" id="listadoregistros_renglon">
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Filtro por Años:</label>
                            <input type="number" class="form-control" name="año" id="año" min="1900" max="2099" step="1" value="2018" />
                          </div>

                          <table id="tbllistado_renglones" class="table table-striped table-bordered table-condensed table-hover" style="width: 100%;">
                            <thead style="background-color:#d2d6de">
                              <th>Renglon</th>
                              <th>Concepto</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
                              <th>Junio</th>
                              <th>Julio</th>
                              <th>Agosto</th>
                              <th>Septiembre</th>
                              <th>Octumbre</th>
                              <th>Noviembre</th>
                              <th>Diciembre</th>
                              <th>Acumulado</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot style="background-color:#d2d6de">
                              <th>Renglon</th>
                              <th>Concepto</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
                              <th>Junio</th>
                              <th>Julio</th>
                              <th>Agosto</th>
                              <th>Septiembre</th>
                              <th>Octumbre</th>
                              <th>Noviembre</th>
                              <th>Diciembre</th>
                              <th>Acumulado</th>
                            </tfoot>
                          </table>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="reporte_programa">
                      <div class="panel-body table-responsive" id="listadoregistros_programa">
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Filtro por Años:</label>
                            <input type="number" class="form-control" name="añopro" id="añopro" min="1900" max="2099" step="1" value="2018" />
                          </div>

                          <table id="tbllistado_programas" class="table table-striped table-bordered table-condensed table-hover" style="width:100%;">
                             <thead style="background-color:#d2d6de">
                              <th>Programa</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
                              <th>Junio</th>
                              <th>Julio</th>
                              <th>Agosto</th>
                              <th>Septiembre</th>
                              <th>Octumbre</th>
                              <th>Noviembre</th>
                              <th>Diciembre</th>
                              <th>Acumulado</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot style="background-color:#d2d6de">
                              <th>Programa</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
                              <th>Junio</th>
                              <th>Julio</th>
                              <th>Agosto</th>
                              <th>Septiembre</th>
                              <th>Octumbre</th>
                              <th>Noviembre</th>
                              <th>Diciembre</th>
                              <th>Acumulado</th>
                            </tfoot>
                          </table>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="reporte_uuss">
                      <div class="panel-body table-responsive" id="listadoregistros">
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Filtro por Años:</label>
                            <input type="number" class="form-control" name="añouuss" id="añouuss" min="1900" max="2099" step="1" value="2018" />
                          </div>

                          <table id="tbllistado_uuss" class="table table-striped table-bordered table-condensed table-hover" style="width:100%;">
                             <thead style="background-color:#d2d6de">
                              <th>Programa</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
                              <th>Junio</th>
                              <th>Julio</th>
                              <th>Agosto</th>
                              <th>Septiembre</th>
                              <th>Octumbre</th>
                              <th>Noviembre</th>
                              <th>Diciembre</th>
                              <th>Acumulado</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot style="background-color:#d2d6de">
                              <th>Programa</th>
                              <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
                              <th>Junio</th>
                              <th>Julio</th>
                              <th>Agosto</th>
                              <th>Septiembre</th>
                              <th>Octumbre</th>
                              <th>Noviembre</th>
                              <th>Diciembre</th>
                              <th>Acumulado</th>
                            </tfoot>
                          </table>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
              </div>
          </div>
      </section>

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

<script type="text/javascript" src="scripts/sgralcta.js"></script>
<link rel="stylesheet" href="../public/css/cssforordens.css">

<?php
}
ob_end_flush();
?>
