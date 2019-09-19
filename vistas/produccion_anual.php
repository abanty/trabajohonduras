<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
} else {
    require 'header.php';
    if ($_SESSION['siafi']==1) {
        ?>
<style media="screen">
form#formulario .help-block {
    margin-bottom: -5px !important;
    color: #dd4b39 !important;
    font-size: 12px !important;
}
</style>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Administrar Plantilla de Productos Terminales
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Productos Terminales</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary box-solid">
                      <div class="box-header with-border">
                            <h1 class="box-title"><button class="btn btn-default" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Registra Presupuesto</button></h1>
                            <h3 class="box-title mytext"><i class="fas fa-chalkboard-teacher"></i> Formulario Productos Terminales</h3>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                        <div class="panel-body table-responsive" id="listadoregistros">
                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                              <thead style="background-color:#d2d6de">
                                <th>Opciones</th>
                                <th>Indicativo</th>
                                <th>Nombre Producto</th>
                                <th>Tipo Producto</th>
                                <th>Primario/No Primario</th>
                                <th>Periodicidad</th>
                                <th>Estado</th>
                              </thead>
                              <tbody>
                            </table>
                        </div>
                        <div class="panel-body" id="formularioregistros" style="padding: 5px 15px 15px 15px !important;">
                          <form name="formulario" id="formulario" method="POST">
                            <div class="box-body">

                              <div class="row">

                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <label>Indicativo(*):</label>
                                  <?php
                                    include ('../include/indicativo.php');
                                  ?>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <label>Tipo Producto(*):</label>
                                  <?php
                                    include ('../include/selectipo_producto.php');
                                  ?>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <label>Primario/No Primario(*):</label>
                                  <?php
                                    include ('../include/selecprimario.php');
                                  ?>
                                </div>

                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                  <label>Periodicidad(*):</label>
                                  <?php
                                    include ('../include/periodicidad.php');
                                  ?>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                  <label>Nombre Producto(*):</label>
                                 <textarea class="form-control  col-lg-5" rows="3" id="nombre_producto" name="nombre_producto"placeholder="Escriba el Nombre del Producto" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$"></textarea>
                                 </div>
                             </div>

                            </div>
                            <div class="box-footer">
                              <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                          </form>
                    </div>
                      </div>
                  </div>
              </div>
           </div>
        </section>
    </div>
<?php
    } else {
        require 'noacceso.php';
    }
    require 'footer.php'; ?>
<script type="text/javascript" src="scripts/produccion_anual.js"></script>
<?php
}
ob_end_flush();
?>
