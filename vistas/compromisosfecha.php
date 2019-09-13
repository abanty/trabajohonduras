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

if ($_SESSION['compromisosp']==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
          <h1>
            Consultar compromisos por fecha
          </h1>
        </section>
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                   <div class="box box-success">
                    <div class="box-header with-border">
                           <a href="../reportes/RE_compromiso_renglon.php"> <button class="btn btn-info">Compromisos Pendientes por renglon</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha Inicio</label>
                          <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha Fin</label>
                          <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                          <thead style="background-color:#d2d6de">
                            <th>Fecha</th>
                            <th>Tipo Registro</th>
                            <th>Casa Comercial</th>
                            <th>Nombre Objeto</th>
                            <th>Codigo</th>
                            <th>Unidad</th>
                            <th>No. Factura</th>
                            <th>Valor</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot  style="background-color:#d2d6de">
                            <th>Fecha</th>
                            <th>Tipo Registro</th>
                            <th>Casa Comercial</th>
                            <th>Nombre Objeto</th>
                            <th>Codigo</th>
                            <th>Unidad</th>
                            <th>No. Factura</th>
                            <th>Valor</th>
                            <th>Estado</th>
                          </tfoot >
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
<script type="text/javascript" src="scripts/compromisosfecha.js"></script>
<?php
}
ob_end_flush();
?>
