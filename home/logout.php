<?php
session_start();
session_destroy();
header('Location: ../index/index.php'); // Redirect to your login page
?>
