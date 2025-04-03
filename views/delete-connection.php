<?php
session_start();
unset($_SESSION['db_config']);
header("Location: ../index.php?success=2");
exit();
?>