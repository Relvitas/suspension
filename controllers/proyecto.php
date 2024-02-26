<?php
// Llamada model proyecto
require_once 'models/proyecto.php';
$proyecto = new ProyectoModelo(Connection::connection());
$lista_proyecto = $proyecto->obtener_proyectos();

// Llamada model suspension

require_once 'models/suspension.php';
$suspension = new SuspensionModelo(Connection::connection());

// Llamada view proyectos
require_once 'views/proyectos.php';
?>