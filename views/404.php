<?php
    header("HTTP/1.0 404 Not Found");
?>
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
        <br><br><br><br><br>
        <h1 style="color:white">Error 404. Página no encontrada</h1>
</div>
</body>
</html>