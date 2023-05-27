<?php

if (!isset($_SESSION)){
   session_start();
}

if(!isset($_SESSION['email'])) {
    die("Acesse não permitido.<p><a href=\"login.php\"></a></p>");
}
?>