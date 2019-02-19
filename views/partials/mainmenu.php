<nav>
    <ul>
        <li><a href="http://<?php echo $_SERVER["HTTP_HOST"]."/clubsocial" ?>">Inicio</a></li>
        <li><a href="http://<?php echo $_SERVER["HTTP_HOST"]."/clubsocial/reservas" ?>">Reservas</a></li>
        <li><a href="http://<?php echo $_SERVER["HTTP_HOST"]."/clubsocial/estadisticas" ?>">Estadísticas</a></li>
        <?php if (isset($_SESSION["user"])){ ?>
            <li><a href="./controllers/admin_ctrl.php?location=<?php echo $_SERVER['REQUEST_URI']."&logout=true" ?>">Salir</a></li>
        <?php } ?>
    </ul>
</nav>