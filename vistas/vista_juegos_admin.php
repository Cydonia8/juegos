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
    <title>Juegos | RPO</title>
</head>
<body id="seccion-juegos-admin">
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
        <h1 class="text-center mb-5">Juegos</h1>
        <section class="">
            <div class="container-lg d-flex flex-column align-items-center justify-content-center gap-3">
                <form class="text-center forms-busqueda" action="../controladores/busqueda_admin.php" method="post">
                    <input type="text" name="nombre" placeholder="Nombre de juego">
                    <input type="submit" name="buscar-juego" value="Buscar">
                </form>
                <a class="text-center mb-3 mx-auto enlaces-insertar" href="../controladores/lista_plataformas.php">Insertar juego</a>
            </div>
            <div class="table-wrapper">
            <table class="mx-auto w-75 text-center">
            <tr>
                <td>ID de juego</td>
                <td>Nombre del juego</td>
                <td>Descripci??n del juego</td>
                <td>Plataforma</td>
                <td>Imagen del juego</td>
                <td>Fecha de lanzamiento</td>
                <td>Precio</td>
                <td>Juego activo</td>
                <td>Desactivar</td>
                <td>Modificar</td>
            </tr>
                <?php
                    if(isset($resultados)){
                        imprimirJuego($resultados);
                    }else{
                        imprimirJuego($datos);
                    }
                    // foreach($datos as $pos=>$usu){
                    //     echo "<tr>
                    //             <td class=\"text-center\">".$datos[$pos]["id"]."</td>
                    //             <td class=\"text-center\">".$datos[$pos]["nombre"]."</td>
                    //             <td class=\"text-center\">".$datos[$pos]["nick"]."</td>
                    //             <td class=\"text-center\">".usuarioActivo($datos[$pos]["activo"])."</td>";
                    //             if($datos[$pos]["activo"] == 1){
                    //                 echo "<td class=\"text-center\">
                    //                         <form action=\"../controladores/desactivar_usuario.php\" method=\"post\">
                    //                             <input hidden name=\"id\" value=\"".$datos[$pos]["id"]."\">
                    //                             <input type=\"submit\" name=\"desactivar\" value=\"Desactivar\">
                    //                         </form>
                    //                 </td>";
                    //             }
                    //         echo "</tr>";
                    // }
                   
                ?>
            </table>
            </div>
        </section>
    </main>
    <?php
        imprimirFooter();
    ?>
</body>
</html>