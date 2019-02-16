<?php

if (isset($_SESSION["user"])){ ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Gestión de reservas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <?php include("./views/partials/mainmenu.php"); ?>
            <h1>Gestión de reservas</h1>
        </header>
    <div class="container">
    </div>
    </body>
    </html>

<?php } else {
    include ("login.php");
}
?>