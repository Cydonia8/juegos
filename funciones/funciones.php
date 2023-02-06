<?php
    function menuEstandar(){
        echo "<header>
                <nav>
                    <ul>
                        <li><a href=\"index.php\">Inicio</a></li>
                        <li><a href=\"juegos.php\">Juegos</a></li>
                        <li><a href=\"juegos.php\"><img class=\"logo-menu\" src=\"media/img_assets/ready.png\"></a></li>
                        <li><a href=\"plataformas.php\">Plataformas</a></li>
                        <li><a href=\"acceder.php\">Acceder</a></li>
                    </ul>
                </nav>
        </header>";
    }

    function adecuar_ruta_foto($ruta){
        $imagen_rutanueva = preg_replace("`^.{1}`",'',$ruta);
        return $imagen_rutanueva;
    }

    function formatearFecha($fecha){
        $marcatiempo = strtotime($fecha);
        $fecha_formateada = date('d-m-Y', $marcatiempo);
        return $fecha_formateada;
    }
?>