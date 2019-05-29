$line = array("OJB"=> "$regd->codigo",
              "UNIDAD"=> utf8_decode("$regd->unidad"),
              "CANTIDAD"=> "$regd->cantidad",

              "DESCRIPCION" => utf8_decode("$regd->descripcion"),

              "P.UNIT"=> number_format("$regd->precio_unitario", 2, '.', ','),
              "S/TOTAL"=> number_format("$regd->subtot", 2, '.', ','),
              "TOTAL"=> number_format("", 2, '.', ','));




              de orden compra:

              $line = array( "Cod"=> "$regd->cod",
                            "Unidad"=> utf8_decode("$regd->uni"),
                            "Cantidad"=> "$regd->cant",
                            "Descripcion" => utf8_decode("$regd->descripcion"),
                            "P.Unitario"=> number_format("$regd->precu", 2, '.', ','),
                            "SubTotal"=> number_format("$regd->subtot", 2, '.', ','),
                            "Total"=> number_format("$regd->total", 2, '.', ','));
