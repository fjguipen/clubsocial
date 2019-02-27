<!DOCTYPE html>
<html lang="es">
<head>
    <title>Factura</title>
    <?php include(dirname(__FILE__).'./views/partials/head_links.php') ?>
</head>
<body>
    <header>
            <div class="container">
                <div id="branding">
                <?php include(dirname(__FILE__)."./views/partials/mainmenu.php"); ?>
                <img class="logo" alt="logo" src="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/img/logo.png"/>
                <h1><span class="highlight">FACTURA</span></h1>
                </div>
            </div>
    </header>
        <div class="container">
        <h4 style="color: white;float:left;">
            Nombre: <?php echo $datosSocio[0]; ?>
            DNI: <?php echo $datosSocio[1]; ?>
        </h4>
        <p style="color: white;float:right;">
            Mes: 02
            Año: 2019
        </p>
        <div style="clear: both"></div>
        <div class="tabla">
            <div class="row_table">
                <!-- Fila 1 con datos por columnas =>  Instalacion | Fecha | Precio -->
                <!-- <div class="col-md-2 col-center"> Nombre Socio </div> -->
                <!-- <div class="col-md-2 col-center"> DNI </div> -->
                <div class="col-md-2 col-center titulo"> Instalacion </div>
                <div class="col-md-2 col-center titulo"> Fecha </div>
                <div class="col-md-2 col-center titulo"> Precio </div>
            </div>
                <?php

                //Recorrido y obtención de datos de las reservas del socio correspondiente:
                foreach($contenido[1] as $reserva){?>
                <!--Planificación para el resto de filas tabla1-->
                <div class="row_table">   

                    <!-- Nombre Socio | DNI | Instalacion | Fecha | Precio -->
                        <!-- <div class="col-md-2 col-center"> <?php echo $datosSocio[0]?></div> -->
                        <!-- <div class="col-md-2 col-center"> <?php echo $datosSocio[1]?></div> -->
                        <div class="col-md-2 col-center"> <?php echo $reserva[0]?></div>
                        <div class="col-md-2 col-center"> <?php echo $reserva[2]?></div>
                        <div class="col-md-2 col-center"> <?php echo $reserva[1]?></div>
                </div>        
                <?php } ?>
                
        </div>            
        </div>
</body>
</html>