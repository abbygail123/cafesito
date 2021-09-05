<?php
session_start();
session_destroy();
header("Location: http://localhost/cafesito/login/login.php");
?>