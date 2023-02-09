<?php
    session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <title>Document</title>
</head>
<body id="ver-mas">
    <?php
        menuImprimir($user);
    ?>
    <main>
        <section class="ver-mas-juego container-xl">
            <div class="juego-info row">
                <?php
                    $nombre = $datos[0]["nombre"];
                    $foto = $datos[0]["foto"];
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
            </div>
        </section>
    </main>
</body>
</html>