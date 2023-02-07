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
        
        echo "<article class=\"plataforma row\"><h2 class=\"text-left\">Últimos juegos de PS5</h2>";
        for($i= 0;$i<count($datos_ps5);$i++){
            echo "<div class=\"juego col-12 col-md-6 col-lg-3\">
                    <div class=\"d-flex justify-content-center\">
                        <img src=\"".adecuar_ruta_foto($datos_ps5[$i]['caratula'])."\">
                    </div>
                    <div>
                    <h4 class=\"text-center\">".$datos_ps5[$i]['juego']."</h4>
                    <h5 class=\"text-center\">".$datos_ps5[$i]['fecha']."</h5>
                    </div>
                  </div>";
        }
        echo "</article>";

        echo "<article class=\"plataforma row\"><h2 class=\"text-left\">Últimos juegos de Switch</h2>";
        for($i= 0;$i<count($datos_switch);$i++){
            echo "<div class=\"juego col-12 col-md-6 col-lg-3\">
                    <div class=\"d-flex justify-content-center\">
                        <img src=\"".adecuar_ruta_foto($datos_switch[$i]['caratula'])."\">
                    </div>
                    <h4 class=\"text-center\">".$datos_switch[$i]['juego']."</h4>
                    <h5 class=\"text-center\">".$datos_switch[$i]['fecha']."</h5>
                  </div>";
        }
        echo "</article>";

        
        echo "<article class=\"plataforma row\"><h2 class=\"text-left\">Últimos juegos de Xbox Series X</h2>";
        for($i= 0;$i<count($datos_xbox);$i++){
            echo "<div class=\"juego col-12 col-md-6 col-lg-3\">
                    <div class=\"d-flex justify-content-center\">
                        <img src=\"".adecuar_ruta_foto($datos_xbox[$i]['caratula'])."\">
                    </div>
                    <h4 class=\"text-center\">".$datos_xbox[$i]['juego']."</h4>
                    <h5 class=\"text-center\">".$datos_xbox[$i]['fecha']."</h5>
                  </div>";
        }
        echo "</article>";

        echo "<article class=\"plataforma row\"><h2 class=\"text-left\">Últimos juegos de PS2</h2>";
        for($i= 0;$i<count($datos_ps2);$i++){
            echo "<div class=\"juego col-12 col-md-6 col-lg-3\">
                    <div class=\"d-flex justify-content-center\">
                        <img src=\"".adecuar_ruta_foto($datos_ps2[$i]['caratula'])."\">
                    </div>
                    <h4 class=\"text-center\">".$datos_ps2[$i]['juego']."</h4>
                    <h5 class=\"text-center\">".$datos_ps2[$i]['fecha']."</h5>
                  </div>";
        }
        echo "</article>";

       
    ?>
