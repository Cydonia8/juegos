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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Document</title>
</head>
<body id="seccion-usuarios">
    <?php
        menuImprimir($user);
    ?>
    <main>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        <h1 class="text-center mb-5">Insertar usuario</h1>
        <section class="container-xl d-flex justify-content-center">
            <form action="../controladores/insercion_admin.php" class="d-flex flex-column gap-4 form-insertar-modificar" method="post">
                <input type="text" placeholder="Nombre" name="nombre" required>
                <input type="text" placeholder="Nombre de usuario" name="nick" required>
                <input type="password" placeholder="Contraseña" name="pass" required>
                <input type="submit" name="insertar-usuario" value="Insertar">
            </form>
        </section>
        <?php
            if(isset($success)){
                if($success){
                    echo "<h3 class=\"mensajes-temporales alert alert-success w-50\">Usuario insertado</h3>";
                }else{
                    echo "<h3 class=\"mensajes-temporales alert alert-danger w-50\">Datos mal, ceporro</h3>";
                }

            }
        ?>
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>