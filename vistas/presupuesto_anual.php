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
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content-header">
          <h1> 
            Administrar Presupuesto Anual
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Presupuesto Anual</li>
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

                            <th>Nombre Objeto</th>
                             <th>Codigo</th>                           
                            <th>Monto Aprobado</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre Objeto</th>
                            <th>Codigo</th>
                            <th>Monto Aprobado</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre Objeto:</label>
                            <input type="hidden" name="idpresupuesto_anual" id="idpresupuesto_anual">
                            <input type="text" class="form-control" name="nombre_objeto" id="nombre_objeto" maxlength="100" placeholder="Nombre">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="45" placeholder="Codigo" required>
                          </div>


                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Monto Aprobado:</label>
                            <input type="text" class="form-control" name="monto_aprobado" id="monto_aprobado" maxlength="256" placeholder="Descripción">
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
<script type="text/javascript" src="scripts/presupuesto_anual.js"></script>
<?php 
}
ob_end_flush();
?>