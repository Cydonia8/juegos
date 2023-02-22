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
                                <li><a class=\"logo-menu\" href=\"index.php\"><img src=\"media/img_assets/ready2nobgfill.png\"></a></li>
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
                                <li><a class=\"logo-menu\" href=\"index.php\"><img src=\"media/img_assets/ready2nobgfill.png\"></a></li>
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
      if(sizeof($array) > 0){
        foreach($array as $pos=>$dato){
          echo "<tr>
                  <td class=\"text-center\">".$array[$pos]["id"]."</td>
                  <td class=\"text-center\">".$array[$pos]["nombre"]."</td>
                  <td class=\"text-center\"><img class=\"w-50\" src=\"".$array[$pos]["logo"]."\"></td>
                  <td class=\"text-center\">".usuarioActivo($array[$pos]["activo"])."</td>";
                  if($array[$pos]["activo"] == 1){
                    echo "<td class=\"text-center\">
                            <form action=\"../controladores/desactivar.php\" method=\"post\">
                                <input hidden name=\"id\" value=\"".$array[$pos]["id"]."\">
                                <input type=\"submit\" class=\"btn btn-danger\" name=\"desactivar-plataforma\" value=\"Desactivar\">
                            </form>
                    </td>";
                }else{
                    echo "<td>
                    <form action=\"../controladores/desactivar.php\" method=\"post\">
                                <input hidden name=\"id\" value=\"".$array[$pos]["id"]."\">
                                <input type=\"submit\" class=\"btn btn-success\" name=\"activar-plataforma\" value=\"Activar\">
                            </form></td>";
                }
                 echo "<td class=\"text-center\"><form action=\"../controladores/modificacion_admin.php\" method=\"post\">
                      <input hidden value=\"".$array[$pos]["id"]."\" name=\"plataforma\">
                      <input type=\"submit\" class=\"btn btn-info\" name=\"modificar-plat\" value=\"Modificar\">    
                  </form>
                  </td>
          </tr>";
        }
      }else{
        echo "<h2 class=\"text-center alert alert-danger\">No hay coincidencias</h2>";
      }
        
    }

    function imprimirUsuario($array){
      if(sizeof($array) > 0){
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
      }else{
        echo "<h2 class=\"text-center alert alert-danger\">No hay coincidencias</h2>";
      }
        
    }

    function imprimirJuego($array){
      if(sizeof($array) > 0){
        foreach($array as $pos=>$usu){
          echo "<tr>
                  <td class=\"text-center\">".$array[$pos]["id"]."</td>
                  <td class=\"text-center\">".$array[$pos]["nombre"]."</td>
                  <td class=\"text-center\">".$array[$pos]["descripcion"]."</td>
                  <td class=\"text-center\">".$array[$pos]["plataforma"]."</td>
                  <td class=\"text-center\"><img class=\"img-fluid\" src=\"".$array[$pos]["caratula"]."\"></td>
                  <td class=\"text-center\">".formatearFecha($array[$pos]["fecha"])."</td>
                  <td class=\"text-center\">".$array[$pos]["precio"]."€</td>
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
      }else{
        echo "<h2 class=\"text-center alert alert-danger\">No hay coincidencias</h2>";
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

    function imprimirFooter($index="noindex"){
        #6351ce
        if($index == "noindex"){
            echo '<footer class="text-center mt-4 text-lg-start text-white" style="background-color: #1c2331">
        <section
                 class="d-flex justify-content-between p-4"
                 style="background-color: #795fe3"
                 >
          <div class="me-5">
            <span>Redes sociales de provecho:</span>
          </div>

          <div>
            <a href="https://twitter.com/Naughty_Dog" class="text-white me-4">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="text-white me-4">
              <i class="fab fa-google"></i>
            </a>
            <a href="" class="text-white me-4">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/Cydonia8" class="text-white me-4">
              <i class="fab fa-github"></i>
            </a>
          </div>

        </section>

        <section class="">
          <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <h6 class="text-uppercase fw-bold">Ready Player One</h6>
                <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #7c4dff; height: 2px"
                    />
                <p>
                  <img src="../media/img_assets/ready2nobgfill.png">
                </p>
              </div>
    
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Servicios</h6>
                <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #7c4dff; height: 2px"
                    />
                <p>
                  <a href="https://www.cylex.es/granada/videoclub.html" class="text-white">Alquiler de videojuegos</a>
                </p>
                <p>
                  <a href="../controladores/tienda.php" class="text-white">Venta digital</a>
                </p>
                <p>
                  <a href="../controladores/tlouII.php" class="text-white">The Last of Us Part II: en profundidad</a>
                </p>
                <p>
                  <a href=https://www.pccomponentes.com/!" class="text-white">Venta de componentes para PC</a>
                </p>
              </div>

              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
 
                <h6 class="text-uppercase fw-bold">Sitios Recomendados</h6>
                <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #7c4dff; height: 2px"
                    />
                <p>
                  <a href="https://www.naughtydog.com/" class="text-white">Naughty Dog</a>
                </p>
                <p>
                  <a href="https://store.steampowered.com/?l=spanish" class="text-white">Steam</a>
                </p>
                <p>
                  <a href="https://sms.playstation.com/" class="text-white">Santa Monica Studio</a>
                </p>
                <p>
                  <a href="https://www.instant-gaming.com/es/" class="text-white">Instant Gaming</a>
                </p>
              </div>

              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase fw-bold">Contacta con nosotros</h6>
                <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #7c4dff; height: 2px"
                    />
                <p><i class="fas fa-home mr-3"></i> Paseo de los Tristes 4, Granada, España</p>
                <p><a href="../controladores/contacto.php"><i class="fas fa-envelope mr-3"></i> Formulario de contacto</a></p>
                <p><i class="fas fa-phone mr-3"></i> + 34 481 516 2342</p>
                <p><i class="fas fa-print mr-3"></i> + 34 112 358 1321</p>
              </div>
            </div>
          </div>
        </section>

        <div
             class="text-center p-3 "
             style="background-color: rgba(0, 0, 0, 0.2)"
             >
          © 2023 Copyright:
          <a class="text-white" href="../index.php"
             >Ready Player One Industries</a
            >
        </div>
      </footer>';
        }else{
          echo '<footer class="text-center mt-4 text-lg-start text-white" style="background-color: #1c2331">
          <section
                   class="d-flex justify-content-between p-4"
                   style="background-color: #795fe3"
                   >
            <div class="me-5">
              <span>Redes sociales de provecho:</span>
            </div>
  
            <div>
              <a href="https://twitter.com/Naughty_Dog" class="text-white me-4">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="text-white me-4">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="https://github.com/Cydonia8" class="text-white me-4">
                <i class="fab fa-github"></i>
              </a>
            </div>
  
          </section>
  
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
  
                  <h6 class="text-uppercase fw-bold">Ready Player One</h6>
                  <hr
                      class="mb-4 mt-0 d-inline-block mx-auto"
                      style="width: 60px; background-color: #7c4dff; height: 2px"
                      />
                  <p>
                    <img src="media/img_assets/ready2nobgfill.png">
                  </p>
                </div>
      
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold">Servicios</h6>
                  <hr
                      class="mb-4 mt-0 d-inline-block mx-auto"
                      style="width: 60px; background-color: #7c4dff; height: 2px"
                      />
                  <p>
                    <a href="https://www.cylex.es/granada/videoclub.html" class="text-white">Alquiler de videojuegos</a>
                  </p>
                  <p>
                    <a href="controladores/tienda.php" class="text-white">Venta digital</a>
                  </p>
                  <p>
                    <a href="controladores/tlouII.php" class="text-white">The Last of Us Part II: en profundidad</a>
                  </p>
                  <p>
                    <a href=https://www.pccomponentes.com/!" class="text-white">Venta de componentes para PC</a>
                  </p>
                </div>
  
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
   
                  <h6 class="text-uppercase fw-bold">Sitios Recomendados</h6>
                  <hr
                      class="mb-4 mt-0 d-inline-block mx-auto"
                      style="width: 60px; background-color: #7c4dff; height: 2px"
                      />
                  <p>
                    <a href="https://www.naughtydog.com/" class="text-white">Naughty Dog</a>
                  </p>
                  <p>
                    <a href="https://store.steampowered.com/?l=spanish" class="text-white">Steam</a>
                  </p>
                  <p>
                    <a href="https://sms.playstation.com/" class="text-white">Santa Monica Studio</a>
                  </p>
                  <p>
                    <a href="https://www.instant-gaming.com/es/" class="text-white">Instant Gaming</a>
                  </p>
                </div>
  
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <h6 class="text-uppercase fw-bold">Contacta con nosotros</h6>
                  <hr
                      class="mb-4 mt-0 d-inline-block mx-auto"
                      style="width: 60px; background-color: #7c4dff; height: 2px"
                      />
                  <p><i class="fas fa-home mr-3"></i> Paseo de los Tristes 4, Granada, España</p>
                  <p><a href="controladores/contacto.php"><i class="fas fa-envelope mr-3"></i> Formulario de contacto</a></p>
                  <p><i class="fas fa-phone mr-3"></i> + 34 481 516 2342</p>
                  <p><i class="fas fa-print mr-3"></i> + 34 112 358 1321</p>
                </div>
              </div>
            </div>
          </section>
  
          <div
               class="text-center p-3 "
               style="background-color: rgba(0, 0, 0, 0.2)"
               >
            © 2023 Copyright:
            <a class="text-white" href="index.php"
               >Ready Player One Industries</a
              >
          </div>
        </footer>';
        }
        
    }

    function restringirAcceso($visitante, $permitido){
      if($visitante != $permitido){
          header("location:../index.php");
      }
  }

 

?>