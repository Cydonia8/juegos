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
<body id="seccion-plataformas">
    <?php
        menuImprimir($user);
    ?>
    <main>
        <h1 class="text-center mb-5">Plataformas con las que trabajamos</h1>
        <section class="contenedor-seccion-plataformas row container-xl">
            <?php
                foreach($plataformas as $pos => $plat){
                    echo "<div class=\"col-12 col-md-6 plat text-center\">
                        <img src=\"".$plataformas[$pos]["logo"]."\">
                        <form action=\"../controladores/plataforma_resumen.php\" method=\"post\">
                            <input hidden name =\"id\" value=\"".$plataformas[$pos]["id"]."\">
                            <input hidden name=\"foto\" value=\"".$plataformas[$pos]["logo"]."\">
                            <input hidden name=\"nombre\" value=\"".$plataformas[$pos]["nombre"]."\">
                            <input type=\"submit\" name=\"enviar\">
                        </form>
                    </div>";
                }
            ?>
        </section>
    </main>
</body>
</html>