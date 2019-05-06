// $line3 = array( "Grupo"=> "$regd3->grupo",
//               "Subgrupo"=> "$regd3->subgrupo",
//               "No. Objeto"=> "$regd3->codigo",
//               "INTERIORES"=> number_format("$regd3->subtot", 2, '.', ','),
//
//               );

          // $size3 = $pdf->addLine3( $y3, $line3 );
          // $y3   += $size3 + 0;






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






          <?php
          }
          else
          {
            require 'noacceso.php';
          }

          require 'footer.php';
          ?>
          <script type="text/javascript" src="scripts/administrar_ordenes.js"></script>

          <?php
          }
          ob_end_flush();
          ?>
