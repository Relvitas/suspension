<?php
// Llamada model proyecto
require_once 'models/proyecto.php';
$proyecto = new ProyectoModelo(Connection::connection());
$datos_proyecto = $proyecto->obtener_busqueda_proyecto($id_proyecto);

// Convertimos fechas a objetos DateTime
$fecha_inicio_suspension = new DateTime($_POST['fecha_inicio_suspension']); 
$fecha_fin_suspension = new DateTime($_POST['fecha_fin_suspension']);
$fecha_inicio_proyecto = new DateTime($datos_proyecto->fecha_inicio);
$fecha_fin_proyecto = new DateTime($datos_proyecto->fecha_fin);


// Calcular y asignar fecha suspension a fecha final de proyecto
$duracion_suspension = $fecha_inicio_suspension->diff($fecha_fin_suspension);
$nueva_fecha_fin_proyecto = $fecha_fin_proyecto->add($duracion_suspension);


if ($fecha_fin_suspension < $fecha_inicio_proyecto
    || $fecha_inicio_suspension < $fecha_inicio_proyecto) {
        $alerta = 'porfavor, revise las fechas';
} else {
    // transformamos fechas a formato string
    $nueva_fecha_fin_proyecto = $nueva_fecha_fin_proyecto->format('Y-m-d');
    $fecha_inicio_suspension = $fecha_inicio_suspension->format('Y-m-d');
    $fecha_fin_suspension =  $fecha_fin_suspension->format('Y-m-d');
    
    // Llamada model suspension
    require_once 'models/suspension.php';
    $suspension = new SuspensionModelo(Connection::connection());

    // Asignar fecha de suspension de proyecto
    $alerta = $suspension->asignar_suspension($id_proyecto, $fecha_inicio_suspension, $fecha_fin_suspension);
    
    if ($alerta) {
        // Asignar nueva fecha final de proyecto
        $alerta = $proyecto->actualizar_fecha_final_proyecto($id_proyecto, $nueva_fecha_fin_proyecto);
        if ($alerta) {
            $alerta = 'Susupencion exitosa';
        } else {
            $alerta = 'Algo anda mal';
        }
    } else {
        $alerta = 'Algo anda mal';
    }
    
    

}

// Llamada vista alerta
require_once 'views/alertas.php';
?>