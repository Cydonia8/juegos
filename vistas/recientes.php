<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
    <?php
    require_once "funciones.php";
        echo "<table border>
                <tr>
                    <td>Juego</td>
                    <td>Plataforma</td>
                    <td>Carátula</td>
                    <td>Lanzamiento</td>
                </tr>";
        for($i= 0;$i<count($datos);$i++){
            echo "<tr>
                    <td>".$datos[$i]['juego']."</td>
                    <td>".$datos[$i]['plataforma']."</td>
                    <td><img src=\"".adecuar_ruta_foto($datos[$i]['caratula'])."\"></td>
                    <td>".$datos[$i]['fecha']."</td>
            </tr>";
        }
        echo "</table>";

        echo "<table border>
                <tr>
                    <td>Juego</td>
                    <td>Plataforma</td>
                    <td>Carátula</td>
                    <td>Lanzamiento</td>
                </tr>";
        for($i= 0;$i<count($datos_switch);$i++){
            echo "<tr>
                    <td>".$datos_switch[$i]['juego']."</td>
                    <td>".$datos_switch[$i]['plataforma']."</td>
                    <td><img src=\"".adecuar_ruta_foto($datos_switch[$i]['caratula'])."\"></td>
                    <td>".$datos_switch[$i]['fecha']."</td>
            </tr>";
        }
        echo "</table>";
    ?>
<!-- </body>
</html> -->
