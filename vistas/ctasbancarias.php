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

if ($_SESSION['configuraciones']==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content-header">
          <h1> 
            Administrar Cuentas Bancarias PGFNH
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Cuentas Bancarias PGFNH</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                  <div class="box box-success">
                    <div class="box-header with-border">
                          <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                          <thead style="background-color:#3c8dbc">
                            <th>Opciones</th>
                            <th>Nombre Cuenta</th>
                            <th>Nombre Banco</th>
                            <th>Tipo Cuenta</th>
                            <th>Numero cuenta</th> 
                            <th>Fondos Disponibles</th>                           
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre Cuenta</th>
                            <th>Nombre Banco</th>
                            <th>Tipo Cuenta</th>
                            <th>Numero cuenta</th>
                             <th>Fondos Disponibles</th>                              
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre Cuenta:</label>
                            <input type="hidden" name="idctasbancarias" id="idctasbancarias">
                            <input type="text" class="form-control" name="cuentapg" id="cuentapg" maxlength="50" placeholder="cuentapg" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre Banco:</label>
                            <input type="text" class="form-control" name="bancopg" id="bancopg" maxlength="256" placeholder="Nombre">
                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Cuenta:</label>
                            <input type="text" class="form-control" name="tipoctapg" id="tipoctapg" maxlength="50" placeholder="tipo" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Numero Cuenta:</label>
                            <input type="text" class="form-control" name="numctapg" id="numctapg" maxlength="256" placeholder="Numero de cuenta">
                          </div> 
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fondos Disponibles:</label>
                            <input type="text" step="0.01" class="form-control" name="fondos_disponibles" id="fondos_disponibles" maxlength="256" placeholder="Ingrese Presupuesto">
                          </div> 

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/ctasbancarias.js"></script>
<?php 
}
ob_end_flush();
?>
