<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <title>Document</title>
</head>
<body id="seccion-comentarios-admin">
    <?php
        menuImprimir($user);
    ?>
    <main>
        <section class="container-xl g-3 mx-auto row justify-content-center justify-content-md-start">
            <?php
                foreach($comentarios as $pos=>$coment){
                    echo "<div class=\"card col-12 col-md-4 g-3\" style=\"width: 18rem;\">
                            <div class=\"card-body\">
                            <h5 class=\"card-title\">Comentario de ".$comentarios[$pos]["juego"]."</h5>
                            <h6 class=\"card-subtitle mb-2 text-muted\">".formatearFecha($comentarios[$pos]["fecha"])."/".$comentarios[$pos]["usuario"]."</h6>
                            <p class=\"card-text\">".$comentarios[$pos]["texto"]."</p>
                            <form action=\"../controladores/eliminar_comentario.php\" class=\"card-link\" method=\"post\">
                                <input hidden value=\"".$comentarios[$pos]["juego"]."\" name=\"juego\">
                                <input hidden value=\"".$comentarios[$pos]["texto"]."\" name=\"texto\">
                                <input hidden value=\"".$comentarios[$pos]["usuario"]."\" name=\"usuario\">
                                <input type=\"submit\" name=\"enviar\" value=\"Eliminar\">
                            </form>
                            </div>
                        </div>";
                }
            ?>
        </section>
    </main>
</body>
</html>