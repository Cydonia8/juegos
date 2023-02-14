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
        <h1 class="text-center mb-5">Insertar juego</h1>
        <section class="">
            <form action="../controladores/insercion_admin.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nombre" placeholder="Nombre del juego" required>
                <input type="text" name="descripcion" placeholder="Descripción del juego" required>
                <select name="plataforma" required>
                    <option value="null" checked hidden>Elige una plataforma</option>
                    <?php
                        foreach($datos as $pos=>$nom){
                            echo "<option value=\"".$datos[$pos]["id"]."\">".$datos[$pos]["nombre"]."</option>";
                        }
                    ?>
                </select>
                <input type="file" name="foto" required>
                <input type="date" name="fecha" required>
                <input type="submit" name="insertar-juego" value="Insertar">
            </form>
        </section>
        <?php
            if(isset($success)){
                if($success){
                    echo "<h3 class=\"mensaje-temporal\">Juego insertado correctamente</h3>";
                }else{
                    echo "<h3 class=\"mensaje-temporal\">Alguno de los datos es erróneo</h3>";;
                    if($foto_error){
                        echo "<h3 class=\"mensaje-temporal\">Formato o tamaño de foto inválidos</h3>";
                    }
                }
            }
            
        ?>
    </main>
</body>
</html>