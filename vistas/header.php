<?php
if (strlen(session_id()) < 1)
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISTEMA CONTABLE</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <link rel="stylesheet" href="../public/fontawesome5/css/all.css">
    <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="stylesheet" href="../public/css/spinner.css">
    <!-- Waves Effect Css -->
    <link href="../public/css/waves.css" rel="stylesheet" />


    <link rel="stylesheet" href="../public/css/ionicons.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/apple-touch-icon.png">
    <link rel="stylesheet" type="text/css" href="../public/css/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet"/>
    <!-- ../public/datatables/responsive.dataTables.min.css -->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../public/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/datatables.net-bs/css/dataTables.bootstrap.min.css">

  </head>
   <div id="preloader" style="display:none;">
      <div class="spinner">
        <div class="spinner-circle spinner-circle-outer"></div>
        <div class="spinner-circle-off spinner-circle-inner"></div>
        <div class="spinner-circle spinner-circle-single-1"></div>
        <div class="spinner-circle spinner-circle-single-2"></div>
        <div class="text">Insertando datos...</div>
      </div>
    </div>
  <!-- <div id="preloader">
    <center>
    <div class="load">

    </div>
    <h5 style="color:#fff;">Insertando datos ...</h5>
    </center>
  </div> -->


  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

<!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
          <img src="img/plantilla/icono-blanco.png" class="img-responsive" style="padding:10px">
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <img src="img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding:10px 0px">

          </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                    <p>
                      Analista Financiero

                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <head>
  <script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js" integrity="sha384-R5JkiUweZpJjELPWqttAYmYM1P3SNEJRM6ecTQF05pFFtxmCO+Y1CiUhvuDzgSVZ" crossorigin="anonymous"></script>

</head>

      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php
            if ($_SESSION['escritorio']==1)
            {
              echo '<li>
              <a href="escritorio.php">
                <i class="fas fa-desktop fa-lg"></i> <span>Escritorio</span>
              </a>
            </li>';
            }
            ?>


           <?php
            if ($_SESSION['compromisosp']==1)
            {
              echo '<li class="treeview">
            <a href="#" class="wawes-effect active">

              <i class="fas fa-grip-vertical fa-lg"></i><span> Compromisos Pendientes</span>

                <i class="fal fa-angle-left pull-right"></i>
              </span>
            </a>

               <ul class="treeview-menu">
              <li><a href="compromisos.php"><i class="far fa-dot-circle text-blue"></i>Compromisos</a></li>
              <li><a href="compromisosfecha.php"><i class="far fa-dot-circle text-blue"></i>Consulta Compromisos</a></li>
              <li><a href="reportes.php"><i class="far fa-dot-circle text-blue"></i>Reportes</a></li>


            </ul>


            </li>';
          }
          ?>

          <?php
            if ($_SESSION['admonoc']==1)
            {
              echo



            '<li class="treeview">
            <a href="#">
              <i class="fas fa-folder-open fa-lg"></i> <span>ADMON O/C</span>

                <i class="fal fa-angle-left pull-right"></i>
              </span>
            </a>

               <ul class="treeview-menu">
               <li><a href="administrar_ordenes.php"><i class="far fa-dot-circle text-blue"></i>Administrar Ordenes</a></li>
              <li><a href="crear_acuerdo.php"><i class="far fa-dot-circle text-blue"></i>Crear Acuerdo</a></li>
              <li><a href="comprobante-pago"><i class="far fa-dot-circle text-blue"></i>Cotizaciones</a></li>
              <li><a href="cotizacion"><i class="far fa-dot-circle text-blue"></i>Reportes</a></li>


            </ul>


            </li>';
          }
          ?>

          <?php
            if ($_SESSION['transferenciabch']==1)
            {
              echo'


            <li class="treeview">
            <a href="#">
              <i class="fas fa-donate fa-lg"></i> <span>Transferencia BCH</span>

                <i class="fal fa-angle-left pull-right"></i>
              </span>
            </a>

               <ul class="treeview-menu">
              <li><a href="transferenciabch.php"><i class="far fa-dot-circle text-blue"></i>Crear Transferencia</a></li>
              <li><a href="nuevatransfbch.php"><i class="far fa-dot-circle text-blue"></i>Reportes</a></li>

            </ul>


            </li>';
          }
          ?>

          <?php
            if ($_SESSION['contabilidad']==1)
            {
              echo'

           <li class="treeview">
            <a href="#">
              <i class="fa fa-database fa-lg" aria-hidden="true"></i> <span>Contabilidad</span>

              <i class="fal fa-angle-left pull-right"></i>
              </span>
            </a>

               <ul class="treeview-menu">
              <li><a href="sgralcta.php"><i class="far fa-dot-circle text-blue"></i>S.Gral.Ctas</a></li>
              <li><a href="consolidadog.php"><i class="far fa-dot-circle text-blue"></i>Consolidado General</a></li>
              <li><a href="modulo3"><i class="far fa-dot-circle text-blue"></i>Modulo 3</a></li>
              <li><a href="modulo4"><i class="far fa-dot-circle text-blue"></i>Modulo 4</a></li>

            </ul>


            </li>';
          }
          ?>

          <?php
            if ($_SESSION['siafi']==1)
            {
              echo'
           <li class="treeview">
             <a href="#">
              <i class="fab fa-buromobelexperte fa-lg"></i>
              <span>SIAFI</span>

                <i class="fal fa-angle-left pull-right"></i>
              </span>
            </a>


               <ul class="treeview-menu">
              <li><a href="presupuesto_disponible.php"><i class="far fa-dot-circle text-blue"></i>Presupuesto Disponible</a></li>
              <li><a href="ingreso.php"><i class="far fa-dot-circle text-blue"></i>Ingreso</a></li>
              <li><a href="transferidoctaspg.php"><i class="far fa-dot-circle text-blue"></i>Transferido BCH</a></li>

            </ul>


            </li>';
          }
          ?>

          <?php
            if ($_SESSION['documentosr']==1)
            {
              echo'

          <li class="treeview">
          <a href="">
            <i class="fas fa-folder-plus fa-lg" aria-hidden="true"></i> <span>Documentos</span>

            <i class="fal fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="retenciones.php"><i class="far fa-dot-circle text-red"></i>Crear Retencion</a></li>
            <li><a href="reporte.php"><i class="far fa-dot-circle text-red"></i>Reporte</a></li>


          </ul>

        </li>';
      }
      ?>

      <?php
            if ($_SESSION['reportesc']==1)
            {
              echo'

         <li class="treeview">
          <a href="">
            <i class="far fa-chart-bar fa-lg"></i> <span>Reportes Compromisos</span>

            <i class="fal fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="reporte_general"><i class="far fa-dot-circle text-blue"></i> Reporte General</a></li>

            <li><a href="reporte_objeto"><i class="far fa-dot-circle text-blue"></i> Reporte OBJ.Gasto</a></li>

            <li><a href="reporte_unidades"><i class="far fa-dot-circle text-blue"></i> Reporte Por Unidades</a></li>

            <li><a href="reporte_siafi"><i class="far fa-dot-circle text-blue"></i> Reporte SIAFI</a></li>
          </ul>

          </li>';
        }
        ?>

        <?php
            if ($_SESSION['configuraciones']==1)
            {
              echo'


          <li class="treeview">
            <a href="#">
              <i class="fas fa-cogs fa-lg"></i> <span>Configuraciones</span>

              <i class="fal fa-angle-left pull-right"></i>
              </span>
            </a>
              <ul class="treeview-menu">
              <li><a href="proveedores.php"><i class="far fa-dot-circle text-blue"></i> Proveedores</a></li>
              <li><a href="bancos.php"><i class="far fa-dot-circle text-blue"></i>Bancos</a></li>
              <li><a href="programa.php"><i class="far fa-dot-circle text-blue"></i>Cargar Programa</a></li>
              <li><a href="configuracion.php"><i class="far fa-dot-circle text-blue"></i>configuracion</a></li>
              <li><a href="ctasbancarias.php"><i class="far fa-dot-circle text-blue"></i>Cuentas Bancarias PG</a></li>
              <li><a href="categoria.php"><i class="far fa-dot-circle text-blue"></i>Objetos Gasto</a></li>

            </ul>


            </li>';
          }
          ?>


            <?php
            if ($_SESSION['acceso']==1)
            {
              echo '          <li class="treeview">
            <a href="#">
              <i class="fas fa-unlock fa-lg"></i> <span>Acceso</span>
                <i class="fal fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="usuario.php"><i class="far fa-dot-circle text-blue"></i> Usuarios</a></li>
              <li><a href="permiso.php"><i class="far fa-dot-circle text-blue"></i>Permisos</a></li>
              </ul>
          </li>';
            }
            ?>
            <li>
              <a href="#">
                <i class="fa fa-plus-square fa-lg"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle fa-lg"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
