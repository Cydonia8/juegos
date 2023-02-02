<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
    <?php
    require_once "funciones.php";
        
        echo "<article class=\"plataforma\">";
        for($i= 0;$i<count($datos_ps5);$i++){
            echo "<div class=\"juego\">
                    <div>
                        <img src=\"".adecuar_ruta_foto($datos_ps5[$i]['caratula'])."\">
                    </div>
                    <h3>".$datos_ps5[$i]['juego']."</h3>
                    <h3>".$datos_ps5[$i]['fecha']."</h3>
                  </div>";
        }
        echo "</article>";

        echo "<article class=\"plataforma\">";
        for($i= 0;$i<count($datos_switch);$i++){
            echo "<div class=\"juego\">
                    <div>
                        <img src=\"".adecuar_ruta_foto($datos_switch[$i]['caratula'])."\">
                    </div>
                    <h3>".$datos_switch[$i]['juego']."</h3>
                    <h3>".$datos_switch[$i]['fecha']."</h3>
                  </div>";
        }
        echo "</article>";

        
        echo "<article class=\"plataforma\">";
        for($i= 0;$i<count($datos_xbox);$i++){
            echo "<div class=\"juego\">
                    <div>
                        <img src=\"".adecuar_ruta_foto($datos_xbox[$i]['caratula'])."\">
                    </div>
                    <h3>".$datos_xbox[$i]['juego']."</h3>
                    <h3>".$datos_xbox[$i]['fecha']."</h3>
                  </div>";
        }
        echo "</article>";

        echo "<article class=\"plataforma\">";
        for($i= 0;$i<count($datos_ps2);$i++){
            echo "<div class=\"juego\">
                    <div>
                        <img src=\"".adecuar_ruta_foto($datos_ps2[$i]['caratula'])."\">
                    </div>
                    <h3>".$datos_ps2[$i]['juego']."</h3>
                    <h3>".$datos_ps2[$i]['fecha']."</h3>
                  </div>";
        }
        echo "</article>";

       
    ?>
<!-- </body>
</html> -->
