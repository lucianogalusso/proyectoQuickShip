<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_proyecto');
if ($conexion->connect_errno) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

?>