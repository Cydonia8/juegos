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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Document</title>
</head>
<body id="seccion-plataformas-admin">
    <?php
        menuImprimir($user);
    ?>
    <main>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        <h1 class="text-center mb-5">Plataformas</h1>
        <section class="">
            <div class="container-lg d-flex flex-column align-items-center justify-content-center gap-3">
                <form class="text-center forms-busqueda" action="../controladores/busqueda_admin.php" method="post">
                    <input type="text" name="nombre" placeholder="Nombre de plataforma">
                    <input type="submit" name="buscar-plat" value="Buscar">
                </form>
                <a class="text-center mb-3 mx-auto enlaces-insertar" href="../vistas/vista_insertar_plataforma.php">Insertar plataforma</a>
            </div>
            
            <div class="table-wrapper">
            <table class="mx-auto w-50 text-center">
                <tr>
                    <td>ID de plataforma</td>
                    <td>Nombre de plataforma</td>
                    <td>Logotipo de plataforma</td>
                    <td>Plataforma activa</td>
                    <td>Desactivar plataforma</td>
                    <td>Modificar</td>
                </tr>
                <?php
                    if(isset($resultados)){
                        imprimirPlataforma($resultados);
                        // foreach($resultados as $pos=>$dato){
                        //     echo "<tr>
                        //             <td class=\"text-center\">".$resultados[$pos]["id"]."</td>
                        //             <td class=\"text-center\">".$resultados[$pos]["nombre"]."</td>
                        //             <td class=\"text-center\"><img class=\"w-50\" src=\"".$resultados[$pos]["logo"]."\"></td>
                        //             <td class=\"text-center\">".usuarioActivo($resultados[$pos]["activo"])."</td>
                        //     </tr>";
                        // }
                    }else{
                        imprimirPlataforma($datos);
                        // foreach($datos as $pos=>$dato){
                        //     echo "<tr>
                        //             <td class=\"text-center\">".$datos[$pos]["id"]."</td>
                        //             <td class=\"text-center\">".$datos[$pos]["nombre"]."</td>
                        //             <td class=\"text-center\"><img class=\"w-50\" src=\"".$datos[$pos]["logo"]."\"></td>
                        //             <td class=\"text-center\">".usuarioActivo($datos[$pos]["activo"])."</td>
                        //     </tr>";
                        // }
                    }
                    
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