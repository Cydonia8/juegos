<?php
    require_once "../funciones/funciones.php";
    $user = comprobarVisitante();
    $_SESSION["seccion"] = "plataformas";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&Lato:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Document</title>
</head>
<body id="ver-plataforma">
    <?php
        menuImprimir($user);
        $nombre_plat = $plat->nombre;
        $id = $_POST["id"];
    ?>
    <main>
    <div class="mx-auto text-center logo-extra">
            <img class="img-fluid" src="../media/img_assets/ready2nobgfill.png" alt="">
        </div>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div><a class="forms-volver w-25 p-2 ms-auto me-4" href="../controladores/seccion_plataformas.php">Volver a plataformas</a></div>
        <h1 class="text-center mb-5">Videojuegos de <?php echo $nombre_plat; ?></h1>
        <section class="contenedor-ver-plataforma row container-xl mx-auto gap-5">
            <?php
                if(sizeof($juegos) > 0){
                    foreach($juegos as $pos=>$fila){
                        // col-12 col-lg-6
                        echo "<article class=\"row \"> 
                                <div class=\"col-12 col-md-8 text-center\">
                                    <img class=\"img-fluid\" src=\"".$juegos[$pos]["foto"]."\">
                                </div>
                                <div class=\"col-12 col-md-4 d-flex flex-column justify-content-center align-items-center\">
                                    <h2>".$juegos[$pos]["nombre"]."</h2>
                                    <h3>Lanzado el ".formatearFecha($juegos[$pos]["fecha"])."</h3>
                                    <form class=\"align-self-stretch text-center\" action=\"../controladores/ver_mas_juego.php\" method=\"post\">
                                    <input hidden name=\"id\" value=\"".$juegos[$pos]["id_juego"]."\">
                                    <input hidden name=\"nombre\" value=\"".$juegos[$pos]["nombre"]."\">
                                    <input hidden name=\"plat\" value=\"".$juegos[$pos]["id_plataforma"]."\">
                                    <input type=\"submit\" class=\"btn btn-primary ver-mas\" name=\"enviar\" value=\"Ver más\">
                                </form>
                                </div>";
                                
                        echo "</article>";
                    }
                }else{
                    echo "<h2 class=\"text-center\">No hay juegos de esta plataforma</h2>";
                }
                
            ?>
        </section>
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>