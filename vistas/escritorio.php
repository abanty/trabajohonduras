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
  require_once "../modelos/consultas_compromisos.php";

  $consultas_compromisos = new Consultas_compromisos();
  $rsptac = $consultas_compromisos->totalcompromisoshoy();
  $regc=$rsptac->fetch_object();
  $totalc=$regc->total_compra;

  $rsptav = $consultas_compromisos->totalctasbancariashoy();
  $regv=$rsptav->fetch_object();
  $totalv=$regv->fondos_disponibles;

  $rsptab = $consultas_compromisos->totaladministrar_ordeneshoy();
  $regb=$rsptab->fetch_object();
  $totalb=$regb->total_neto;



  //Datos para mostrar el gráfico de barras de las compras
  // $compras10 = $consultas_compromisos->comprasultimos_10dias();
  // $fechasc='';
  // $totalesc='';
  // while ($regfechac= $compras10->fetch_object()) {
  //   $fechasc=$fechasc.'"'.$regfechac->fecha .'",';
  //   $totalesc=$totalesc.$regfechac->total .',';
  // }

  //Quitamos la última coma
  // $fechasc=substr($fechasc, 0, -1);
  // $totalesc=substr($totalesc, 0, -1);

  //  //Datos para mostrar el gráfico de barras de las ventas
  // $ventas12 = $consultas_compromisos->ventasultimos_12meses();
  // $fechasv='';
  // $totalesv='';
  // while ($regfechav= $ventas12->fetch_object()) {
  //   $fechasv=$fechasv.'"'.$regfechav->fecha .'",';
  //   $totalesv=$totalesv.$regfechav->total .',';
  // }

  // //Quitamos la última coma
  // $fechasv=substr($fechasv, 0, -1);
  // $totalesv=substr($totalesv, 0, -1);

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
                          <h1 class="box-title"><b>ESCRITORIO</b></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-aqua">
                              <div class="inner">
                                <h3 style="font-size:35px;">
                                 <strong>L. <?php echo number_format($totalv,2); ?></strong>
                                </h3>
                                <p>PRESUPUESTO DISPONIBLE</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="ctasbancarias.php" class="small-box-footer">Disponible Ctas PGFNH<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                       <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-yellow">
                              <div class="inner">
                                <h4 style="font-size:35px;">
                                  <strong>L. <?php echo number_format($totalb,2); ?></strong>
                                </h4>
                                <p>PRESUPUESTO EJECUTADO</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-social-usd"></i>
                              </div>
                              <a href="administrar_ordenes.php" class="small-box-footer">Ejecutado<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-green">
                              <div class="inner">
                                <h4 style="font-size:35px;">
                                  <strong>L.<?php echo number_format($totalc,2); ?></strong>
                                </h4>
                                <p>COMPROMISOS</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-social-usd"></i>
                              </div>
                              <a href="compromisos.php" class="small-box-footer">Cuentas por Pagar<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-red">
                              <div class="inner">
                                <h4 style="font-size:35px;">
                                  <!-- <strong>S/ <?php echo $totalv; ?></strong> -->
                                </h4>
                                <p>FONDOS POR EJECUTAR</p>
                              </div>
                              <div class="icon">
                                <i class="ions ion-clipboard"></i>
                              </div>
                              <a href="" class="small-box-footer">Fondos por Ejecutar<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>



                    </div>
                    <div class="panel-body">

                        <div class="col-lg-12">

                          <div class="box box-solid bg-teal-gradient">
                              <div class="box-header with-border">
                                <i class="fa fa-th"></i>

                                EJECUCION DEL PRESUPUESTO
                              </div>
                              <div class="box-body border-radius-none nuevoGraficoVentas">
                                <!-- <div class="chart" id="line-chart-ventas" style="height: 250px;"></div> -->
                                <canvas id="compras" width="400" height="300"></canvas>
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
<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("compras").getContext('2d');
var compras = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechasc; ?>],
        datasets: [{
            label: 'Compras en S/ de los últimos 10 días',
            data: [<?php echo $totalesc; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx = document.getElementById("ventas").getContext('2d');
var ventas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechasv; ?>],
        datasets: [{
            label: 'Ventas en S/ de los últimos 12 Meses',
            data: [<?php echo $totalesv; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>


</script>


<?php
}
ob_end_flush();
?>
