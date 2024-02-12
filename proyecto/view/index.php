<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/css/index.css">
    <title>Document</title>
</head>
<body>

    <header>
        <div class="h-caja">

            <div class="h-logo">
                <img src="./static/img/logo.png" alt="">
            </div>

             
            <?php
                if(!isset($_SESSION['usuario'])){
                    $html = '<div class="h-link">';
                    $html .= '<a href="./login.php">Inciar</a>';
                    $html .= '</div>';
                    echo $html;
         
                }else{
                    echo "<h1 class='nombre'>".$_SESSION['usuario']['nombre']."</h1>";
                    echo"<a href='../controller/controllerRules/cerrarsesion.php'>cerrar</a>";
                    echo "<a href='admin.php'>admin</a>";
                    if(isset($_GET['s'])){
                        session_destroy();
                        header("Location:".$_SERVER['REQUEST_URI']);
                    }
                }
            ?>
            

        </div>
    </header>


    <main>
        <h1>Compromiso con la Calidad y la Sostenibilidad</h1>
        <div class="m-cartas">  
        
            En "ProveeTodo", estamos comprometidos con la calidad y la sostenibilidad. Nos esforzamos por trabajar con proveedores que compartan nuestros valores en cuanto a prácticas comerciales responsables y sostenibles. Además, implementamos medidas para reducir nuestro impacto ambiental en todas las facetas de nuestras operaciones, desde la gestión de residuos hasta la optimización de rutas de entrega para minimizar las emisiones de carbono.
        </div>
    </main>


    <section>
        <h1>Descripcion de la empresa</h1>
        <div class="s-info">
            <div class="s-img">
                <img src="./static/img/surti.webp" alt="">
            </div>
            <p class="s-texto">
            Distribuciones al Por Mayor "ProveeTodo" es una empresa dedicada a surtir una amplia gama de productos a tiendas minoristas en todo el país. Fundada en [Año de Fundación], nos hemos convertido en un socio confiable para una variedad de negocios minoristas, desde pequeñas tiendas locales hasta cadenas de supermercados regionales.
            </p>
        </div>
    </section>



    <footer>
        <div class="f-logo">
            <img src="" alt="">
        </div>
        <p> &copy; Suitilider</p>
    </footer>

    <script src="../view/static/js/index.js"></script>
</body>
</html>