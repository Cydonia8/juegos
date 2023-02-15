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
                                <li><a href=\"../controladores/juegos_admin.php\">Juegos</a></li>
                                <li><a href=\"../controladores/plataformas_admin.php\">Plataformas</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"../media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"../controladores/seccion_usuarios.php\">Usuarios</a></li>
                                <li><a href=\"../controladores/comentarios_admin.php\">Comentarios</a></li>
                                <li><a href=\"../controladores/cerrar_sesion.php\">Cerrar sesión</a></li>
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
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"../media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"../controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a href=\"../controladores/cerrar_sesion.php\">Cerrar sesión</a></li>
                            </ul>
                        </nav>
                    </header>";
            }
        }else{
            if($user == "admin"){
                echo "<header class=\"bg-black yellow-dark pattern-diagonal-lines-lg\">
                        <nav>
                            <ul>
                                <li><a href=\"index.php\">Inicio</a></li>
                                <li><a href=\"controladores/juegos_admin.php\">Juegos</a></li>
                                <li><a href=\"controladores/plataformas_admin.php\">Plataformas</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"controladores/seccion_usuarios.php\">Usuarios</a></li>
                                <li><a href=\"controladores/comentarios_admin.php\">Comentarios</a></li>
                                <li><a href=\"controladores/cerrar_sesion.php\">Cerrar sesión</a></li>
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
                                <li><a href=\"index.php\">Inicio</a></li>
                                <li><a href=\"controladores/seccion_juegos.php\">Juegos</a></li>
                                <li><a class=\"logo-menu\" href=\"../index.php\"><img src=\"media/img_assets/ready2nobgfill.png\"></a></li>
                                <li><a href=\"controladores/seccion_plataformas.php\">Plataformas</a></li>
                                <li><a href=\"controladores/cerrar_sesion.php\">Cerrar sesión</a></li>
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

    function usuarioActivo($activo){
        $salida ="SÍ";
        if($activo == 0){
            $salida = "NO";
        }
        return $salida;
    }
    function imprimirPlataforma($array){
        foreach($array as $pos=>$dato){
            echo "<tr>
                    <td class=\"text-center\">".$array[$pos]["id"]."</td>
                    <td class=\"text-center\">".$array[$pos]["nombre"]."</td>
                    <td class=\"text-center\"><img class=\"w-50\" src=\"".$array[$pos]["logo"]."\"></td>
                    <td class=\"text-center\">".usuarioActivo($array[$pos]["activo"])."</td>
                    <td class=\"text-center\"><form action=\"../controladores/modificacion_admin.php\" method=\"post\">
                        <input hidden value=\"".$array[$pos]["id"]."\" name=\"plataforma\">
                        <input type=\"submit\" class=\"btn btn-info\" name=\"modificar-plat\" value=\"Modificar\">    
                    </form>
                    </td>
            </tr>";
        }
    }

    function imprimirUsuario($array){
        foreach($array as $pos=>$usu){
            echo "<tr>
                    <td class=\"text-center\">".$array[$pos]["id"]."</td>
                    <td class=\"text-center\">".$array[$pos]["nombre"]."</td>
                    <td class=\"text-center\">".$array[$pos]["nick"]."</td>
                    <td class=\"text-center\">".usuarioActivo($array[$pos]["activo"])."</td>";
                    if($array[$pos]["activo"] == 1){
                        echo "<td class=\"text-center\">
                                <form action=\"../controladores/desactivar.php\" method=\"post\">
                                    <input hidden name=\"id\" value=\"".$array[$pos]["id"]."\">
                                    <input type=\"submit\" class=\"btn btn-danger\" name=\"desactivar-usuario\" value=\"Desactivar\">
                                </form>
                        </td>";
                    }else{
                        echo "<td>
                        <form action=\"../controladores/desactivar.php\" method=\"post\">
                                    <input hidden name=\"id\" value=\"".$array[$pos]["id"]."\">
                                    <input type=\"submit\" class=\"btn btn-success\" name=\"activar-usuario\" value=\"Activar\">
                                </form></td>";
                    }
                    echo "<td class=\"text-center\"><form action=\"../controladores/modificacion_admin.php\" method=\"post\">
                                <input hidden value=\"".$array[$pos]["id"]."\" name=\"usuario\">
                                <input type=\"submit\" class=\"btn btn-info\" name=\"modificar-usuario\" value=\"Modificar\">    
                            </form>
                        </td>";
                echo "</tr>";
        }
    }

    function imprimirJuego($array){
        foreach($array as $pos=>$usu){
            echo "<tr>
                    <td class=\"text-center\">".$array[$pos]["id"]."</td>
                    <td class=\"text-center\">".$array[$pos]["nombre"]."</td>
                    <td class=\"text-center\">".$array[$pos]["descripcion"]."</td>
                    <td class=\"text-center\">".$array[$pos]["plataforma"]."</td>
                    <td class=\"text-center\"><img class=\"img-fluid\" src=\"".$array[$pos]["caratula"]."\"></td>
                    <td class=\"text-center\">".formatearFecha($array[$pos]["fecha"])."</td>
                    <td class=\"text-center\">".usuarioActivo($array[$pos]["activo"])."</td>";
                    if($array[$pos]["activo"] == 1){
                        echo "<td class=\"text-center\">
                                <form action=\"../controladores/desactivar.php\" method=\"post\">
                                    <input hidden name=\"id\" value=\"".$array[$pos]["id"]."\">
                                    <input type=\"submit\" class=\"btn btn-danger\" name=\"desactivar-juego\" value=\"Desactivar\">
                                </form>
                        </td>";
                    }else{
                        echo "<td>
                        <form action=\"../controladores/desactivar.php\" method=\"post\">
                                    <input hidden name=\"id\" value=\"".$array[$pos]["id"]."\">
                                    <input type=\"submit\" class=\"btn btn-success\" name=\"activar-juego\" value=\"Activar\">
                                </form></td>";
                    }
                    echo "<td class=\"text-center\"><form action=\"../controladores/modificacion_admin.php\" method=\"post\">
                                <input hidden value=\"".$array[$pos]["id"]."\" name=\"juego\">
                                <input type=\"submit\" class=\"btn btn-info\" name=\"modificar-juego\" value=\"Modificar\">    
                            </form>
                        </td>";
                echo "</tr>";
        }
    }

    function cadenaVacia($cadena){
        $vacio = preg_match("`^\s*$`",$cadena);
        return $vacio;
    }

    function comprobarExtension($extension){
        $correcto = false;
        if($extension == "image/jpeg" or $extension == "image/png"){
            $correcto = true;
        }
        
        return $correcto;
    }

    //Función que comprueba si el tamaño de una fotografía es menor o igual a 1.5 MB
    function comprobarTamanio($tamaño){
        $tamaño_mb = $tamaño / pow(1024, 2);
        $correcto = false;
        if($tamaño_mb <= 1.5){
            $correcto = true;
        }

        return $correcto;
    }


?>