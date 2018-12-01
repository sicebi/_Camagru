<?php
session_start();
header("Location: ../index.php");
session_destroy();
//unset($_SESSION['username']);
?>
