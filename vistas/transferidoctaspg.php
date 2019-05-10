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
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
          <h1>
            <b>Ingreso de Fondos a las Cuentas de PGFNH</b>
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
                   <div class="box box-success">
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
                            <th>Tipo Transferencia</th>
                            <th>No. Expediente</th>
                            <th>No. Transferencia</th>
                            <th>Valor transferido</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Tipo Transferencia</th>
                            <th>No. Expediente</th>
                            <th>No. Transferencia</th>
                            <th>Valor transferido</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Fecha(*):</label>
                             <input type="hidden" name="idtransferidoctaspg" id="idtransferidoctaspg">
                             <input type="date" class="form-control" name="fecha_hora" id="fecha_hora" required="">
                          </div>

                          <div class="form-group col-lg-4 col-md-2 col-sm-6 col-xs-12">
                            <label>Tipo Transferencia(*):</label>
                            <select class="form-control selectpicker" name="tipo_transf" id="tipo_transf" data-style="btn-default btn-sm" data-title="Elige el Tipo de Transferencia" required>
                              <option value="Transf/Sedena">Transf/Sedena</option>
                              <option value="Transf/Cuentas">Transf/Cuentas</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>No. Expediente(*):</label>
                            <input type="text" class="form-control" name="numexpediente" id="numexpediente" maxlength="25" placeholder="Número de Expediente" required="">
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>No. Transferencia(*):</label>
                            <input type="text" class="form-control" name="numtransferencia" id="numtransferencia" maxlength="25" placeholder="Número de Transferencia" required="">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a data-toggle="modal" href="#myModal">
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fas fa-cart-plus"></span> Transferir Fondos</button>
                            </a>
                          </div>

                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                              <thead style="background-color:#d2d6de">
                                    <th>Opciones</th>
                                    <th>No. Cuenta</th>
                                    <th>No.Precompromiso</th>
                                    <th>Valor</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">L. 0.00</h4><input type="hidden" name="valor_transferido" id="valor_transferido" step"0.01">
                                    </th>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
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
  <div class="modal-dialog" style="width: 60% !important;">
    <div class="modal-content">

      <div class="modal-header" style="background:#3c8dbc; color:white">


         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title" style="text-align: center;">AGREGAR FONDOS A CUENTAS BANCARIAS</h4>

        </div>

      <div class="modal-body">
        <table id="tblctasbancarias" class="table table-striped table-bordered table-condensed table-hover" width="100%">
          <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Nombre Cuenta</th>
              <th>Nombre Banco</th>
              <th>Tipo Cuenta</th>
              <th>Numero Cuenta</th>
              <th>Fondos Disponibles</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Nombre Cuenta</th>
              <th>Nombre Banco</th>
              <th>Tipo Cuenta</th>
              <th>Numero Cuenta</th>
              <th>Fondos Disponibles</th>
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
<script type="text/javascript" src="scripts/transferidoctaspg.js"></script>
<?php
}
ob_end_flush();
?>
