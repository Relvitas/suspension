<main>
    <div class="contenedor_tabla_pagos">
        <div class="tabla_pagos">
            <table>
                <thead class="encabezado_tabla">
                    <tr class="fila_encabezado_pagos">
                        <th>Fecha</th>
                        <th>Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fecha_iteracion = clone $fecha_inicio_proyecto;
                    $pagos_restantes = $valor_proyecto;

                    while ($fecha_iteracion <= $fecha_actual):

                        $ultimo_dia_mes = $fecha_iteracion->format('t');
                        $dias_mes = min($ultimo_dia_mes, $fecha_iteracion->diff($fecha_fin_proyecto)->days + 1);

                        // Calcular días hábiles del mes restando días de suspensión
                        $dias_habiles_mes = $dias_mes - $total_dias_suspension;

                        // Calcular pago del mes
                        if ($fecha_iteracion->format('Y-m') == $fecha_inicio_suspension->format('Y-m')) {
                            // Si es el mes de la suspensión, calcular el pago al final del mes
                            $pago_mes = $pago_diario * ($dias_habiles_mes - 1); // Restar 1 día para considerar el pago al final del mes
                        } else {
                            $pago_mes = $dias_habiles_mes * $pago_diario;
                        }
                    ?>
                    <tr class="fila_registro_pagos">
                        <td><i class="fa-regular fa-calendar-days"></i> <span class="fecha_pago"><?= $fecha_iteracion->format('Y-m-d')?></span></td>
                        <td>$ <span class="pago"><?= number_format($pago_mes, 2)?></span></td>
                    </tr>
                    <?php
                    // Actualizar fecha iteración para el próximo mes
                    $fecha_iteracion->modify('first day of next month');
                    endwhile;
                    ?>
                </tbody>
            </table>
            <div class="button_back_pagos">
                <a href="?">Regresar</a>
            </div>
        </div>
    </div>
</main>