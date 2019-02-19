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
        <div class="row">
            <div class="col-md-2"> Nº Reserva </div>
            <div class="col-md-2"> Nº Socio </div>
            <div class="col-md-2"> Tipo de Reserva </div>
            <div class="col-md-2"> Fecha </div>
            <div class="col-md-2"> Hora </div>
            <?php 
                require ('./models/reserva.php');
                $reservas = reserva::getReservas();
                foreach($reservas as $reserva){?>
                   
                     <div class="col-md-2"> <?php $reserva->num_reserva?></div>
                     <div class="col-md-2"> <?php $reserva->numero_socio?></div>
                     <div class="col-md-2"> <?php $reserva->id_instalacion?></div>
                     <div class="col-md-2"> <?php $reserva->fecha?></div>
                     <div class="col-md-2"> <?php $reserva->minutos?></div>

                    
                <?php } ?>
        </div>

        <div class="row">
            <div class="col-md-4"> Nº de Socio </div>
            <div class="col-md-4"> Nombre y Apellido </div>
            <div class="col-md-4"> Nº Total de Reservas Mensuales </div>
            <?php 
                require ('./models/reserva.php');
                $reservas = reserva::getReservasSocio();
                foreach($reservas as $reserva){?>
                   
                     <div class="col-md-2"> <?php $reserva->numero_socio?></div>
                     <div class="col-md-2"> <?php $reserva->$socio(nombre,ape)?></div>
                     <div class="col-md-2"> <?php $reserva->fecha?></div>

                    
                <?php } ?>
        </div>
    </div>
    </body>
    </html>

<?php } else {
    include ("login.php");
}
?>