<?php
// Llamada modelo proyecto
require_once 'models/proyecto.php';
$proyecto = new ProyectoModelo(Connection::connection());
$dato_proyecto = $proyecto->obtener_busqueda_proyecto($id_proyecto);

// Almacenamos valor del proyecto
$valor_proyecto = $dato_proyecto->valor;

// Almacenamos y convertirmos fechas
$fecha_inicio_proyecto = new DateTime($dato_proyecto->fecha_inicio);
$fecha_fin_proyecto = new DateTime($dato_proyecto->fecha_fin);

// Llamada modelo suspencion
require_once 'models/suspension.php';
$suspension = new SuspensionModelo(Connection::connection());
$dato_proyecto_suspension = $suspension->obtener_fecha_suspension($id_proyecto);

// Almacenamos y convertimos fechas
$fecha_inicio_suspension = new DateTime($dato_proyecto_suspension->fecha_inicio_suspension);
$fecha_fin_suspension = new DateTime($dato_proyecto_suspension->fecha_fin_suspension);

// Obtener la fecha actual del sistema
$fecha_actual = new DateTime();

// Verificar si la fecha actual es posterior a la fecha de finalización del proyecto
if ($fecha_actual > $fecha_fin_proyecto) {
    $fecha_actual = clone $fecha_fin_proyecto;
}

// Calcular total de días del proyecto
$total_dias_proyecto = $fecha_inicio_proyecto->diff($fecha_fin_proyecto)->days;

// Calcular total de días de suspensión
$total_dias_suspension = $fecha_inicio_suspension->diff($fecha_fin_suspension)->days;

// Calcular total de días hábiles (sin contar los días de suspensión)
$total_dias_habiles = $total_dias_proyecto - $total_dias_suspension;

// Calcular pago diario
$pago_diario = $valor_proyecto / $total_dias_habiles;

// Llamada vista pagos
require_once 'views/pagos.php';
?>



