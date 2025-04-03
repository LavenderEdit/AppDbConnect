<?php
session_start();

if (!isset($_SESSION['db_config'])) {
    die("<div class='container mt-5'><div class='alert alert-danger'>No hay conexión activa a la base de datos.</div></div>");
}

$db_config = $_SESSION['db_config'];
$conn = new mysqli($db_config['host'], $db_config['username'], $db_config['password'], $db_config['dbname']);

if ($conn->connect_error) {
    die("<div class='container mt-5'><div class='alert alert-danger'>Conexión fallida: " . $conn->connect_error . "</div></div>");
}

$table_name = isset($_POST['table_name']) && trim($_POST['table_name']) !== '' ? trim($_POST['table_name']) : 'tabla_generica';
$nombres = isset($_POST['campo_nombre']) ? $_POST['campo_nombre'] : [];
$tipos = isset($_POST['campo_tipo']) ? $_POST['campo_tipo'] : [];
$valores_text = isset($_POST['campo_valor']) ? $_POST['campo_valor'] : [];
$valores_file = isset($_FILES['campo_valor']) ? $_FILES['campo_valor'] : null;

if (empty($table_name) || empty($nombres) || empty($tipos)) {
    die("<div class='container mt-5'><div class='alert alert-warning'>Error: Datos incompletos (falta nombre de tabla o campos).</div></div>");
}

$tableCheckQuery = "SHOW TABLES LIKE '$table_name'";
$resultCheck = $conn->query($tableCheckQuery);
$tableExists = ($resultCheck && $resultCheck->num_rows > 0);

if (!$tableExists) {
    $createTableQuery = "CREATE TABLE `$table_name` (id INT AUTO_INCREMENT PRIMARY KEY, ";
    $fields = [];
    for ($i = 0; $i < count($nombres); $i++) {
        $nombreCampo = mysqli_real_escape_string($conn, $nombres[$i]);
        $tipoCampo = strtolower($tipos[$i]);
        switch ($tipoCampo) {
            case 'int':
                $fields[] = "`$nombreCampo` INT";
                break;
            case 'varchar':
                $fields[] = "`$nombreCampo` VARCHAR(255)";
                break;
            case 'blob':
            case 'file':
                $fields[] = "`$nombreCampo` LONGBLOB";
                break;
            default:
                $fields[] = "`$nombreCampo` TEXT";
                break;
        }
    }
    $createTableQuery .= implode(", ", $fields) . ")";
    $conn->query($createTableQuery);
}

$columnNames = [];
$columnValues = [];
$textIndex = 0;

for ($i = 0; $i < count($nombres); $i++) {
    $nombreCampo = mysqli_real_escape_string($conn, $nombres[$i]);
    $tipoCampo = strtolower($tipos[$i]);
    $columnNames[] = "`$nombreCampo`";

    if ($tipoCampo === 'file' || $tipoCampo === 'blob') {
        if ($valores_file && isset($valores_file['error'][$i]) && $valores_file['error'][$i] === UPLOAD_ERR_OK) {
            $blob = file_get_contents($valores_file['tmp_name'][$i]);
            $columnValues[] = "'" . mysqli_real_escape_string($conn, $blob) . "'";
        } else {
            $columnValues[] = "NULL";
        }
    } else {
        $valorCampo = isset($valores_text[$textIndex]) ? mysqli_real_escape_string($conn, $valores_text[$textIndex]) : '';
        $columnValues[] = "'$valorCampo'";
        $textIndex++;
    }
}

$insertQuery = "INSERT INTO `$table_name` (" . implode(", ", $columnNames) . ") VALUES (" . implode(", ", $columnValues) . ")";
$conn->query($insertQuery);
$conn->close();
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <div class="alert alert-success">Datos insertados correctamente en la tabla
        '<strong><?php echo htmlspecialchars($table_name); ?></strong>'.</div>
    <a href="index.php" class="btn btn-primary">Volver al inicio</a>
    <a href="add_table.php" class="btn btn-secondary">Añadir otra tabla</a>
</div>
<?php include '../includes/footer.php'; ?>