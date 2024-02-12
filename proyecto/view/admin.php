<?php 
    include("./../controller/controllerQuerys/userControllerQuery.php");
    $usuarios = new UserControllerQuery();
    include("./../controller/controllerQuerys/controllerForms.php");
    $consulta = new Formularios();
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: ./../view/login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/validator@13.11.0/validator.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="h-caja">
            
            <div class="h-logo">
                <img src="./static/img/logo.png" alt="">
            </div>
        
            <div class="h-link" style="background:none;" >
                <a href="index.php">Volver</a>

            </div>
        </div>
    </header>

    <div class="barra-busqueda">
        <div class="caja-busqueda">
            <input type="text" class="busqueda" id="busqueda" placeholder="Buscar...">
        </div>
        
    </div>


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
            <button id="r-v-btn-guardar">Crear</button>
            <button id="r-v-btn-cancelar">Consultar</button>
        </div>
        
        </div>






    <main>
        <h1>Empleados</h1>
        <div class="tabla">
            <div class="encabezado">
                <span>ID</span>
                <span>Nombre</span>
                <span>Tel</span>
                <span>Tipolog</span>
                <span>Doc</span>
                <span>Direccion</span>
                <span>Estado</span>
                <span>Acciones</span>
            </div>
            <div class="cuerpo">
                <?php 
                $usuarios->consular();
                
                ?>
            </div>
        </div>
    </main>
    

    <div class="iniciar" >
    
        <form action="../controller/controllerRules/editarController.php" method="post" class="f-register">
            <h1 id="r-titulo">Editar</h1>

            <div class="i-caja">
                <label for="nombres">Id</label>
                <input type="number" class="f-campo" id="id" name='id' readonly required style="cursor: not-allowed;">
            </div>

            <div class="i-caja">
                <label for="nomrol">Nombre rol</label>
                <input type="text" class="f-campo" value="" name="nomrol" disabled required>
            </div>

            <div class="i-caja">
                <label for="nombres">Nombres</label>
                <input type="text" class="f-campo" value="" name="nombres" required>

            </div>
            <div class="i-caja">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="f-campo" value="" name="apellidos" required>
            </div>
    
    
           
            
            <div class="i-caja">
                <label for="tipodoc">Tipo doc</label>
                <select name="tipodoc" id="" class="f-campo" required>  
                    <?php 
                        $consulta->tipodoc();
                    ?>
                </select>
            </div>
    
            <div class="i-caja">
                <label for="numerodoc">numero doc</label>
                <input type="text" class="f-campo" value="" name="numerodoc"  maxlength="10" placeholder="numero documento" required readonly style="cursor: not-allowed;">
            </div>
    
            <div class="i-caja">
                <label for="direccion">Direccion</label>
                <input type="text" class="f-campo" value="" id="direccion" name="direccion" readonly required>
            </div>

    
    
            
            
    
    
            
    
    
            <div class="i-caja">
                <label for="telefono">Telefono</label>
                <input type="number" class="f-campo" value="" name="telefono"  maxlength="10" placeholder="telefono" required>
            </div>
    
    
    
            <div class="i-caja">
                <label for="ciudad">Ciudad</label>
                <select name="ciudad" class="f-campo" id="" required>
                    <?php 
                        $consulta->ciudad();
                    ?>
                </select>
    
    
            </div>
            <div class="i-caja">
                <label for="barrio">Barrio</label>
                <select name="barrio" class="f-campo" id="" required>
                    <?php 
                        $consulta->barrio();
                    ?>
                </select>
            </div>
    
            <div class="i-caja">
                <label for="tipologia">tipologia</label>
                <select name="tipologia" class="f-campo" id="" required>
                    <?php 
                        $consulta->tipologia();
                    ?>
                </select>
            </div>
    
            <div class="i-caja">
                <label for="correo">Correo</label>
                <input type="email" class="f-campo" value="" name="correo" placeholder="Correo" required>
            </div>
    
            <div class="i-caja">
                <label for="contraseña">Contraseña</label>
                <input type="password" class="f-campo" value="" name="contrasena" placeholder="Contrasena" required>
            </div>
            
            <div class="i-caja">
                <label for="observacion">Observacion</label>
                <input type="text" class="f-campo" name="observacion" required>
            </div>

            <div class="i-caja">
                <label for="rol">Rol</label>
                <input type="text" class="f-campo" name="rol" required>
            </div>

            <div class="i-caja">
                <label for="estado">Estado</label>
                <select name="estado" class="f-campo" id="" required>
                <option value="ACT" class="estado">ACT</option>
                <option value="INA" class="estado">INA</option>
                </select>
            </div>
            
            <input type="hidden" name="idcreacion" value="<?php if(isset($_SESSION['usuario']['id'])){ 
                echo $_SESSION['usuario']['id'];
                } ?>">
    
            <button id="r-btn-iniciar">Editar</button>
            <p id="r-btn-cancelar">Cancelar</p>
        </form>
       
        
    
        </div>

    

    <div class="iniciar-crear">        

        <form action="../controller/controllerRules/crearAdminController.php" method="post" class="f-register" >
            <h1 id="r-titulo">Crear</h1>
            <div class="i-caja">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" placeholder="nombres" required>
            </div>
            <div class="i-caja">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" placeholder="apellidos" required>
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
                <input type="text" name="numerodoc" placeholder="numero documento"  maxlength="10" required>
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
            <div class="i-caja">
                <label for="rol">Rol</label>
                <input type="number" name="rol" placeholder="Rol">
            </div>
            
            <input type="hidden" name="observacion" value="NA">
            
            <input type="hidden" name="estado" value="ACT">
            <input type="hidden" name="idcreacion" value="<?php if(isset($_SESSION['usuario']['id'])){ 
                echo $_SESSION['usuario']['id'];
                } ?>">
    
            <button id="r-btn-iniciar">Crear</button>
            <p id="r-btn-cambio">Cancelar</p>
        </form>
       
        
    
        </div>


    <div class="botones">
        <button id="btn-crear">Crear</button>
        <button id="btn-consultar">Consultar</button>
    </div>

    
    <div class="consulta">
        
        <div class="caja-consulta">
            <h1>consultar</h1>
            <div class="i-caja">
                <label for="cedula-con">Documento</label>
                <input type="text" name="cedula-con"  maxlength="10" placeholder="cedula-con">
            </div>

            <div class="i-caja">
                <label for="direccion-con">Direccion</label>
                <input type="text" name="direccion-con" placeholder="direccion-con">
            </div>

            <div class="i-caja">
                <label for="id-con">id</label>
                <input type="number" name="id-con" placeholder="id-con">
            </div>

            <div class="i-caja">
                <label for="correo-con">correo</label>
                <input type="text" name="correo-con" placeholder="correo-con">
            </div>

            <div class="i-caja">
                <label for="estado-con">Estado</label>
                <select name="estado-con" id="estado-con">
                    <option value="" selected>Seleccionar</option>
                    <option value="ACT">ACT</option>
                    <option value="INA">INA</option>      
                </select>
            </div>

            <div class="caja-b-c" >
                <button id="btn-consulta-c">Consultar</button>
                <button id="btn-cancelar-c">Cancelar</button>
            </div>
        </div>
    </div>

    <main class="consulta-datos">
        <h1>Empleados</h1>
        <div class="tabla">
            <div class="encabezado">
                <span>ID</span>
                <span>Nombre</span>
                <span>Tel</span>
                <span>Tipolog</span>
                <span>Doc</span>
                <span>Direccion</span>
                <span>Estado</span>
                <span>Acciones</span>
            </div>
            <div class="cuerpo cuerpo-consulta">
                
            </div>
        </div>
    </main>

    <footer>
        <div class="f-logo">
            <img src="" alt="">
        </div>
        <p> &copy; Suitilider</p>
    </footer>

<script src="./static/js/admin.js"></script>
</body>
</html>