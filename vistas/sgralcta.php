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
                  <div class="box box-primary">
                    <div class="box-header with-border">
                          <h1 class="box-title"><i style="color:green; font-size:25px;" class="fas fa-file-excel"></i> CONSOLIDADO GENERAL DE CTAS </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>Fecha Inicio</label>
                          <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>Fecha Fin</label>
                          <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <!-- <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>PROGRAMA</label>
                          <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true" required>
                          </select>
                          <button class="btn btn-success" onclick="listar()">Mostrar</button>
                        </div> -->
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
                            <!-- <th>Estado</th> -->
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
                            <!-- <th>Estado</th> -->
                          </tfoot>
                        </table>
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
<script type="text/javascript" src="scripts/sgralcta.js"></script>
<?php
}
ob_end_flush();
?>
