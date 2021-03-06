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
            Administrar Transferencias del Banco Central
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Transferencias BCH</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> <a href="../reportes/rptarticulos.php" target="_blank"><button class="btn btn-info">Reporte</button></a></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                          <thead style="background-color:#d2d6de">

                            <th width="143px !important;">Opciones</th>
                            <th width="70px !important;">Fecha</th>
                            <th>Tipo Transferencia</th>
                            <th>Proveedor</th>
                            <th>No. Transferencia</th>
                            <th>Monto Pagado</th>
                            <th>Estado</th>

                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot style="background-color:#d2d6de">
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Tipo Transferencia</th>
                            <th>Proveedor</th>
                            <th>No. Transferencia</th>
                            <th>Monto Pagado</th>
                            <th>Estado</th>
                            </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">

                            <label>Fecha:(*):</label>
                            <input type="hidden" name="idtransferenciabch" id="idtransferenciabch">
                             <input type="date" class="form-control input-sm" name="fecha_hora" id="fecha_hora" required="">
                          </div>

                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Tipo Transferencia(*):</label>
                            <select class="form-control selectpicker" name="tipo_transfbch" id="tipo_transfbch" data-style="btn-default btn-sm" data-title="Elige el Tipo de Transferencia" required>
                              <option value="Transf/Terceros">Transf/Terceros</option>
                              <option value="Transf/Cuentas">Transf/Cuentas</option>
                            </select>
                          </div>

                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Serie:</label>
                            <input type="text" class="form-control input-sm" name="serie_transf" id="serie_transf" maxlength="12" placeholder="Serie">
                          </div>


                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <label>Numero de Transferencia:(*):</label>
                          <input type="text" class="form-control input-sm" name="num_transf" id="num_transf" maxlength="50" placeholder="Ingrese el No. de Transferencia" required>
                          </div>


                          <div style="padding-right: 0px; padding-left: 0px;" class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-lg-6">
                              <label>Nombre Cta Debitar:(*):</label>
                              <select id="idctasbancarias" name="idctasbancarias" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" title="Elegir un cuenta" required></select>
                            </div>
                            <div class="form-group col-lg-6">
                              <label>Casa Comercial:</label>
                              <select id="idproveedores" name="idproveedores" class="form-control selectpicker" data-live-search="true" data-style="btn-default btn-sm" required></select>
                            </div>
                          </div>

                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Monto a Pagar(*):</label>
                            <input type="text" class="form-control input-sm" onchange="verpres()" onkeyup="verpres()" onblur="onInputBlur(event)" onfocus="onInputFocus(event)" name="monto_acreditar" id="monto_acreditar" required>
                          </div>

                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <label>Sinopsis(*):</label>
                           <textarea class="form-control  col-lg-5" rows="3" id="descripcion" name="descripcion"placeholder="Descripcion" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$"></textarea>
                           </div>

                           </h1>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>


                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>

                      </div><!--Fin centro -->
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
<script type="text/javascript" src="scripts/transferenciabch.js"></script>
<?php
}
ob_end_flush();
?>
