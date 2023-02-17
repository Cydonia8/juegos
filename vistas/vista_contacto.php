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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Document</title>
</head>
<body id="seccion-contacto">
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
        <h1 class="text-center mb-5 text-white">¿Dudas? ¿Sugerencias? Estamos a tu disposición.</h1>
        <section class="container-xl row mx-auto">
        <iframe class="col-12 col-md-6" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.6129813461794!2d-118.47339308441784!3d34.02814392644623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bb39055993f7%3A0xbc891fc1b60f587a!2sNaughty%20Dog%20LLC!5e0!3m2!1ses!2ses!4v1676545445023!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <form class="col-12 col-md-6 d-flex flex-column align-items-center gap-2 form-contacto" action="">
            <div class="fila-inp d-flex justify-content-between w-100">
                <label class="text-white" for="">Nombre</label>
                <input class="rounded" type="text">
            </div>
            <div class="fila-inp d-flex justify-content-between w-100">
                <label class="text-white" for="">Apellidos</label>
                <input type="text"class="rounded">
            </div>
            <div class="fila-inp d-flex justify-content-between w-100">
                <label class="text-white" for="">Teléfono</label>
                <input type="text"class="rounded">
            </div>
            <div class="fila-inp d-flex justify-content-between w-100">
                <label class="text-white" for="">E-mail</label>
                <input type="email"class="rounded">
            </div>
            <textarea class="w-100 rounded" name="" id="" cols="30" rows="10" placeholder="Motivo de contacto"></textarea>
            <input type="submit" class="btn">
        </form>
        </section>
        
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>