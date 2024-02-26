<?php
// Llamada model suspenson
require_once 'models/suspension.php';
$suspension = new SuspensionModelo(Connection::connection());

// Llamada model proyecto
require_once 'models/proyecto.php';
$proyecto = new ProyectoModelo(Connection::connection());
$busqueda_proyecto = $proyecto->obtener_busqueda_proyecto($id_proyecto);

// Llamada view suspension
require_once 'views/suspension.php';
?>