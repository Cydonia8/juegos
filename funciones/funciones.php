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

    function menuImprimir($user, $ruta = "noindex"){
        if($ruta == "noindex"){
            if($user == "admin"){
                echo "<header class=\"bg-black yellow-dark pattern-diagonal-lines-lg\">
                        <nav>
                            <ul>
                                <li><a href=\"../index.php\">Inicio</a></li>
                                <li><a href=\"../controladores/seccion_juegos.php\">Juegos</a></li>
                                <li><a href=\"../controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"../media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"../controladores/seccion_usuarios.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/seccion_comentarios.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/salir.php\">Acceder</a></li>
                            </ul>
                        </nav>
                    </header>";
            }elseif($user == ""){
                echo "<header class=\"bg-black yellow-dark pattern-diagonal-lines-lg\">
                        <nav>
                            <ul>
                                <li><a href=\"../index.php\">Inicio</a></li>
                                <li><a href=\"../controladores/seccion_juegos.php\">Juegos</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"../media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"../controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/seccion_acceder.php\">Acceder</a></li>
                            </ul>
                        </nav>
                    </header>";
            }else{
                echo "<header class=\"bg-black yellow-dark pattern-diagonal-lines-lg\">
                        <nav>
                            <ul>
                                <li><a href=\"../index.php\">Inicio</a></li>
                                <li><a href=\"../controladores/seccion_juegos.php\">Juegos</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"../controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/salir.php\">Acceder</a></li>
                            </ul>
                        </nav>
                    </header>";
            }
        }else{
            if($user == "admin"){
                echo "<header class=\"bg-black yellow-dark pattern-diagonal-lines-lg\">
                        <nav>
                            <ul>
                                <li><a href=\"../index.php\">Inicio</a></li>
                                <li><a href=\"../controladores/seccion_juegos.php\">Juegos</a></li>
                                <li><a href=\"../controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"../controladores/seccion_usuarios.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/seccion_comentarios.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/salir.php\">Acceder</a></li>
                            </ul>
                        </nav>
                    </header>";
            }elseif($user == ""){
                echo "<header class=\"bg-black yellow-dark pattern-diagonal-lines-lg\">
                        <nav>
                            <ul>
                                <li><a href=\"index.php\">Inicio</a></li>
                                <li><a href=\"controladores/seccion_juegos.php\">Juegos</a></li>
                                <li><a href=\"index.php\"><img class=\"logo-menu\" src=\"media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a href=\"controladores/seccion_acceder.php\">Acceder</a></li>
                            </ul>
                        </nav>
                    </header>";
            }else{
                echo "<header class=\"bg-black yellow-dark pattern-diagonal-lines-lg\">
                        <nav>
                            <ul>
                                <li><a href=\"../index.php\">Inicio</a></li>
                                <li><a href=\"../controladores/seccion_juegos.php\">Juegos</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"../controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/salir.php\">Acceder</a></li>
                            </ul>
                        </nav>
                    </header>";
            }
        }
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
    function comprobarVisitante(){
        if(isset($_COOKIE['sesion'])){
            session_decode($_COOKIE['sesion']);
            $user = $_SESSION['user'];
        }elseif(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }else{
            $user = "";
        }
        
        return $user;
    }
?>