

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
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Saldo General Cuentas Bancarias PGFNH</h1>
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
                            <th>No.</th>
                            <th>Fecha</th>
                            <th>Cheque</th>
                            <th>Descripcion</th>
                            <th>No. O/C</th>
                            <th>No. C/P</th>
                            <th>No. ACDO</th>
                            <th>No.transferencia</th>
                            <th>No. Cuenta B</th>                            
                            <th>Objeto Gasto</th>
                            <th>Nombre Objeto</th>
                            <th>TOTAL</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot  style="background-color:#d2d6de">
                            <th>No.</th>
                            <th>Fecha</th>
                            <th>Cheque</th>
                            <th>Descripcion</th>
                            <th>No. O/C</th>
                            <th>No. C/P</th>
                            <th>No. ACDO</th>
                            <th>No.transferencia</th>
                            <th>No. Cuenta B</th>                            
                            <th>Objeto Gasto</th>
                            <th>Nombre Objeto</th>
                            <th>TOTAL</th>
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
<script type="text/javascript" src="scripts/sgralcta.js"></script>
<?php 
}
ob_end_flush();
?>
