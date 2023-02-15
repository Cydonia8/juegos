<?php
    // session_start();
    require_once "../bd/bd.php";
    require_once "../funciones/funciones.php";
    $user = comprobarVisitante();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Document</title>
</head>
<body id="ver-mas">
    <?php
        menuImprimir($user);
        $id = $_POST["plat"];
        $nombre = $lanzamientos[0]["plataforma"];
    ?>
    <main>
    
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        <section class="ver-mas-juego container-xl">
            <div class="juego-info row">
                <?php
                    $nombre = $datos[0]["nombre"];
                    $foto = $datos[0]["foto"];
                    $id_juego = $datos[0]["id"];
                    $descripcion = $datos[0]["descripcion"];
                    echo "<div class=\"col-12 col-lg-6\"><img class=\"img-fluid\" src=\"$foto\"></div>";
                    echo "<div class=\"col-12 col-lg-6\">
                        <h2>$nombre</h2>
                        <p>$descripcion</p>";
                    foreach($lanzamientos as $pos=>$lanz){
                        echo "<h4>Lanzamiento en ".$lanzamientos[$pos]["plataforma"].": ".formatearFecha($lanzamientos[$pos]["fecha"])."</h4>";
                    }
                    echo "</div>";
                ?>
                <?php
                    if($_SESSION["seccion"] == "plataformas"){
                        echo "<form class=\"forms-volver\" action=\"../controladores/plataforma_resumen.php\" method=\"post\">
                        <input hidden name=\"id\" value=\"$id\">
                        <input hidden name=\"nombre\" value=\"$nombre\">
                        <input type=\"submit\" class=\"mt-3 btn btn-primary\" name=\"enviar\" value=\"Volver\">
                    </form>";
                    }elseif($_SESSION["seccion"] == "juegos"){
                        echo "<a class=\"ms-3 mt-3 p-2 text-center forms-volver\" href=\"../controladores/seccion_juegos.php\">Volver</a>";
                    }
                ?>
                <!-- <form class="forms-volver" action="../controladores/plataforma_resumen.php" method="post">
                    <input hidden name="id" value="<?php echo $id; ?>">
                    <input hidden name="nombre" value="<?php echo $nombre; ?>">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Volver">
                </form> -->
            </div>
            <div class="comentarios container-xl mt-5 row">
                <?php
                    if($user != "" and $user != "admin"){
                        echo "<p>
                        <button class=\"btn btn-dark\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseExample\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                          Añadir comentario
                        </button>
                      </p>
                      <div class=\"collapse mb-3\" id=\"collapseExample\">
                        <div class=\"card card-body\">
                            <form class=\"d-flex gap-2\" action=\"../controladores/insertar_comentario.php\" method=\"post\">
                                <input type=\"text\" placeholder=\"Comentario...\" name=\"comentario\">
                                <input hidden value=\"$id_juego\" name=\"juego\">
                                <input type=\"submit\" class=\"btn btn-primary enviar-comentario\" name=\"enviar\" value=\"Comentar\">
                            </form>
                        </div>
                      </div>";
                    if(isset($error)){
                        if($error){
                            echo "<h4 class=\"mensajes-temporales alert alert-danger\">Ya añadiste un comentario para este juego.</h4>";
                        }else{
                            echo "<h4 class=\"mensajes-temporales alert alert-success\">Comentario añadido.</h4>";
                        }
                    }
                        if(sizeof($comentarios) > 0){
                            echo "<div class=\"container-comentarios row gap-5\">";
                            foreach($comentarios as $pos=>$coment){
                                echo "<article class=\"p-2 comentario-box col-11 col-md-5\">
                                    <h4>".$comentarios[$pos]["usuario"]."</h4>
                                    <p>".$comentarios[$pos]["texto"]."</p>
                                    <h3>".formatearFecha($comentarios[$pos]["fecha"])."</h3>
                                </article>";
                            }
                            echo "</div>";
                        }

                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>
