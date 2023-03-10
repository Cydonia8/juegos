<?php
    require_once "../funciones/funciones.php";
    $user = comprobarVisitante();
    restringirAcceso($user, "admin");
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
    <link rel="icon" type="image/png" href="../media/img_assets/favicon-32x32.png" sizes="32x32"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Comentarios | RPO</title>
</head>
<body id="seccion-comentarios-admin">
    <?php
        menuImprimir($user);
    ?>
    <main>
    <div class="mx-auto text-center logo-extra">
            <img class="img-fluid" src="../media/img_assets/ready2nobgfill.png" alt="">
        </div>
        <h1 class="text-center mb-4">Comentarios</h1>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        <section class="container-xl g-3 mx-auto row justify-content-center justify-content-md-start">
            <?php
                if(sizeof($comentarios) > 0){
                    foreach($comentarios as $pos=>$coment){
                        echo "<div class=\"card col-12 col-md-4 g-3\" style=\"width: 18rem;\">
                                <div class=\"card-body d-flex flex-column align-items-stretch justify-content-around\">
                                <h5 class=\"card-title\">Comentario de ".$comentarios[$pos]["juego"]."</h5>
                                <h6 class=\"card-subtitle mb-2 text-muted\">".formatearFecha($comentarios[$pos]["fecha"])."/".$comentarios[$pos]["usuario"]."</h6>
                                <p class=\"card-text\">".$comentarios[$pos]["texto"]."</p>
                                <form action=\"../controladores/eliminar_comentario.php\" class=\"card-link\" method=\"post\">
                                    <input hidden value=\"".$comentarios[$pos]["juego"]."\" name=\"juego\">
                                    <input hidden value=\"".$comentarios[$pos]["texto"]."\" name=\"texto\">
                                    <input hidden value=\"".$comentarios[$pos]["usuario"]."\" name=\"usuario\">
                                    <input type=\"submit\" class=\"btn btn-danger\" name=\"enviar\" value=\"Eliminar\">
                                </form>
                                </div>
                            </div>";
                    }
                }else{
                    echo "<h2 class=\"text-center\">No hay comentarios</h2>";
                }
            ?>
        </section>
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>