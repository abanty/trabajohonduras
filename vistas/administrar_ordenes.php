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
<div class="content-wrapper ">


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


          <div class="box-body this" id="listadoregistros">
            <div class="panel-body table-responsive thispan">
              <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="width:100%; font-size:13px;">
                <thead style="background-color:#d2d6de">
                  <th>Opciones</th>
                  <th>Fecha</th>
                  <th>Proveedor</th>
                  <th>Usuario</th>
                  <th>Programa</th>
                  <th>Documento</th>
                  <th>No. Doc</th>
                  <th>No. Comprobante</th>
                  <th>Monto Total</th>
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
                  <th>Documento</th>
                  <th>No. Doc</th>
                  <th>No. Comprobante</th>
                  <th>Monto Total</th>
                  <th>Estado</th>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="box-body this" id="formularioregistros">

            <div class="col-md-12 thismd12">

              <!-- Custom Tabs -->
              <div class="nav-tabs-custom" id="mistabs">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" id="tabprincipal">Crear Orden / Solicitud</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Ingreso Facturas</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Comprobante de Pago</a></li>

                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">

                    <div class="panel-body thispan">

                      <form name="formulario" id="formulario" method="POST">

                        <div id="sol" class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                          <label>Solicitud(*):</label>
                          <input type="text" class="form-control input-sm" name="titulo_orden" id="titulo_orden" maxlength="45" placeholder="Ingrese un titulo">
                        </div>

                        <div id="No_ord" class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                          <label>No. Orden(*):</label>
                          <input type="hidden" name="idadministrar_ordenes" id="idadministrar_ordenes">
                          <input type="text" class="form-control input-sm" name="num_orden" id="num_orden" maxlength="45" placeholder="Ingrese el # de orden">
                        </div>

                        <div id="No_comp" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>No. Comprobante (*):</label>
                          <input type="text" class="form-control input-sm" name="num_comprobante" id="num_comprobante" maxlength="45" placeholder="Ingrese el # de comprobante">
                        </div>

                        <div id="No_acuerdo" style="display:none;" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>No. Acuerdo(*):</label>
                          <input type="text" class="form-control input-sm" name="num_acuerdo" id="num_acuerdo" maxlength="45" placeholder="Ingrese el # de acuerdo">
                        </div>

                        <div id="No_fr" style="display:none;" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>F.R.(*):</label>
                          <input type="text" class="form-control input-sm" name="inputfr" id="inputfr" maxlength="45" placeholder="Ingrese el # de F.R.">
                        </div>

                        <div id="No_refbancaria" style="display:none;" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>Referencia Bancaria.(*):</label>
                          <input type="text" class="form-control input-sm" name="refbank" id="refbank" maxlength="45" placeholder="Ingrese el # de Referencia B.">
                        </div>

                        <div id="No_planilla" style="display:none;" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>Nº planilla.(*):</label>
                          <input type="text" class="form-control input-sm" name="plan" id="plan" maxlength="45" placeholder="Ingrese el # de Referencia B.">
                        </div>

                        <div id="No_otros" style="display:none;" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>Nº Documento.(*):</label>
                          <input type="text" class="form-control input-sm" name="otros" id="otros" maxlength="45" placeholder="Ingrese el # de Referencia B.">
                        </div>

                        <div id="program" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <label>Programa(*):</label>
                          <select id="idprograma" name="idprograma" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Programa"></select>
                        </div>


                        <div id="datediv" class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                          <label>Fecha(*):</label>
                          <input type="date" class="form-control input-sm" name="fecha_hora" id="fecha_hora" required="">
                        </div>

                        <div id="descdiv" class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                          <label>Descripcion:</label>
                          <textarea class="form-control input-sm" name="descripcion_orden" id="descripcion_orden" placeholder="Ingresa una descripción..." rows="9" cols="50"></textarea>
                        </div>

                        <div id="divprov" class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <label>Proveedor(*):</label>
                          <select id="idproveedores" name="idproveedores" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Proveedor"></select>
                        </div>

                        <div id="alertselectdoc" style="display:none;" class="callout callout-warning">
                          <h4><i class="fas fa-exclamation-triangle"></i> Por Favor!</h4>

                          <p>Selecciona un tipo de documento a tramitar para proseguir.</p>
                        </div>

                        <div id="tpdoc" class="form-group col-lg-4 col-md-2 col-sm-6 col-xs-12">
                          <label>Tipo Documento(*):</label>
                          <select class="form-control selectpicker" name="tipo_documento" id="tipo_documento"  multiple data-max-options="1" data-style="btn-default btn-sm" data-title="Elige Documento" required>
                            <option data-icon="far fa-file-pdf" value="Acuerdo">Acuerdo</option>
                            <option data-icon="far fa-file-pdf" value="F.R.">F.R.</option>
                            <option data-icon="fas fa-file-pdf" value="O/C">O/C</option>
                            <option data-icon="far fa-file" value="Alimentacion">Alimentacion</option>
                            <option data-icon="far fa-file" value="Becas">Becas</option>
                            <option data-icon="fas fa-paste" value="Planillas">Planillas</option>
                            <option data-icon="far fa-file" value="Otros">Otros documentos</option>
                          </select>
                        </div>

                        <div id="btnmodal" class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" style="text-align: center; margin-top: 25px;">

                          <a data-toggle="modal" href="#myModal">
                            <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fas fa-dollar-sign"></span> Agregar Objeto Gasto</button>
                          </a>

                        </div>

                        <div id="uni_sup" class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                          <label>Unidad de Superficie (*):</label>
                          <select id="iduuss" name="iduuss" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un unidad"></select>
                        </div>



                        <div id="content_table_details" class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<div class="table-responsive">

                          <table class="table table-striped table-bordered table-condensed table-hover" id="detalles" role="table" style="margin-bottom: 0px;">

                            <thead id="det-thead" role="rowgroup" style="background-color:#d2d6de">
                              <tr role="row">
                                <th role="columnheader">Opciones</th>
                                <th role="columnheader">Objeto Gasto</th>
                                <th id="th_uni" role="columnheader">Unidad</th>
                                <th role="columnheader">Cantidad</th>
                                <th id="th_descr" colspan="4" role="columnheader">Descripcion</th>
                                <th role="columnheader">Precio Unitario</th>
                                <th role="columnheader">Subtotal</th>
                              </tr>
                            </thead>
                            <!-- onblur="onInputBlur(event)" onfocus="onInputFocus(event)" -->
                            <tbody id="det-tbody" role="rowgroup">
                            </tbody>

                          </table>

        </div>
                          <table id="content_tfoot" class="table table-condensed">

                            <tfoot>
                              <th colspan="4"></th>
                              <th>
                              </th>
                              <th></th>
                              <th></th>

                              <th></th>

                              <th>TOTAL NETO</th>
                              <th>
                                <h4 id="totalneto">L. 0.00</h4><input type="hidden" name="total_neto" id="total_neto">
                              </th>
                            </tfoot>


                            <tfoot id="ft_sub_ini">
                              <th colspan="4"></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>SUB TOTAL INICIAL</th>
                              <th>
                                <h5 id="sub_total_inicial">L. 0.00</h5><input type="hidden" name="subtotal_inicial" id="subtotal_inicial">
                              </th>
                            </tfoot>



                            <tfoot id="ft_desc">
                              <th colspan="4"></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>TOTAL DESCUENTO</th>
                              <th><input type="text" onchange="modificarSubototales()" onkeyup="modificarSubototales()" class="form-control input-sm" name="descuento_total" id="descuento_total" placeholder="Ingrese el descuento"></th>
                            </tfoot>


                            <tfoot>
                              <th colspan="4"></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>SUB TOTAL</th>
                              <th>
                                <h5 id="sub_total">L. 0.00</h5><input type="hidden" name="subtotales" id="subtotales">
                              </th>
                            </tfoot>

                            <tfoot id="ft_sv">
                              <th colspan="4"></th>
                              <th style="width:100px;"></th>
                              <th style="width:140px;"><input type="number" class="form-control input-sm" name="tasasv" id="tasasv" onchange="CalcularImpuestoSV()" onkeyup="CalcularImpuestoSV()"></th>
                              <th style="width:45px;">% de</th>
                              <th style="width:140px;"><input class="form-control input-sm prec" type="text" name="valor_sv" id="valor_sv" onchange="CalcularImpuestoSV()" onkeyup="CalcularImpuestoSV()"></th>
                              <th style="width:140px;">IMP. S/V</th>
                              <th style="width:200px;"><input class="form-control input-sm prec" type="text" name="impuestosv" id="impuestosv" value="0.00" readonly></th>
                            </tfoot>

                            <tfoot id="ft_imp">
                              <th colspan="4"></th>
                              <th></th>
                              <th><input class="form-control input-sm" type="text" name="tasaimpuesto" id="tasaimpuesto" onchange="CalcularImpuestosimple()" onkeyup="CalcularImpuestosimple()"></th>
                              <th>% de</th>
                              <th><input class="form-control input-sm prec" type="text" name="valor_impuesto" id="valor_impuesto" onchange="CalcularImpuestosimple()" onkeyup="CalcularImpuestosimple()"></th>
                              <th>IMPUESTO</th>
                              <th><input type="text" class="form-control input-sm prec" name="impuesto" id="impuesto" placeholder="Ingrese el impuesto" value="0.00" readonly></th>
                            </tfoot>

                            <tfoot>
                              <th colspan="4"></th>
                              <th>
                              </th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>TOTAL</th>
                              <th><h5 id="montototal">L. 0.00</h5><input type="hidden" name="monto_total" id="monto_total"></th>
                            </tfoot>



                            <tfoot id="ft_isv">
                              <th colspan="4"></th>
                              <th></th>
                              <th><input class="form-control input-sm" type="text" name="tasaretencionisv" id="tasaretencionisv" onchange="CalcularImpuestoISV()" onkeyup="CalcularImpuestoISV()" ></th>
                              <th>% de</th>
                              <th><input class="form-control input-sm prec" type="text" name="valor_isv" id="valor_isv" onchange="CalcularImpuestoISV()" onkeyup="CalcularImpuestoISV()" ></th>
                              <th>RETENCION ISV</th>
                              <th><input type="text" class="form-control input-sm prec" name="retencionisv" id="retencionisv" placeholder="Ingrese el impuesto" value="0.00" readonly></th>
                            </tfoot>


                            <tfoot id="ft_isr">
                              <th colspan="4"></th>
                              <th></th>
                              <th><input class="form-control input-sm" type="text" name="tasaretencionisr" id="tasaretencionisr" onchange="CalcularImpuestoISR()" onkeyup="CalcularImpuestoISR()"></th>
                              <th>% de</th>
                              <th><input class="form-control input-sm prec" type="text" name="valor_isr" id="valor_isr" onchange="CalcularImpuestoISR()" onkeyup="CalcularImpuestoISR()"></th>
                              <th>RETENCION ISR</th>
                              <th><input type="text" class="form-control input-sm prec" name="retencionisr" id="retencionisr" placeholder="Ingrese el impuesto" value="0.00" readonly></th>
                            </tfoot>

                        </table>




                        </div>

                        <div id="table_invoce" style="display:none;" class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                          <p class="lead">Cálculos</p>
                           <div class="table-responsive">
                              <table class="table">

                                    <tbody>

                                    <tr>
                                      <th style="width:40%">Subtotal:</th>
                                      <td id="showsubtotal">L. 0.00</td>
                                    </tr>


                                    <tr>
                                      <th>Total:</th>
                                      <td id="showtotal">L. 0.00</td>
                                    </tr>

                                    <tr>
                                      <th>Total Neto:</th>
                                      <td id="showtotalneto">L. 0.00</td>
                                    </tr>

                                  </tbody>

                            </table>
                            </div>
                        </div>

                        <div id="buttonsordens" style="padding-top: 30px;" class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

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
                        <label class="control-label" for="creditos">Creditos</label>
                        <input type="text" class="form-control input-sm" form="formulario" style="text-transform: uppercase;" id="creditos" name="creditos" placeholder="Ingresa Creditos">
                      </div>
                    </div>
                    <hr>
                    <div class="row container">
                      <div class="form-group  col-md-4">
                        <a type="button" id="changetab" onclick='$("#tabprincipal").trigger("click")'> <i style="font-size:35px;" class="fas fa-arrow-alt-circle-left"></i> <span style="position: absolute; margin-top: 8px; margin-left: 3px;">
                            Regresa</span></a>
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

  <div class="modal-dialog" style="">
    <div class="modal-content">

      <div class="modal-header" style="background:#3c8dbc; color:white">


        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        <h4 class="modal-title" style="text-align: center;">AGREGAR RENGLON PRESUPUESTARIO</h4>

      </div>

      <div class="modal-body">
        <table id="tblpresupuesto_disponible" class="table table-striped table-bordered table-condensed table-hover responsive" width="100%">
          <thead>
            <th>Opciones</th>
            <th>Nombre Objeto</th>
            <th>Código</th>
            <th>Presupuesto Anual</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <th>Opciones</th>
            <th>Nombre Objeto</th>
            <th>Código</th>
            <th>Presupuesto Anual</th>
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
<link rel="stylesheet" href="../public/css/cssforordens.css">
<?php
}
ob_end_flush();
?>
