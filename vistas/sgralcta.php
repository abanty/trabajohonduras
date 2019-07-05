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
                    <li><a href="#reporteseis" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte 6</a></li>
                    <li><a href="#reportecinco" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte 5</a></li>
                    <li><a href="#reportecuatro" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte 4</a></li>
                    <li><a href="#reportetres" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte 3</a></li>
                    <li><a href="#reporte_renglon" data-toggle="tab"><i class="fas fa-file-excel" style="color:green;"></i> Reporte Renglones</a></li>
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

                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
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
                    <div class="tab-pane" id="reporte_renglon">
                      <div class="panel-body table-responsive" id="listadoregistros_renglon">
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Filtro por Años:</label>
                            <input type="number" class="form-control" onchange="listar_excel_renglones()" onkeyup="listar_excel_renglones()" name="año" id="año" min="1900" max="2099" step="1" value="2018" />
                          </div>

                          <table id="tbllistado_renglones" class="table table-striped table-bordered table-condensed table-hover">
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
                    <div class="tab-pane" id="tab_3-2">
                      <div class="panel-body table-responsive" id="listadoregistros">
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Fecha Inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Fecha Fin</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
                          </div>

                          <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
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
<?php
}
ob_end_flush();
?>
