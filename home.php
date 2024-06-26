<?php

session_start();

if(!isset($_SESSION['usuario'])){
    session_destroy();
    header("location: index.php");
    echo '
         <script>
              alert("Por favor debes iniciar sesion");
         </script>
    
    ';
    die();
    
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterOptica</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>

    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">MasterOptica</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button>
            <header>
                <div class="logo2">
                <img src="img/logo.png" alt="Anteojos">
                </div>
                <h3>Iniciaste sesión como: <?php echo htmlspecialchars($_SESSION['usuario']); ?></h3>
                
            </header>
            <nav>
                <ul class="menu">
                    <li>
                        <button id="todos" class="boton-menu boton-categoria active"><i class="bi bi-hand-index-thumb-fill"></i> Todos los productos</button>
                    </li>
                    <li>
                        <button id="Anteojos" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Anteojos</button>
                    </li>
                    <li>
                        <button id="Gorras" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Gorras</button>
                    </li>
                    <li>
                        <button id="Anteojosdesol" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Anteojos de Sol</button>
                    </li>
                    <li>
                        <a class="boton-menu boton-carrito" href="./carrito.html">
                            <i class="bi bi-cart-fill"></i> Carrito <span id="numerito" class="numerito">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <footer>
                <a class="link" href="php/cerrar_sesion.php">Cerrar Sesión</a>
            </footer>
        </aside>
        <main>
            <h2 class="titulo-principal" id="titulo-principal">Todos los productos</h2>
            <div id="contenedor-productos" class="contenedor-productos">
                <!-- Esto se va a rellenar con JS -->
            </div>
        </main>
    </div>
    <!-- Importación de la librería Toastify para notificaciones -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>