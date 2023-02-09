<?php
    // function menuEstandar(){
    //     echo "<header>
    //             <nav>
    //                 <ul>
    //                     <li><a href=\"index.php\">Inicio</a></li>
    //                     <li><a href=\"juegos.php\">Juegos</a></li>
    //                     <li><a href=\"juegos.php\"><img class=\"logo-menu\" src=\"media/img_assets/ready.png\"></a></li>
    //                     <li><a href=\"plataformas.php\">Plataformas</a></li>
    //                     <li><a href=\"acceder.php\">Acceder</a></li>
    //                 </ul>
    //             </nav>
    //     </header>";
    // }

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
                                <li><a href=\"../vistas/vista_acceder.php\">Acceder</a></li>
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
                                <li><a href=\"vistas/vista_acceder.php\">Acceder</a></li>
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

    function crearCarrousel($juegos){
        echo '<div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">';

        foreach($juegos as $posicion=>$comentario){
        if($posicion == 0){
            echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$posicion.'" class="active" aria-current="true" aria-label="Slide '.$posicion.'"></button>';
        }else{
            echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$posicion.'" aria-current="true" aria-label="Slide '.$posicion.'"></button>';
        }
        }
        echo '</div>
        <div class="carousel-inner">';
        for($i=0;$i<count($juegos);$i++){
            if($i == 0){
            echo' <div class="carousel-item active juego col-12 col-md-6 col-lg-3">
            <img src="'.$juegos[$i]['foto'].'">
            <h4>'.$juegos[$i]["juego"].'</h4>
            <span>Ver más...</span>
            </div>
            </div>';
            }else{
                echo' <div class="carousel-item juego col-12 col-md-6 col-lg-3">
                <img src="'.$juegos[$i]['foto'].'">
                <h4>'.$juegos[$i]["juego"].'</h4>
                <span>Ver más...</span>
                </div>
                </div>';
            }
            
        }
        echo' </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>';
        }
?>