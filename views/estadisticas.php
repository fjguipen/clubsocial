<?php 

if (isset($_SESSION["user"])){ ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Estadísticas</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
    </head>

    <body>
    <header>
            <?php include("./views/partials/mainmenu.php"); ?>
            <h1>Estadísticas</h1>
        </header>
    <div id="contenedor"></div>
    <script>
      anychart.onDocumentReady(function() {
 
        // set the data
        var data = {
            header: ["Name", "Nº de reservas"],
            rows: [
              ["Pista de tenis", 60],
              ["Pista de fútbol", 120],
              ["Pista de pádel", 200]
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

<?php } else {
    include ("login.php");
}
?>