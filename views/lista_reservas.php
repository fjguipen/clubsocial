    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Gestión de reservas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/css/style.css">
    </head>

    <body>
    <header>
        <div class="container">
            <div id="branding">
            <?php include("./views/partials/mainmenu.php"); ?>
            <img class="logo" alt="logo" src="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/img/logo.png"/>
            <h1><span class="highlight">RESERVAS</span></h1>
            </div>
        </div>
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

                //El controlador ya ha cargado $reservas con los datos               
                //$reservas = Reserva::getReservas();

            //Recorrido y obtención de datos de las reservas del socio correspondiente:
            foreach($reservas as $reserva){?>
            <!--Planificación para el resto de filas tabla1-->
            <div class="row">   
                <!--Obtención de datos del socio correspondiente

                *******************************************************************
                *******************************************************************
                        VER CLASE RESERVA Y COMPROBAR SUS ATRIBUTOS,
                        LOS QUE AQUI SE LLAMAN NO COINCIDEN CON LOS DE LA
                        CLASE RESERVA
                *******************************************************************
                *******************************************************************        


                Nº Reserva | Nº Socio | Tipo de Instalación | Fecha | Hora -->
                    <div class="col-md-2"> <?php $reserva->id?></div>
                    <div class="col-md-2"> <?php $reserva->socio?></div>
                    <div class="col-md-2"> <?php $reserva->instalacion?></div>
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

            //En el controlador se carga una variable $socios, con los valores necesarios para mostrar
            /*
                Socios: [Socio]
                Socio: [
                    nºSocio,
                    dni,
                    totalReservas
                ]
            */    
            //$reservas = Reserva::getReservasSocio();
            foreach($socios as $socio){?>
            <!--Planificación de resto de filas para tabla 2-->
            <div class="row">  
                <!--Obtención de datos del socio correspondiente
                Nº Socio | Nombre de Socio | Apellido de Socio | Nº total de Reservas Mensuales -->
                    <div class="col-md-2"> <?php $socio[0]?></div>
                    <div class="col-md-2"> <?php $socio[1]?></div>
                    <div class="col-md-2"> <?php $socio[2]?></div>               
            <?php } ?>
            </div>
</div>
</body>
</html>