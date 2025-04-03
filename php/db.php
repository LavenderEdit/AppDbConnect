<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = $_POST['host'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "<script>window.location.href = '../views/db-config.php?error=1';</script>";
        exit();
    }

    $_SESSION['db_config'] = [
        'host' => $host,
        'username' => $username,
        'password' => $password,
        'dbname' => $dbname
    ];

    $conn->close();

    echo "<script>window.location.href = '../index.php?success=1';</script>";
    exit();
}
?>