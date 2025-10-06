<?php
session_start();
session_unset();
session_destroy();

// Redirect ke login dengan pesan via query string ($_GET)
header("Location: login.php?status=logout");
exit;
?>
