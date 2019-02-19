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
            <!--Incluimos la vista del mainmenu-->
            <?php include("./views/partials/mainmenu.php"); ?>
            <h1>Gestión de reservas</h1>
        </header>
        <!--Comienzo de la tabla-->
    <div class="container">
        <!--Planificación de fila 1 para tabla 1-->
        <div class="row">
            <!--Fila 1 con datos por columnas => Nº Reserva | Nº Socio | Tipo de Reserva | Fecha | Hora-->
            <div class="col-md-2"> Nº Reserva </div>
            <div class="col-md-2"> Nº Socio </div>
            <div class="col-md-2"> Tipo de Reserva </div>
            <div class="col-md-2"> Fecha </div>
            <div class="col-md-2"> Hora </div>
        </div>
            <?php               
                $reservas = Reserva::getReservas();
                //Recorrido y obtención de datos de las reservas del socio correspondiente:
                foreach($reservas as $reserva){?>
                <!--Planificación para el resto de filas tabla1-->
                <div class="row">   
                    <!--Obtención de datos del socio correspondiente
                    Nº Reserva | Nº Socio | Tipo de Instalación | Fecha | Hora -->
                     <div class="col-md-2"> <?php $reserva->num_reserva?></div>
                     <div class="col-md-2"> <?php $reserva->numero_socio?></div>
                     <div class="col-md-2"> <?php $reserva->id_instalacion?></div>
                     <div class="col-md-2"> <?php $reserva->fecha?></div>
                     <div class="col-md-2"> <?php $reserva->minutos?></div>
                <?php } ?>
                </div>
        <!--Planificación de filas para tabla 2-->
        <div class="row">
            <!---->
            <div class="col-md-4"> Nº de Socio </div>
            <div class="col-md-4"> Nombre y Apellido </div>
            <div class="col-md-4"> Nº Total de Reservas Mensuales </div>
        </div>
            <?php 
                $reservas = Reserva::getReservasSocio();
                foreach($reservas as $reserva){?>
                <!--Planificación de resto de filas para tabla 2-->
                <div class="row">  
                    <!--Obtención de datos del socio correspondiente
                    Nº Socio | Nombre de Socio | Apellido de Socio | Nº total de Reservas Mensuales -->
                     <div class="col-md-2"> <?php $reserva->numero_socio?></div>
                     <div class="col-md-2"> <?php $reserva->socio->nombre." ".$reserva->socio->ape?></div>
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