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
            Crear Retencionen de Impuesto
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Retenciones</li>
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
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="font-size:12.5px;">
                          <thead style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Proveedor</th>
                            <th>RTN</th>
                            <th>No.Documento</th>
                            <th>Fecha</th>
                            <th>Tipo Impuesto</th>
                            <th>Descripcion</th>
                            <th>Base Retencion</th>
                            <th>Imp Retenido</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Proveedor</th>
                            <th>RTN</th>
                            <th>No.Documento</th>
                            <th>Fecha</th>
                            <th>Tipo Impuesto</th>
                            <th>Descripcion</th>
                            <th>Base Retencion</th>
                            <th>Imp Retenido</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">

                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Proveedor(*):</label>
                             <input type="hidden" name="idretenciones" id="idretenciones">
                             <select id="idproveedores" name="idproveedores" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Proovedor"></select>
                           </div>

                           <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                             <label>RTN(*):</label>
                             <input type="text" class="form-control input-sm" name="rtn" id="rtn" maxlength="25" placeholder="Igrese el RTN" required="">
                           </div>

                           <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                             <label>No. Documento(*):</label>
                             <input type="text" class="form-control input-sm" name="numdocumento" id="numdocumento" maxlength="25" placeholder="Igrese el numero de Documento" required="">
                           </div>

                           <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                             <label>Fecha(*):</label>
                             <input type="date" class="form-control input-sm" name="fecha_hora" id="fecha_hora" required="">
                           </div>

                           <div id="tipo_impuesto_div" class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                             <label>Tipo impuesto(*):</label>
                             <select class="form-control selectpicker" onchange="modificarSubototales()" onkeyup="modificarSubototales()" name="tipo_impuesto" id="tipo_impuesto" data-style="btn-default btn-sm" data-title="Elige Impuesto">
                               <option value="0.15">ISV(15%)</option>
                               <option value="0.125">ISR(12.5%)</option>
                             </select>
                           </div>


                           <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <label>Descripcion:</label>
                             <textarea class="form-control input-sm" name="descripcion" id="descripcion" placeholder="Ingresa una descripción..." rows="4" cols="250"></textarea>
                           </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a data-toggle="modal" href="#myModal">
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fas fa-cart-plus"></span> Agregar Factura</button>
                            </a>
                          </div>


                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 thisisdiv">


                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                          <thead style="background-color:#d2d6de">
                              <th>Opciones</th>
                              <th>N. Facturas</th>
                              <th>Valor Base</th>
                              <th>Subtotal</th>
                          </thead>
                          <tbody>
                          </tbody>


                              <tfoot>
                                <th colspan="2"></th>
                                <th>TOTAL</th>
                                <th>
                                  <h4 id="montototal">L. 0.00</h4><input type="hidden" name="total_oc" id="total_oc">
                                </th>
                              </tfoot>


                              <tfoot>
                                <th colspan="2"></th>
                                <th>BASE IMPONIBLE</th>
                                <th>
                                  <h4 id="sub_total">L. 0.00</h4><input type="hidden" name="base_imponible" id="base_imponible">
                                </th>
                              </tfoot>

                              <tfoot>
                                <th colspan="2"></th>
                                <th>IMPUESTO RETENIDO</th>
                                <th><input type="number" step=".01" class="form-control input-sm" name="imp_retenido" id="imp_retenido" maxlength="45" placeholder="Ingrese el impuesto" readonly></th>
                              </tfoot>

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
  <div class="modal-dialog" style="width: 50% !important;">
    <div class="modal-content">

      <div class="modal-header" style="background:#3c8dbc; color:white">


         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title" style="text-align: center;">AGREGAR FACTURA</h4>

        </div>

      <div class="modal-body">
        <table id="tblcompromisos" class="table table-striped table-bordered table-condensed table-hover" width="100%">
          <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Proveedor</th>
              <th>No. Factura</th>
              <th>Total Compra</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Proveedor</th>
              <th>No. Factura</th>
              <th>Total Compra</th>
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
<script type="text/javascript" src="scripts/retenciones.js"></script>
<?php
}
ob_end_flush();
?>
