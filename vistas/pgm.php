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
  .lead{
    color:#43567d;

  }
</style>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
          <h1>
            Administrar Ingreso de Presupuesto
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
                   <div class="box box-primary">
                    <div class="box-header with-border">
                          <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover"width="100%">
                          <thead style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Actividad</th>
                            <th>Total</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Actividad</th>
                            <th>Total</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">




                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <label>Fecha(*):</label>
                               <input type="hidden" name="idingreso" id="idingreso">
                               <input type="date" class="form-control input-sm" name="fecha_hora" id="fecha_hora" required="">
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <label>Número F01(*):</label>
                              <input type="text" class="form-control input-sm" name="numf01" id="numf01" maxlength="25" placeholder="Número" required="">
                            </div>

                            <div class="form-group col-lg-4 col-md-2 col-sm-6 col-xs-12">
                              <label>Actividad(*):</label>
                              <select class="form-control selectpicker" name="idpresupuesto" id="idpresupuesto"  multiple data-max-options="1" data-style="btn-default btn-sm" data-title="Elige un presupuesto" required>
                                <option data-icon="" value="presinit">001</option>
                                <option data-icon="" value="presanual">002</option>
                                <option data-icon="" value="dismin">003</option>
                                <option data-icon="" value="aument">004</option>
                                <option data-icon="" value="aument">005</option>
                              </select>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <a data-toggle="modal" href="#myModal">
                                <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fas fa-cart-plus"></span> Agregar Nuevo PGM</button>
                              </a>
                            </div>


                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <!-- <div class="panel panel-primary"> -->
                              <!-- <div class="panel-heading">
                                <h3 class="panel-title">Detalles de Ingresos presupuestales :</h3>
                              </div> -->
                              <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                                <thead style="background-color:#d2d6de">
                                      <th>Opciones</th>
                                      <th>Nombre Objeto</th>
                                      <th>Mes</th>
                                      <th>Valor</th>
                                      <th>Subtotal</th>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                  <tfoot>
                                      <th></th>
                                      <th></th>
                                      <th><h4><strong style="color:#727375;">TOTAL :</strong></h4></th>
                                      <th><h4 id="total">Lps. 0.00</h4><input type="hidden" name="total_importe" id="total_importe" step"0.01">
                                      </th>
                                  </tfoot>
                              </table>
                            <!-- </div> -->
                        </div>


                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

<!--   Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 50% !important;">
    <div class="modal-content">

      <div class="modal-header" style="background:#3c8dbc; color:white">


         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title" style="text-align: center;"><b>AGREGAR RENGLON PRESUPUESTARIO</b></h4>

        </div>

      <div class="modal-body">
        <table id="tblpresupuesto_disponible" class="table table-striped table-bordered table-condensed table-hover" width="100%">
          <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Nombre Objeto</th>
              <th>Código</th>
              <th>Fondos Vigentes</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Nombre Objeto</th>
              <th>Código</th>
              <th>Fondos Vigentes</th>
          </tfoot>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--   Fin modal -->


<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/ingreso.js"></script>
<?php
}
ob_end_flush();
?>
