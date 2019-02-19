<!DOCTYPE html>
<html lang="es">
<head>
<title>Cub Social EUSA</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/style.css">
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
        <br><br><br><br><br>
        <form action="./controllers/home_ctrl.php" method="POST">
        <div class="row">
        <div class="form-group">
            <label for="dni">DNI</label>  
            <br>  
            <input type="text" name="dni" id="dni" required>
            <br><br>
            <label for="password">Contraseña</label>    
            <input type="password" name="password" id="password" required>
        </div>
    </div>
    <label for="newSocio" class="medium">Registrar nuevo socio</label>
    <input type="checkbox" id="newClient" name="newSocio" value="nuevoCliente">
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
        </div>
    </div>    
    <div class="row">
            <div class="form-group">
                <label for="fecha">Fecha de la reserva</label>
                <input type="date" id="fecha" name="fecha">
            </div>
            <div class="form-group">
            <label for="tipo">Instalación</label>
            <select id="tipo" name="tipo" required>
                <option selected disabled>-- seleccione una opción --</option>
                <option value="tenis">Tenis</option>
                <option value="padel">Pádel</option>
                <option value="futbol">Fútbol</option>

            </select>
            </div>        
        </div> 
        <div class="centro1">
        <button type="submit">REGISTRAR</button>
      </div>
        </form>
</div>
</body>
</html>