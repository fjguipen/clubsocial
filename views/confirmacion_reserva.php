<!DOCTYPE html>
<html lang="es">
<head>
<title>Cub Social EUSA</title>
    <?php include('./views/partials/head_links.php') ?>
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
    <h2 style="color:white;"><?php  echo $respuesta ?></h2>
    <a style="color:white;margin-top:10px;" href="http://<?php echo $_SERVER["HTTP_HOST"]."/clubsocial" ?>">Volver</a>
</div>
</body>
</html>