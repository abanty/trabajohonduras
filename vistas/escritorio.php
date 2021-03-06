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

if ($_SESSION['escritorio']==1)
{
  require_once "../modelos/Consultas_graficos.php";
  $consultas_graficos= new Consultas_graficos();
  $rsptac = $consultas_graficos->totalctasbancarias();
  $regc=$rsptac->fetch_object();
  $totalc=$regc->fondos_disponibles;

  $rsptav = $consultas_graficos->totaladministrar_ordenes();
  $regv=$rsptav->fetch_object();
  $totalv=$regv->total_neto;


  $rsptab = $consultas_graficos->totalcompromisos();
  $regb=$rsptab->fetch_object();
  $totalb=$regb->total_compra;

?>
<style media="screen">
.small-box p {
  font-size: 13px !important;
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
                          <div class="box-title"><h3><i class="ion-cube" style="color:#3c8dbc;"> </i><b> VISTAS DE REPORTES GRÁFICOS</b></h3>
                                  <div class="box-tools pull-right"></div>
                          </div>
                          <!-- /.box-header -->
                          <!-- centro -->
                          <div class="panel-body">



                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red-gradient">
                                  <div class="inner">
                                    <h3><strong style="font-size:23px;"><?php echo $totalc; ?> L</strong></h3>
                                    <p>Presupuesto Disponible</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-social-usd"></i>
                                  </div>
                                  <a href="ctasbancarias.php" class="small-box-footer">Disponible Ctas PGFNH <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-blue-gradient">
                                  <div class="inner">
                                    <h3><strong style="font-size:23px;"><?php echo $totalv; ?> L</strong></h3>
                                    <p>Presupuesto Ejecutado</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-social-usd"></i>
                                  </div>
                                  <a href="administrar_ordenes.php" class="small-box-footer">Ejecutado <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow-gradient">
                                  <div class="inner">
                                    <h3><strong style="font-size:23px;"><?php echo $totalb; ?> L</strong></h3>
                                    <p>Compromisos</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-social-usd"></i>
                                  </div>
                                  <a href="compromisos.php" class="small-box-footer">Cuentas por Pagar <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>

                              <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-maroon-gradient">
                                  <div class="inner">
                                    <h3><strong style="font-size:23px;">10000</strong></h3>
                                    <p>Fondos Por Ejecutar</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-social-usd"></i>
                                  </div>
                                  <a href="" class="small-box-footer">Fondos por Ejecutar <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>

                          </div>

                          <div class="panel-body">
                              <div class="col-lg-12">
                                <div class="box box-solid bg-black-gradient">
                                    <div class="box-header with-border">

                                      <b>EJECUCION DEL PRESUPUESTO</b>
                                    </div>
                                    <div class="box-body border-radius-none nuevoGraficoEjecucion">
                                      <div class="chart" id="line-chart-ventas" style="height: 250px;"></div>
                                    </div>
                                </div>
                              </div>

                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                      PAGOS REALIZADOS ULTIMOS 12 MESES
                                    </div>
                                    <div class="box-body">
                                      <canvas id="ventas" width="400" height="300"></canvas>
                                    </div>
                                </div>
                              </div>
                          </div>
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
<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script>
<script src="../public/raphael/raphael.min.js"></script>
<script src="../public//morris.js/morris.min.js"></script>
<script type="text/javascript">
$(window).on('load', function () {
    setTimeout(function () {
  $(".loader-page").css({visibility:"hidden",opacity:"0"})
}, 1000);

});
</script>

<?php
}
ob_end_flush();
?>
