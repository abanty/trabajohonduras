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


<style media="screen">


#preloader{
  background: #000000d9;
  position: fixed;
  z-index: 121;
  width: 100%;
  text-align: center;
  height: 100%;
  
}

</style>



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

        <div class="box box-primary">

          <div class="box-header with-border">
            <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fas fa-plus-circle"></i> Agregar</button></h1>
          </div>


          <div class="box-body" id="listadoregistros">
            <div class="panel-body table-responsive">
              <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="width: 100%;">
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
          </div>

          <div class="box-body" id="formularioregistros">

            <div class="col-md-12">

                  <!-- Custom Tabs -->
                  <div class="nav-tabs-custom" id="mistabs">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab" id="tabprincipal">Crear Orden / Solicitud</a></li>
                      <li><a href="#tab_2" data-toggle="tab">Ingreso Facturas</a></li>
                      <li><a href="#tab_3" data-toggle="tab">Comprobante de Pago</a></li>

                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">

                        <div class="panel-body" >

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

                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Programa(*):</label>
                            <select id="idprograma" name="idprograma" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Programa"></select>
                          </div>

                          <div id="tipo_impuesto_div" class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Tipo impuesto(*):</label>
                            <select class="form-control selectpicker" onchange="modificarSubototales()" onkeyup="modificarSubototales()" name="tipo_impuesto" id="tipo_impuesto" data-style="btn-default btn-sm" data-title="Elige Impuesto">
                              <option value="0.15">ISV(15%)</option>
                              <option value="0.125">ISR(12.5%)</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Descripcion:</label>
                            <textarea class="form-control input-sm" name="descripcion_orden" id="descripcion_orden" placeholder="Ingresa una descripción..." rows="4" cols="50"></textarea>

                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Proveedor(*):</label>
                            <select id="idproveedores" name="idproveedores" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Proveedor"></select>
                          </div>


                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Fecha(*):</label>
                            <input type="date" class="form-control input-sm" name="fecha_hora" id="fecha_hora" required="">
                          </div>


                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align: center; padding:20px;">

                            <a data-toggle="modal" href="#myModal">
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fas fa-cart-plus"></span> Agregar Objeto Gasto</button>
                            </a>

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
                                <th>
                                  <h4 id="montototal">L. 0.00</h4><input type="hidden" name="monto_total" id="monto_total">
                                </th>
                              </tfoot>

                              <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>TOTAL DESCUENTO</th>
                                <th><input type="number" onchange="modificarSubototales()" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" onkeyup="modificarSubototales()" class="form-control input-sm" name="descuento_total" id="descuento_total"
                                    maxlength="45" placeholder="Ingrese el descuento"></th>
                              </tfoot>

                              <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>SUB TOTAL</th>
                                <th>
                                  <h4 id="sub_total">L. 0.00</h4><input type="hidden" name="subtotales" id="subtotales">
                                </th>
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


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                        <table id="detallesfactura" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Nª Factura</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Opciones</th>
                          </thead>
                          <tbody>

                          </tbody>
                          <tfoot>
                            <tr style="height:20px;">
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>

                      <div id="here_inside" class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

                      </div>
                    </div>
                  </div>



                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">


                <br>
                <div class="row container">

                    <div class="form-group  col-md-4">
                        <label class="control-label" for="debitos">Debitos:</label>
                        <input type="text" class="form-control input-sm" form="formulario" name="debitos" id="debitos" style="text-transform: uppercase;" placeholder="Ingresa un debito">
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <label>Tipo de Pago(*):</label>
                      <select class="form-control selectpicker" form="formulario" name="tipopago" id="tipopago" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Tipo">
                        <option value="Deposito">Deposito</option>
                        <option value="Cheque">Cheque</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3" id="contenedorNumeroCuenta">
                        <label class="control-label" for="NumeroCuenta">Numero de Cuenta</label>
                        <input type="number" class="form-control input-sm" form="formulario" id="num_transferencia" name="num_transferencia" placeholder="Ingresa # de cuenta">
                    </div>
                </div>

                <div class="row container">
                    <div class="form-group  col-md-4">
                        <label class="control-label" for="contabilidad">Contabilidad</label>
                        <input type="text" class="form-control input-sm" form="formulario" id="contabilidad" name="contabilidad" style="text-transform: uppercase;" placeholder="Ingresa estado">
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label>Cuenta de banco a debitar(*):</label>
                      <select class="form-control selectpicker" form="formulario" id="idctasbancarias" name="idctasbancarias" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige Cuenta de banco"></select>
                    </div>

                </div>

                <div class="row container">
                    <div class="form-group  col-md-4">
                        <label class="control-label" for="contabilidad">Contabilidad</label>
                        <input type="text" class="form-control input-sm" form="formulario" id="contabilidad" name="contabilidad" style="text-transform: uppercase;" placeholder="Ingresa estado">
                    </div>
               </div>
               <hr>
                <div class="row container">
                    <div class="form-group  col-md-4">
                      <a type="button" id="changetab" onclick='$("#tabprincipal").trigger("click")'>  <i style="font-size:35px;" class="fas fa-arrow-alt-circle-left"></i> <span style="position: absolute; margin-top: 8px; margin-left: 3px;">  Regresa</span></a>
                    </div>
                </div>

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
      </div>

          </div>


          <!-- /.box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer-->
      </div>



      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->










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
