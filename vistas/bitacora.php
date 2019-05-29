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
            Bitacora
          </h1>
          <ol class="breadcrumb">
            <li><a href="escritorio.php"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
            <li class="active">Administrar Bitacora</li>
          </ol>
        </section>
        <section class="content">
<div class="row">
    <div id="ventana_Banco" title="Bitacora de eventos">
        <div class="row">


            <div class="form-group has-feedback  col-md-2">
                <label class="control-label" for="fechaaud1">Fecha de inicio <span>*</span></label>
                <input
                        onchange="evaluarComboAud($('#tipoAuditoria').val(),$('#fechaaud1').val(),$('#fechat2').val()); return null;"
                        required type="text" id="fechaaud1"
                        pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"
                        name="fechaaud1"
                        class="form-control">
            </div>

            <div class="form-group has-feedback  col-md-2">
                <label class="control-label" for="fechaaud2">Fecha de fin <span>*</span></label>
                <input
                        onchange="evaluarComboAud($('#tipoAuditoria').val(),$('#fechaaud1').val(),$('#fechaaud2').val()); return null;"
                        required type="text" id="fechaaud2"
                        pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"
                        name="fechaaud2"
                        class="form-control">
            </div>

            <div class="form-group has-feedback col-md-3"> <!--has-success-->
                <label class="control-label" for="tipoAuditoria">Tipo de registros</label>
                <select id="tipoAuditoria" class="form-control"
                        onchange="MostrarRegistrosAuditoria($('#tipoAuditoria').val(),$('#fechaaud1').val(),$('#fechaaud2').val()); return null;">
                    <option value=""> --</option>
                    <option value="Todos">TODOS</option>
                    <option value="Creacion">CREACIÓN</option>
                    <option value="Guardar">GUARDAR</option>
                    <option value="Descarga">DESCARGAS</option>
                    <option value="Actualizacion">ACTUALIZACIÓN</option>
                    <option value="Eliminacion">ELIMINACIÓN</option>
                    <option value="Login">ACCESO</option>
                </select>
            </div>
        </div>

        <div style="padding-top: 30px; margin-left: 20px;margin-right: 20px;" class="row table-responsive">
            <table id="tablaAuditoria" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Accion</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Usuario</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>

<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>
<script type="text/javascript" src=""></script>
<?php 
}
ob_end_flush();
?>


