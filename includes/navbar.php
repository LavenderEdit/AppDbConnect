<?php
$current_page = basename($_SERVER['SCRIPT_NAME']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Lavender Corp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'db-config.php' ? 'active' : '' ?>"
                        href="views/db-config.php">Configuración de la conexión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page == 'tb-config.php' ? 'active' : '' ?>"
                        href="views/tb-config.php">Inserción de Datos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>