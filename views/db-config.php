<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>

<div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
    <h1 class="mb-3">Configuración de la Base de Datos</h1>
    <form action="php/db.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="host" class="form-label">Host:</label>
            <input type="text" name="host" id="host" class="form-control" required>
            <div class="invalid-feedback">Por favor ingresa el host.</div>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Usuario:</label>
            <input type="text" name="username" id="username" class="form-control" required>
            <div class="invalid-feedback">Ingresa el usuario.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="dbname" class="form-label">Nombre de la Base de Datos:</label>
            <input type="text" name="dbname" id="dbname" class="form-control" required>
            <div class="invalid-feedback">Ingresa el nombre de la base de datos.</div>
        </div>
        <button type="submit" class="btn btn-primary">Probar Conexión</button>
        <a href="index.php" class="btn btn-secondary ms-2">Volver al Menú</a>
    </form>
</div>

<?php include '../includes/footerbar.php'; ?>
<?php include '../includes/footer.php'; ?>