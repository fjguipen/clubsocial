    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Gestión de reservas</title>
        <?php include('./views/partials/head_links.php') ?>
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
        <div class="tabla">
            <div class="row_table">
                <!--Fila 1 con datos por columnas => Nº Reserva | Nº Socio | Tipo de Reserva | Fecha | Hora-->
                <div class="col-md-2 col-center"> Nº Reserva </div>
                <div class="col-md-2 col-center"> Nº Socio </div>
                <div class="col-md-2 col-center"> Instalacion </div>
                <div class="col-md-2 col-center"> Fecha </div>
                <div class="col-md-2 col-center"> Hora </div>
            </div>
                <?php

                    //El controlador ya ha cargado $reservas con los datos               
                    //$reservas = Reserva::getReservas();

                //Recorrido y obtención de datos de las reservas del socio correspondiente:
                foreach($reservas as $reserva){?>
                <!--Planificación para el resto de filas tabla1-->
                <div class="row_table">   
                    <!--Obtención de datos del socio correspondiente

                    *******************************************************************
                    *******************************************************************
                            VER CLASE RESERVA Y COMPROBAR SUS ATRIBUTOS,
                            LOS QUE AQUI SE LLAMAN NO COINCIDEN CON LOS DE LA
                            CLASE RESERVA
                    *******************************************************************
                    *******************************************************************        


                    Nº Reserva | Nº Socio | Tipo de Instalación | Fecha | Hora -->
                        <div class="col-md-2 col-center"> <?php echo $reserva->id?></div>
                        <div class="col-md-2 col-center"> <?php echo $reserva->socio->id?></div>
                        <div class="col-md-2 col-center"> <?php echo $reserva->instalacion->id?></div>
                        <div class="col-md-2 col-center"> <?php echo $reserva->fecha?></div>
                        <div class="col-md-2 col-center"> <?php echo $reserva->minutos?></div>
                </div>        
                <?php } ?>
                
        </div>
        <!--Planificación de filas para tabla 2-->
        <div class="row_table">
        <!---->
        <div class="col-md-4 col-center"> Nº de Socio </div>
        <div class="col-md-4 col-center"> DNI </div>
        <div class="col-md-4 col-center"> Nº Total de Reservas Mensuales </div>
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
            <div class="row_table">  
                <!--Obtención de datos del socio correspondiente
                Nº Socio | DNI de Socio | Nº total de Reservas Mensuales -->
                    <div class="col-md-4 col-center"> <?php echo $socio[0]?></div>
                    <div class="col-md-4 col-center"> <?php echo $socio[1]?></div>
                    <div class="col-md-4 col-center"> <?php echo $socio[2]?></div>  
            </div>             
            <?php } ?>
            
    </div>
</body>
</html>