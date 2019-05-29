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
            Crear Acuerdos y Fondos Rotatorios
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Acuerdos</li>
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
<!--                             <th>Usuario</th> -->
                            <th>Tipo Documento</th>
                            <th>No.Documento</th>
                            <th>No.Comprobante</th>
                            <th>Paguese A:</th>
                            <th>Total</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Fecha</th>
<!--                             <th>Usuario</th> -->
                            <th>Tipo Documento</th>
                            <th>No.Documento</th>
                            <th>No.Comprobante</th>
                            <th>Paguese A:</th>
                            <th>Total</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Fecha(*):</label>
                             <input type="hidden" name="idcrear_acuerdo" id="idcrear_acuerdo">
                             <input type="date" class="form-control input-sm" name="fecha_hora" id="fecha_hora" required="">
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Tipo Documento(*):</label>
                            <select class="form-control selectpicker" name="tipo_documento" id="tipo_documento" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Documento" required>
                              <option value="Acuerdo">Acuerdo</option>
                              <option value="Fondo Reintegrable">Fondo Reintegrable</option>
                              <option value="Fondo Rotatorio">Fondo Rotatorio</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>No. Documento(*):</label>
                            <input type="text" class="form-control input-sm" name="numdocumento" id="numdocumento" maxlength="25" placeholder="Igrese el numero de Acuerdo" required="">
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>No. Comprobante(*):</label>
                            <input type="text" class="form-control input-sm" name="numcomprobante" id="numcomprobante" maxlength="25" placeholder="Número" required="">
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Paguese A.(*):</label>
                            <select id="idproveedores" name="idproveedores" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige un Proovedor"></select>
                          </div>


                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Unidad(*):</label>
                            <select id="idprograma" name="idprograma" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" data-title="Elige una Unidad"></select>
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
                                    <th>Valor</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">L. 0.00</h4><input type="hidden" name="total_importe" id="total_importe" step"0.01">
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
  <div class="modal-dialog" style="width: 50% !important;">
    <div class="modal-content">

      <div class="modal-header" style="background:#3c8dbc; color:white">


         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <h4 class="modal-title" style="text-align: center;">AGREGAR RENGLON PRESUPUESTARIO</h4>

        </div>

      <div class="modal-body">
        <table id="tblpresupuesto_disponible" class="table table-striped table-bordered table-condensed table-hover" width="100%">
          <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Nombre Objeto</th>
              <th>Código</th>
              <th>Fondos Disponibles</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <thead style="background-color:#d2d6de">
              <th>Opciones</th>
               <th>Nombre Objeto</th>
              <th>Código</th>
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
<script type="text/javascript" src="scripts/crear_acuerdo.js"></script>
<?php
}
ob_end_flush();
?>
