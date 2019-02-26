<!DOCTYPE html>
<html lang="es">
<head>
    <title>Factura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/css/style.css">
</head>
<body>
    <header>
            <div class="container">
                <div id="branding">
                <?php include("./views/partials/mainmenu.php"); ?>
                <img class="logo" alt="logo" src="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/img/logo.png"/>
                <h1><span class="highlight">FACTURA</span></h1>
                </div>
            </div>
    </header>
        <div class="container">
            <form action="./controllers/admin_ctrl.php?location=<?php echo $_SERVER['REQUEST_URI']  ?>" method="POST">
                    <div class="form-group">
                        <label for="nSocio">Numero de socio:</label>
                        <input id="nSocio" name="nSocio"class="form-control" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="mes">Mes:</label>
                        <input id="mes" name="mes" class="form-control" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="anio">Año:</label>
                        <input id="anio" name="anio" class="form-control" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control" value="Enviar">    
                    </div>
            </form>
        </div>
</body>
</html>