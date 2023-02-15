<?php
    // session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Document</title>
</head>
<body id="seccion-acceder">
    <?php
        menuImprimir($user);
    ?>
    <main>
        <h1 class="text-center">Accede a Ready Player One</h1>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        <section class="container-xl d-flex justify-content-center align-items-center acceder-container">
            <form class="bg-black yellow-dark pattern-diagonal-lines-lg d-flex flex-wrap flex-column gap-3 w-50 align-items-start align-items-md-center" action="../controladores/seccion_acceder.php" method="post">
                <input type="text" name="user" placeholder="Usuario">
                <input type="text" name="pass" placeholder="Contraseña">
                <input type="submit" name="enviar" value="Acceder">
            </form>
            <?php
                if(isset($comprobante)){
                    if($comprobante == 0){
                        echo "ladron de mierda";
                    }
                }
            ?>
        </section>
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>