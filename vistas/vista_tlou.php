<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&Lato:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../media/img_assets/favicon-32x32.png" sizes="32x32"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/tlou.js" defer></script>
    <title>Document</title>
</head>
<body id="seccion-tlou">
    <?php
        menuImprimir($user);
    ?>
    <main>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        <div class="banner d-flex justify-content-between align-items-start">
            <div class="nd-container">
                <img class="img-fluid" src="../media/img_assets/nd.png" alt="">
            </div>
            <h1 class="text-center text-white m-5 w-25">The Last of Us Parte II: ¿es la venganza la solución?</h1>
        </div>
        <section class="container-xxl mt-5 mb-5">
            <h2 class="text-center text-white">Un viaje de sangre y arrepentimiento</h2>
            <div class="row align-items-center">
                <img src="../media/img_juegos/tlouII.jpg" class="img-fluid col-12 col-md-6" alt="">
                <p class="col-12 col-md-6 text-white">
                    Puede que “La venganza nunca es buena, mata el alma y la envenena” suene cursi e infantil, pero las casi 30 horas de The Last of Us: Parte II atestiguan esta frase como una dolorosa e insoportable verdad
                </p>
            </div>
        </section>
        <section class="container-fluid mb-5">
            <h2 class="text-center text-white">Un viaje de pérdida</h2>
            <div class="row gap-3 gap-md-0">
                <img src="https://images3.alphacoders.com/106/1065466.png" alt="" class="col-12 col-md-4">
                <img src="https://images4.alphacoders.com/927/927192.jpg" alt="" class="col-12 col-md-4">
                <img src="https://images7.alphacoders.com/106/1065467.png" alt="" class="col-12 col-md-4">
            </div>
        </section>
        <section class="container-xxl mb-5">
            <h2 class="text-center text-white">Una cruda revelación del pasado</h2>
            <img src="https://i.ytimg.com/vi/oYzpW1haVDo/maxresdefault.jpg" alt="" class="img-fluid">
        </section>
        <section class="container-xxl ">
            <h2 class="text-center text-white">Dos bandos, el mismo dolor</h2>
            <img src="https://static.fabrik.io/19xo/9f89a9dbf3aa0078.jpg?lossless=1&w=2880&h=5120&fit=max&q=85&s=ffa5dd2e2692ca35bc4dc40e09030c2d" class="img-fluid" alt="">
        </section>       
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>