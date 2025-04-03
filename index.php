<?php
session_start();
$conexion_existente = isset($_SESSION['db_config']);
?>

<?php include './includes/header.php'; ?>
<?php include './includes/navbar.php'; ?>

<div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
    <h1 class="text-center mb-4">Menú Principal</h1>

    <?php if (isset($_GET['success'])): ?>
        <?php if ($_GET['success'] == 1): ?>
            <div class="alert alert-success">Conexión guardada correctamente.</div>
        <?php elseif ($_GET['success'] == 2): ?>
            <div class="alert alert-warning">Conexión borrada correctamente.</div>
        <?php elseif ($_GET['success'] == 3): ?>
            <div class="alert alert-info">Datos insertados en la tabla correctamente.</div>
        <?php endif; ?>
    <?php endif; ?>


    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Error al conectar con la base de datos.</div>
    <?php endif; ?>

    <div class="list-group">
        <?php if (!$conexion_existente): ?>
            <a href="views/db-config.php" class="list-group-item list-group-item-action">Configurar Conexión a la Base de
                Datos</a>
        <?php endif; ?>

        <?php if ($conexion_existente): ?>
            <a href="views/tb-config.php" class="list-group-item list-group-item-action">Configurar Tabla y Subir Datos</a>
            <a href="views/delete-connection.php"
                class="list-group-item list-group-item-action list-group-item-danger">Eliminar Conexión</a>
        <?php endif; ?>
    </div>
</div>

<?php include './includes/footerbar.php'; ?>
<?php include './includes/footer.php'; ?>