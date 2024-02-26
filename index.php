<?php
// Llamamos conexion con db
require_once 'db/connection.php';

// Llamada header de pagina
require_once 'partials/header.php';

// llamada controlador
if (isset($_GET['c']) && !empty($_GET['c'])) {
    switch ($_GET['c']) {
        case 'suspension':
            switch ($_GET['a']) {
                case 'asignar_suspension':
                    $id_proyecto = $_GET['id'];
                    require_once 'controllers/alerta_suspension.php';
                    break;
                case 'suspension':
                    $id_proyecto = $_GET['id'];
                    require_once 'controllers/suspension.php';
                    break;
            }
            break;
        case 'pago':
            switch ($_GET['a']) {
                case 'registro_pagos':
                    $id_proyecto = $_GET['id'];
                    require_once 'controllers/pago.php';
                    break;
            }
            break;
    }
} else {
    require_once 'controllers/proyecto.php';
}

// Llamada footer de pagina
require_once 'partials/footer.php';