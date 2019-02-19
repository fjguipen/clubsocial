<!DOCTYPE html>
<html lang="es">
<head>
<title>Iniciar sesión como administrador</title>
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
        <form>
          Número de socio
          <input type="number" name="numSocio" require>
          <br><br>
          Contraseña
          <input type="password" name="password" require>
          <br><br>
          Instalación
          <br>
          <select name="instalacion">
            <option value="tenis"> Pista de tenis </option> 
            <option value="futbol"> Pista de fútbol </option> 
            <option value="padel"> Pista de pádel </option> 
          </select>
          <br><br>
          Fecha
          <input type="date" name="fecha" require>
          <br><br>
          Hora
          <input type="time" name="hora" require>
          <br><br>
          <input type="submit" name="reservar" value="Reservar">
          <br>
        </form>
</div>
</body>
</html>