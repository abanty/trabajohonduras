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
  require_once "../modelos/Consultas_graficos.php";
?>

      <div class="content-wrapper">
      </div>
    </body>
  </div>

<?php
}
else
{

}
?>
<?php
}
ob_end_flush();
?>
