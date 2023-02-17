<?php
    require_once "../funciones/funciones.php";
    $user = comprobarVisitante();
    $_SESSION["seccion"] = "juegos";
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
<body id="seccion-juegos">
    <?php
        menuImprimir($user);
    ?>
    <main>
    <div class="mx-auto text-center logo-extra">
            <img class="img-fluid" src="../media/img_assets/ready2nobgfill.png" alt="">
        </div>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        <section class="contenedor-seccion-juegos">
            <?php
                $current_plataforma;
                foreach($juegos as $pos=>$juego){
                    $current_plataforma = $juegos[$pos]["plataforma"];
                    if($pos > 0){
                        if($current_plataforma != $juegos[$pos-1]["plataforma"]){
                            echo "<div class=\"plataforma row\"><h2>Juegos de ".$current_plataforma."</h2><div class=\"contenedor-flex row\">";
                        }
                    }else{
                        echo "<div class=\"plataforma row\"><h2>Juegos de ".$current_plataforma."</h2><div class=\"contenedor-flex row\">";
                    }
                    echo "<div class=\"juego col-12 col-md-6 col-lg-3\">
                        <img src=\"".$juegos[$pos]['foto']."\">
                        <h4 class=\"text-center mt-2\">".$juegos[$pos]["juego"]."</h4>
                        <form class=\"text-center\" action=\"../controladores/ver_mas_juego.php\" method=\"post\">
                            <input hidden name=\"id\" value=\"".$juegos[$pos]["id"]."\">
                            <input hidden name=\"nombre\" value=\"".$juegos[$pos]["juego"]."\">
                            <input hidden name=\"plat\" value=\"".$juegos[$pos]["id_plat"]."\">
                            <input type=\"submit\" class=\"btn btn-primary ver-mas mb-4\" name=\"enviar\" value=\"Ver más\">
                        </form>
                    </div>";
                    // crearCarrousel($juegos);
                    // echo $juegos[$pos]["juego"];
                    // echo '<img src="'.$juegos[$pos]['foto'].'">';
                    if($pos > 0 and $pos < sizeof($juegos)-1){
                        if($current_plataforma != $juegos[$pos+1]["plataforma"]){
                            echo "</div></div>";
                        }
                    }
                }
                echo "</div></div>";
            ?>
        </section>
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>