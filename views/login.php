<!DOCTYPE html>
<html lang="es">
<head>
<title>Iniciar sesión como administrador</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<header>
        <?php include("./views/partials/mainmenu.php"); ?>
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
            <input type="submit" class="btn btn-primary" value="Entrar">    
        </div>
    </form>
</div>
</body>
</html>