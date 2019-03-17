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
if ($_SESSION['admonoc']==1)
{
?>
<!--Contenido-->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
          <h1>
            CREACION DE ORDENES DE FUNCIONAMIENTO GENERAL
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Ordenes</li>

          </ol>
        </section>

        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fas fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptarticulos.php" target="_blank"><button class="btn btn-info">Reporte</button></a></h1>
                                              <!-- encabezado de pestañas-->
                    <div class="modal-body">
                    <ul id="Tabss" class="nav nav-tabs" role="tablist">
                        <li id="TabSolicitud" role="presentation" class="active"><a href="#transferenciabch.php"
                                                                                    aria-controls="Solicitud" role="tab"
                                                                                    data-toggle="tab">Solicitud/Orden de
                                Compra</a></li>
                        <li id="TabFactura" role="presentation"><a href="#Facturas" aria-controls="Facturas" role="tab"
                                                                   data-toggle="tab">Ingreso de facturas</a></li>
                        <li id="TabComprobante" role="presentation"><a href="#Comprobante" aria-controls="Comprobante"
                                                                       role="tab"
                                                                       data-toggle="tab">Comprobante de Pago</a></li>
                    </ul>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                            <thead style="background-color:#d2d6de">
                                <th>Opciones</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Usuario</th>
                                <th>Programa</th>
                                <th>No. Orden</th>
                                <th>No. Comprobante</th>
                                <th>Monto Total</th>
                                <th>Impuesto</th>
                                <th>Estado</th>
                          </thead>

                          <tbody>
                          </tbody>

                          <tfoot style="background-color:#d2d6de">
                            <th>Opciones</th>
                              <th>Fecha</th>
                              <th>Proveedor</th>
                              <th>Usuario</th>
                              <th>Programa</th>
                              <th>No. Orden</th>
                              <th>No. Comprobante</th>
                              <th>Monto Total</th>
                              <th>Impuesto</th>
                              <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                        <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Solicitud(*):</label>
                            <input type="text" class="form-control input-sm" name="titulo_orden" id="titulo_orden" maxlength="45" placeholder="Ingrese un titulo">
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>No. Orden(*):</label>
                            <input type="hidden" name="idadministrar_ordenes" id="idadministrar_ordenes">
                            <input type="text" class="form-control input-sm" name="num_orden" id="num_orden" maxlength="45" placeholder="Ingrese el # de orden">
                          </div>
                        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>No. Comprobante (*):</label>
                            <input type="text" class="form-control input-sm" name="num_comprobante" id="num_comprobante" maxlength="45" placeholder="Ingrese el # de comprobante">
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Tipo impuesto(*):</label>
                            <select class="form-control select-picker" onchange="modificarSubototales()" onkeyup="modificarSubototales()" name="tipo_impuesto" id="tipo_impuesto" required>
                              <option value="0.15">ISV(15%)</option>
                              <option value="0.125">ISR(12.5%)</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Programa(*):</label>
                            <select id="idprograma" name="idprograma" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>



                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Descripcion:</label>
                            <textarea class="form-control input-sm" name="descripcion_orden" id="descripcion_orden" placeholder="Ingresa una descripción..." rows="4" cols="50"></textarea>

                          </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Proveedor(*):</label>
                            <select id="idproveedores" name="idproveedores" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>


                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Fecha(*):</label>
                            <input type="date" class="form-control input-sm" name="fecha_hora" id="fecha_hora" required="">
                          </div>


                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align: center;">
                            <hr>
                            <a data-toggle="modal" href="#myModal">
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fas fa-cart-plus"></span> Agregar Objeto Gasto</button>
                            </a>
                              <hr>
                          </div>






                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#d2d6de">
                                    <th>Opciones</th>
                                    <th>Objeto Gasto</th>
                                    <th>Unidad</th>
                                    <th>Cantidad</th>
                                    <th>Descripcion</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                </thead>
                                 <tbody>
                                 </tbody>



                                 <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>TOTAL</th>
                                    <th><h4 id="montototal">L. 0.00</h4><input type="hidden" name="monto_total" id="monto_total"></th>
                                  </tfoot>

                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>TOTAL DESCUENTO</th>
                                    <th><input type="number" onchange="modificarSubototales()" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" onkeyup="modificarSubototales()" class="form-control input-sm" name="descuento_total" id="descuento_total" maxlength="45" placeholder="Ingrese el descuento"></th>
                                </tfoot>

                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>SUB TOTAL</th>
                                    <th><h4 id="sub_total">L. 0.00</h4><input type="hidden" name="subtotales" id="subtotales"></th>
                                </tfoot>

                                  <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>IMPUESTO</th>
                                    <th><input type="number" step=".01" class="form-control input-sm" name="impuesto" id="impuesto" maxlength="45" placeholder="Ingrese el impuesto" readonly></th>
                                </tfoot>

                            </table>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fas fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fas fa-arrow-circle-left"></i> Cancelar</button>
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
   </div>
<!--   Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

 <div class="modal-dialog" style="width: 65% !important;">
    <div class="modal-content">

       <div class="modal-header" style="background:#3c8dbc; color:white">


         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title" style="text-align: center;">AGREGAR RENGLON PRESUPUESTARIO</h4>

        </div>

      <div class="modal-body">
        <table id="tblpresupuesto_disponible" class="table table-striped table-bordered table-condensed table-hover" width="100%">
          <thead>
              <th>Opciones</th>
               <th>Nombre Objeto</th>
              <th>Código</th>
              <th>Valor Disponible</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
              <th>Opciones</th>
               <th>Nombre Objeto</th>
              <th>Código</th>
              <th>Valor Disponible</th>
          </tfoot>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
<script type="text/javascript" src="scripts/administrar_ordenes.js"></script>
<?php
}
ob_end_flush();
?>
