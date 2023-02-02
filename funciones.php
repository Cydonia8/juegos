<?php
    function menuEstandar(){
        echo "<header>
                <nav>
                    <ul>
                        <li><a href=\"index.php\">Inicio</a></li>
                        <li><a href=\"juegos.php\">Juegos</a></li>
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
?>