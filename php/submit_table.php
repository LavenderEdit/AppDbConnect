<?php
session_start();

if (!isset($_SESSION['db_config'])) {
    die("No hay conexión activa a la base de datos.");
}

$db_config = $_SESSION['db_config'];
$conn = new mysqli($db_config['host'], $db_config['username'], $db_config['password'], $db_config['dbname']);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$table_name = isset($_POST['table_name']) ? trim($_POST['table_name']) : 'tabla_generica';

$nombres = $_POST['campo_nombre'];
$tipos = $_POST['campo_tipo'];
$valores_text = isset($_POST['campo_valor']) ? $_POST['campo_valor'] : [];
$valores_file = isset($_FILES['campo_valor']) ? $_FILES['campo_valor'] : null;

if (empty($table_name) || empty($nombres) || empty($tipos)) {
    die("Error: Datos incompletos.");
}

$createTableQuery = "CREATE TABLE IF NOT EXISTS `$table_name` (id INT AUTO_INCREMENT PRIMARY KEY, ";
$fields = [];

for ($i = 0; $i < count($nombres); $i++) {
    $nombreCampo = mysqli_real_escape_string($conn, $nombres[$i]);
    $tipoCampo = strtolower($tipos[$i]);

    if ($tipoCampo === 'varchar') {
        $fields[] = "`$nombreCampo` VARCHAR(255)";
    } elseif ($tipoCampo === 'int') {
        $fields[] = "`$nombreCampo` INT";
    } elseif ($tipoCampo === 'blob' || $tipoCampo === 'file') {
        $fields[] = "`$nombreCampo` LONGBLOB";
    } else {
        $fields[] = "`$nombreCampo` TEXT";
    }
}

$createTableQuery .= implode(", ", $fields) . ")";
$conn->query($createTableQuery);

$insertQuery = "INSERT INTO `$table_name` (";
$columnNames = [];
$columnValues = [];

for ($i = 0; $i < count($nombres); $i++) {
    $nombreCampo = mysqli_real_escape_string($conn, $nombres[$i]);
    $tipoCampo = strtolower($tipos[$i]);

    $columnNames[] = "`$nombreCampo`";

    if ($tipoCampo === 'file' || $tipoCampo === 'blob') {
        if ($valores_file && isset($valores_file['tmp_name'][$i]) && is_uploaded_file($valores_file['tmp_name'][$i])) {
            $blob = file_get_contents($valores_file['tmp_name'][$i]);
            $columnValues[] = "'" . mysqli_real_escape_string($conn, $blob) . "'";
        } else {
            $columnValues[] = "NULL";
        }
    } else {
        $valorCampo = isset($valores_text[$i]) ? mysqli_real_escape_string($conn, $valores_text[$i]) : 'NULL';
        $columnValues[] = "'$valorCampo'";
    }
}

$insertQuery .= implode(", ", $columnNames) . ") VALUES (" . implode(", ", $columnValues) . ")";
$conn->query($insertQuery);

$conn->close();

echo "<script>window.location.href = '../index.php?success=3&table=$table_name';</script>";
exit();
?>