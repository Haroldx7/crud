<?php 
    include("./../controller/controllerQuerys/controllerForms.php");
    $consulta = new Formularios();


    if(isset($_GET['mensaje'])){
        echo "Error";
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/validator@13.11.0/validator.min.js"></script>
    <title>Document</title>
</head>
<body>


    <header>
        <div class="h-caja">

            <div class="h-logo">
                <img src="./static/img/logo.png" alt="">
            </div>
        </div>
    </header>

        <div class="r-ventana">
            <!-- ////////////////////////////////////////// -->

        <div class="r-caja-d">
            <h1 id="r-caja-titulo">Direccion</h1>

            <div class="i-caja">
                <label for="barrio">Nomenclatura 1</label>
                <select class="r-v-v" name="" id=""> 
                    <option value="" selected disabled>Seleccionar</option>
                    <?php 
                    $consulta->nomen('nomen1');
                    ?>
                </select>
            </div>
            
            <div class="i-caja">
                <label for="N°">N°</label>
                <input type="number" class="r-v-v" data-id="1" placeholder="N°">
                <span id="a-input-1"></span>
            </div>

            <div class="i-caja">
                <label for="barrio">Nomenclatura 2</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen2');
                ?>
                </select>
            </div>
            
            <div class="i-caja">
                <label for="barrio">Nomenclatura 3</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen3');
                ?>
                </select>
            </div>

            <div class="i-caja">
                <label for="barrio">Nomenclatura 4</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen2');
                ?>
                </select>
            </div>
            <div class="i-caja">
                <label for="barrio">Nomenclatura 5</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen4');
                ?>
                </select>
            </div>
            <div class="i-caja">
                <label for="N°">N°</label>
                <input type="number" class="r-v-v" data-id="2" placeholder="N°">
                <span id="a-input-2"></span>
            </div>
            <div class="i-caja">
                <label for="barrio">Nomenclatura 5</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen2');
                ?>
                </select>
            </div>
            <div class="i-caja">
                <label for="N°">N°</label>
                <input type="number" class="r-v-v" data-id="3" placeholder="N°">
                <span id="a-input-3"></spans>
            </div>
            <div class="i-caja">
                <label for="barrio">Nomenclatura 5</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen4');
                ?>
                </select>
            </div>
        </div>
        <!-- /////////////////////////////// -->

        <!-- /////////////////////////////// -->
        
        <div class="r-caja-d-o">
            <h1 id="r-caja-titulo">Direccion (opcional)</h1>
            <div class="i-caja">
                <label for="barrio">Nomenclatura 5</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen5');
                ?>
                </select>
            </div>

            <div class="i-caja">
                <label for="N°">N°</label>
                <input type="number" class="r-v-v" data-id="4" placeholder="N°">
                <p id="a-input-4"></p>
            </div>
            <div class="i-caja">
                <label for="barrio">Nomenclatura 5</label>
                <select class="r-v-v" name="" id="">
                <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->nomen('nomen5');
                ?>
                </select>
            </div>
            <div class="i-caja">
                <label for="N°">N°</label>
                <input type="number" class="r-v-v" data-id="5"  placeholder="N°">
                <p id="a-input-5"></p>
            </div>
        </div>
        <!-- /////////////////////////////// -->
        <div class="v-caja">
            <button id="r-v-btn-guardar">guardar</button>
            <button id="r-v-btn-cancelar">Cancelar</button>
        </div>
        
        </div>
        

    
    <div class="iniciar">

    <form action="../controller/controllerRules/loginController.php" method="post" class="f-login">
        
        <h1>Login</h1>
        <div class="i-caja">
            <label for="correo">Correo</label>
            <input type="email" name="correo" placeholder="correo">
        </div>

        <div class="i-caja">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" placeholder="Contraseña">
        </div>
        <button id="r-btn-iniciar">Iniciar</button>
        <p id="r-btn-cambio">Registar</p>
    </form>






    

    <form action="../controller/controllerRules/crearController.php" method="post" class="f-register">
        <h1 id="r-titulo">Registrar</h1>
        <div class="i-caja">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" placeholder="nombres" required>
        </div>
        <div class="i-caja">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="apellidos">
        </div>


       
        
        <div class="i-caja">
            <label for="tipodoc">Tipo doc</label>
            <select name="tipodoc" id="" required>
            <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->tipodoc();
                ?>
            </select>
        </div>

        <div class="i-caja">
            <label for="numerodoc">numero doc</label>
            <input type="number" name="numerodoc" placeholder="numero documento" maxlength="10" required>
        </div>


        
        <div class="i-caja">
            <label for="direccion">Direccion</label>
            <input type="text" id="direccion" name="direccion" readonly required>
        </div>




        
        


        


        <div class="i-caja">
            <label for="telefono">Telefono</label>
            <input type="number" name="telefono" placeholder="telefono"  maxlength="10" required>
        </div>



        <div class="i-caja">
            <label for="ciudad">Ciudad</label>
            <select name="ciudad" id="" required>
            <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->ciudad();
                ?>
            </select>


        </div>
        <div class="i-caja">
            <label for="barrio">Barrio</label>
            <select name="barrio" id="" required>
            <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->barrio();
                ?>
            </select>
        </div>

        <div class="i-caja">
            <label for="tipologia">tipologia</label>
            <select name="tipologia" id="" required>
            <option value="" selected disabled>Seleccionar</option>
                <?php 
                    $consulta->tipologia();
                ?>
            </select>
        </div>

        <div class="i-caja">
            <label for="correo">Correo</label>
            <input type="email" name="correo" placeholder="Correo" required>
        </div>

        <div class="i-caja">
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contrasena" placeholder="Contrasena" required>
        </div>
        
        
        <input type="hidden" name="observacion" value="NA">
        <input type="hidden" name="rol" value="1">
        <input type="hidden" name="estado" value="ACT">


        <button id="r-btn-iniciar">Iniciar</button>
        <p id="r-btn-cambio">Iniciar</p>
    </form>
    </div>
    


    


    
    <footer>
        <div class="f-logo">
            <img src="" alt="">
        </div>
        <p> &copy; Suitilider</p>
    </footer>

    <script src="./static/js/login.js"></script>
</body>
</html>