<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&Josefin+Sans:wght@500&Barlow+Condensed:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <title>Document</title>
</head>
<body id="seccion-tienda">
    <main>
    <button class="abrir-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
    <h1 class="text-center">Tienda digital</h1>
    <section class="container-fluid row container-tienda mx-auto">
        <div class="filtros col-12 col-md-2"></div>
        <div class="container-productos col-12 col-md-10"></div>
    </section>
    </main>
</body>
</html> -->
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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&Josefin+Sans:wght@500&Barlow+Condensed:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="../scripts/app.js" defer></script>
    <script src="../scripts/tienda.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php
        menuImprimir($user);
    ?>
    <!-- <header>
        <div>
            <img src="majesty.png" alt="">
            <span>Majesty Guitars</span>
        </div>
        <form action="">
            <label for="">Menú horizontal</label>
            <input id="vertical" type="checkbox">
        </form>
        
    </header> -->
    <!--Animación de carga-->
    <div class="container-animacion">
        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>
    <!-- Contenedor mensajes -->
    <div class="contenedor-mensajes">
        
    </div>
    <!-- Carrito -->
    <section class="contenedor-carrito">
        <aside class="carrito">
            <div class="titulos-carrito">
                <i id="cerrar-carrito" class="fa-solid fa-chevron-right"></i>
            
                <h3>Tus productos</h3>
                <h3 id="total-carrito">Total: 0€</h3>
            </div>
            <div class="contenedor-productos-carrito">
                
            </div>
            
            <button class="vaciar-carrito">Vaciar carrito</button>
            <button class="finalizar-compra">Finalizar compra</button>
            
        </aside>
    </section>

    <!-- Productos y filtros -->
    <section class="seccion-productos-filtros">
        <div class="container-filtros">
            <div class="filtros-sticky">
                <form class="filtrar-nombre">
                    <input id="busqueda-nombre" type="text" placeholder="Nombre">
                </form>
                <div class="filtros">
                    <h3>Categorias</h2>
                </div>
                <div class="filtro-precio">
                    <h4>Filtrar productos por precio máximo</h4>
                    <form class="filtrar-precio">
                        <input id="precio" type="range" min="0" max="200"value="0">
                        <p>No se ha aplicado filtro de precio</p>
                    </form>
                </div>
                <div class="filtro-fecha">
                    <h4>Filtrar productos entre dos fechas</h4>
                    <form class="filtrar-fecha">
                        <input id="fecha-inicio" type="date">
                        <span>a</span>
                        <input id="fecha-tope" type="date">
                        <i id="actualizar-fecha" class="fa-solid fa-arrow-rotate-right"></i>
                    </form>
                </div>
                <div>
                    <button id="abrir-carrito">Abrir carrito</button>
                </div>
                <div class="paginadores">
                    <button id="anterior">Anterior</button>
                    <button id="siguiente">Siguiente</button>
                </div>
            </div>
        </div>
        <div class="container-productos">
            
        </div>
    </section>

    <!-- Modal para las fotos de productos -->
    <section class="modal-productos">
        <i id="cerrar-modal" class="fa-solid fa-circle-xmark"></i>
        <div class="contenido-modal">
            <img src="" alt="">
            <h3></h3>
            <h4></h4>
        </div>
    </section>
</body>
</html>