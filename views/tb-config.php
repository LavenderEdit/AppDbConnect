<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card shadow p-4">
                <h2 class="text-center mb-4">Configuración de la Tabla</h2>
                <form id="tableForm" action="php/submit_table.php" method="post" enctype="multipart/form-data">
                    <div id="table-name-container" class="mb-3"></div>
                    <div id="fields" class="mb-3">
                        <!-- Aquí se agregarán dinámicamente los inputs -->
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" onclick="addTableName()" class="btn btn-warning">Añadir Nombre de
                            Tabla</button>
                        <button type="button" onclick="addInput()" class="btn btn-outline-primary">Añadir Campo</button>
                        <button type="submit" class="btn btn-success">Guardar Configuración</button>
                        <a href="index.php" class="btn btn-secondary">Volver al Menú</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footerbar.php'; ?>
<?php include '../includes/footer.php'; ?>