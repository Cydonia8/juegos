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
        // $current_plataforma;
        // foreach($datos as $pos=>$juego){
        //     $current_plataforma = $datos[$pos]["plataforma"];
        //     if($pos > 0){
        //         if($current_plataforma != $datos[$pos-1]["plataforma"]){
        //             echo "<div class=\"plataforma row\"><h2>Últimos juegos de ".$current_plataforma."</h2><div class=\"contenedor-flex row\">";
        //         }
        //     }else{
        //         echo "<div class=\"plataforma row\"><h2>Juegos de ".$current_plataforma."</h2><div class=\"contenedor-flex row\">";
        //     }
        //     echo "<div class=\"juego col-12 col-md-6 col-lg-3\">
        //         <img src=\"".adecuar_ruta_foto($datos[$pos]['caratula'])."\">
        //         <h4>".$datos[$pos]["juego"]."</h4>
        //         <h5>".formatearFecha($datos[$pos]["fecha"])."</h5>
        //     </div>";
        //     // crearCarrousel($juegos);
        //     // echo $juegos[$pos]["juego"];
        //     // echo '<img src="'.$juegos[$pos]['foto'].'">';
        //     if($pos > 0 and $pos < sizeof($datos)-1){
        //         if($current_plataforma != $datos[$pos+1]["plataforma"]){
        //             echo "</div></div>";
        //         }
        //     }
        // }
        // echo "</div></div>";
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
