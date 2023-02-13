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
<body id="ver-plataforma">
    <?php
        menuImprimir($user);
        $nombre_plat = $plat->nombre;
    ?>
    <main>
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
                                </div>";
                        echo "</article>";
                    }
                }else{
                    echo "<h2 class=\"text-center\">No hay juegos de esta plataforma</h2>";
                }
                
            ?>
        </section>
    </main>
</body>
</html>