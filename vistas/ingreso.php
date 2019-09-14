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
 table.dataTable tr.group td {
  background-color: #bbd1de !important;
}
 </style>
    <div class="content-wrapper">
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
          <div class="row" id="formularioregistros">
              <div class="col-md-12">

                   <div class="box box-primary">
                     <div class="box-header with-border">
                        <h3 class="box-title mytext"><i class="fas fa-chalkboard-teacher"></i> Formulario Ingresos Presupuestales</h3>
                     </div>

                    <div class="panel-body">
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
                            <label>Tipo Presupuesto(*):</label>
                            <select class="form-control selectpicker" name="tipo_presupuesto" id="tipo_presupuesto"  multiple data-max-options="1" data-style="btn-default btn-sm" data-title="Elige un presupuesto" required>
                              <option data-icon="fas fa-dollar-sign" value="inicial">Inicial</option>
                              <option data-icon="fas fa-dollar-sign" value="disminuciones">Disminuciones</option>
                              <option data-icon="fas fa-dollar-sign" value="congelamientos">Disminuciones</option>
                              <option data-icon="fas fa-dollar-sign" value="aumentos">Aumentos</option>
                              <option data-icon="fas fa-dollar-sign" value="siafi">Siafi</option>

                            </select>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a data-toggle="modal" href="#myModal">
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fas fa-cart-plus"></span> Agregar Presupuesto</button>
                            </a>
                          </div>

                      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                              <thead style="background-color:#d2d6de">
                                    <th>Opciones</th>
                                    <th>Nombre Objeto</th>
                                    <th>Actividad</th>
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
                      </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                          <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>
                      </form>

                    </div>
                  </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->

          <div class="row" id="listadoregistros">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                      <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h1>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                           INGRESO GENERAL <small>(click aqui)</small>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                          <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover"width="100%">
                            <thead style="background-color:#d2d6de">
                              <th>Opciones</th>
                              <th>Fecha</th>
                              <th>Usuario</th>
                              <th>Número F01</th>
                              <th>Total</th>
                              <th>Estado</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot style="background-color:#d2d6de">
                              <th>Opciones</th>
                              <th>Fecha</th>
                              <th>Usuario</th>
                              <th>Número F01</th>
                              <th>Total</th>
                              <th>Estado</th>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-danger">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            INGRESO DETALLE PRESUPUESTALES <small>(click aqui)</small>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body">
                          <table id="tbllistado_detallado" class="table table-striped table-bordered table-condensed table-hover"width="100%">
                            <thead style="background-color:#d2d6de">
                              <th>Fecha</th>
                              <th>Objeto</th>
                              <th>Grupo</th>
                              <th>Subgrupo</th>
                              <th>Pres Inicial</th>
                              <th>Pres Siafi</th>
                              <th>Pres Congelamientos</th>
                              <th>Pres Aumentos</th>
                              <th>Pres Disminuciones</th>
                              <th>Monto</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot style="background-color:#d2d6de">
                              <th>Fecha</th>
                              <th>Objeto</th>
                              <th>Grupo</th>
                              <th>Subgrupo</th>
                              <th>Pres Inicial</th>
                              <th>Pres Siafi</th>
                              <th>Pres Congelamientos</th>
                              <th>Pres Aumentos</th>
                              <th>Pres Disminuciones</th>
                              <th>Monto</th>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
          </div>
      </section>


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
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Nombre Objeto</th>
              <th>Código</th>
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

  </div>
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
