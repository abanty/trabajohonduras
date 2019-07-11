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

if ($_SESSION['escritorio']==1)
{
  require_once "../modelos/Administrar_ordenes.php";
  //
  // $consultas_compromisos = new Consultas_compromisos();
  // $rsptac = $consultas_compromisos->totalcompromisoshoy();
  // $regc=$rsptac->fetch_object();
  // $totalc=$regc->total_compra;
  //
  // $rsptav = $consultas_compromisos->totalctasbancariashoy();
  // $regv=$rsptav->fetch_object();
  // $totalv=$regv->fondos_disponibles;
  //
  // $rsptab = $consultas_compromisos->totaladministrar_ordeneshoy();
  // $regb=$rsptab->fetch_object();
  // $totalb=$regb->total_neto;

?>

      <div class="content-wrapper">

      </div>
    </div>
</body>

<?php
}
else
{
  require 'noacceso.php';
}

?>

</div>

  </body>
<?php
}
ob_end_flush();
?>
