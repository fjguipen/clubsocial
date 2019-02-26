<!DOCTYPE html>
<html lang="es">
<head>
<title>Cub Social EUSA</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/css/style.css">
</head>

<body>
    <header>
    <div class="container">
        <div id="branding">
        <?php include("./views/partials/mainmenu.php"); ?>

          <img class="logo" alt="logo" src="./assets/img/logo.png"/>
          <h1><span class="highlight">CLUB SOCIAL EUSA </span></h1>
        </div>
</div>
    </header>
<div class="container">
        <!-- FORMULARIO -->
        <form action="./" method="POST">
        <div class="row">
        <div class="form-group">
            <label for="nSocio">Número de socio</label>  
            <br>  
            <input type="text" name="nSocio" id="nSocio" required>
            <br><br>
            <label for="password">Contraseña</label>    
            <input type="password" name="password" id="password" required>
        </div>
    </div>
    <label for="newSocio" class="medium">Registrar nuevo socio</label>
    <input type="checkbox" id="newSocio" name="newSocio" value="nuevoCliente">
    <div class="newClientData">
        <div class="row">
            <div class="form-group">
                <label for="nombre">Nombre</label>    
                <br>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>    
                <input type="text" name="apellidos" id="apellidos">
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>    
                <input type="text" name="dni" id="dni">
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>    
                <br>
                <input type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="apellidos">Cuenta Bancaria</label>    
                <input type="text" name="cc" id="cc">
            </div>
            <div class="form-group">
                <label for="telefono">Nº de teléfono</label>    
                <br>
                <input type="number" name="telefono" id="telefono">
            </div>
            <div class="form-group">
                <label for="dir">Dirección</label>    
                <br>
                <input type="text" name="dir" id="dir">
            </div>
            <div class="form-group">
                <label for="miembros">Número de miembros</label>    
                <br>
                <input type="text" name="miembros" id="miembros">
            </div>
        </div>
    </div>    
    <div class="row">
            <div class="form-group">
                <label for="fecha">Fecha de la reserva</label>
                <input type="date" id="fecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="hora">Hora de la reserva</label>
                <input type="time" id="hora" name="hora">
            </div>
            <div class="form-group">
            <label for="instalacion">Instalación</label>
            <select id="instalacion" name="instalacion" required>
                <option selected disabled>-- seleccione una opción --</option>
                <?php
                    foreach($instalaciones as $instalacion){?>
                        <option value="<?php echo $instalacion->id?>"><?php echo $instalacion->nombre?></option>;
                    <?php } 
                ?>
            </select>
            </div>        
        </div> 
        <div class="form-group">
            <input type="submit" class="form-control" value="Entrar">    
        </div>
        </form>
</div>
</body>
</html>