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
    <link rel="icon" type="image/png" href="../media/img_assets/favicon-32x32.png" sizes="32x32"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Plataformas | RPO</title>
</head>
<body id="seccion-plataformas">
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
        <h1 class="text-center mb-5">Plataformas con las que trabajamos</h1>
        <section class="contenedor-seccion-plataformas row container-xl">
            <?php
                foreach($plataformas as $pos => $plat){
                    echo "<div class=\"position-relative col-12 p-3 col-md-6 plat text-center d-flex flex-column align-items-center justify-content-around\">
                        <img class=\"img-plats\" src=\"".$plataformas[$pos]["logo"]."\">
                        <form class=\"d-lg-none position-absolute forms-ver-mas-plataformas\" action=\"../controladores/plataforma_resumen.php\" method=\"post\">
                            <input hidden name =\"id\" value=\"".$plataformas[$pos]["id"]."\">
                            <input hidden name=\"foto\" value=\"".$plataformas[$pos]["logo"]."\">
                            <input hidden name=\"nombre\" value=\"".$plataformas[$pos]["nombre"]."\">
                            <input type=\"submit\" name=\"enviar\" value=\"Ver más\">
                        </form>
                    </div>";
                }
            ?>
        </section>
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>