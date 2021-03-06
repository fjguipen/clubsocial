


    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Estadísticas</title>
        <?php include('./views/partials/head_links.php') ?>
        <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
    </head>

    <body>
    <header>
        <div class="container">
            <div id="branding">
            <?php include("./views/partials/mainmenu.php"); ?>
            <img class="logo" alt="logo" src="http://<?php echo $_SERVER['HTTP_HOST']?>/clubsocial/assets/img/logo.png"/>
            <h1><span class="highlight">ESTADÍSTICAS</span></h1>
            </div>
        </div>
    </header>
    <div id="container"></div>
    <script>
      anychart.onDocumentReady(function() {
 
        // set the data
        var data = {
            header: ["Name", "Nº de reservas"],
            rows: [
                <?php
                    echo $informacion;
                ?>
        ]};
 
        // create the chart
        var chart = anychart.bar();
 
        // add the data
        chart.data(data);
 
        // set the chart title
        chart.title("Estadística - Nº de alquileres de las instalaciones - Club Social EUSA");
 
        // draw
        chart.container("container");
        chart.draw();
      });
    </script>

    </div>
    </body>
    </html>