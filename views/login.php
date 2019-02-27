<!DOCTYPE html>
<html lang="es">
<head>
<title>Administrador</title>
    <?php include('./views/partials/head_links.php') ?>
</head>

<body>
<header>
    <div class="container">
        <div id="branding">
        <?php include("./views/partials/mainmenu.php"); ?>
          <img class="logo" alt="logo" src="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/img/logo.png"/>
          <h1><span class="highlight">ACCESO</span></h1>
        </div>
    </div>
</header>
<div class="container">
    <form action="./controllers/admin_ctrl.php?location=<?php echo $_SERVER['REQUEST_URI']  ?>" method="POST">
        <div class="form-group">
            <label for="username">Nombre de usuario:</label>
            <input id="username" name="username"class="form-control" type="text" value="" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input id="password" name="password" class="form-control" type="password" value="" required>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" value="Entrar">    
        </div>
    </form>
</div>
</body>
</html>