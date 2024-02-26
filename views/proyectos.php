<main>
    <div class="contenedor_tabla_proyectos">
        <div class="tabla_proyectos">
            <table>
                <thead class="encabezado_tabla">
                    <tr class="fila_encabezado">
                        <th>#</th>
                        <th>Proyecto</th>
                        <th>Fecha inicio</th>
                        <th>Fecha final inicial</th>
                        <th>Tiempo Suspension</th>
                        <th>Fecha final actual</th>
                        <th>Valor</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    foreach($lista_proyecto as $proyecto):
                    ?>
                    <tr class="fila_cuerpo">
                        <td><?= $contador?></td>
                        <td><?= $proyecto->nombre?></td>
                        <td><?= $proyecto->fecha_inicio?></td>
                        <td><?= $proyecto->fecha_fin?></td>
                        <td>
                            <a href="?c=suspension&a=suspension&id=<?= $proyecto->id_proyecto?>"><i class="fa-solid fa-stopwatch"></i></a>
                            <?php
                            $lista_suspension = $suspension->obtener_fecha_suspension($proyecto->id_proyecto);
                            if ($lista_suspension) {
                                echo '<span>' . $lista_suspension->fecha_inicio_suspension . ' / ' . '</span>' . '<span>' . $lista_suspension->fecha_fin_suspension . '</span>';
                            } else {
                                echo 'N/A';
                            }
                            ?>
                        </td>
                        <td><?= $proyecto->fecha_fin?></td>
                        <td><?= '$' . $proyecto->valor?></td>
                        <td><a href="?c=pago&a=registro_pagos&id=<?= $proyecto->id_proyecto?>" class="pagos"><i class="fa-solid fa-credit-card"></i> Pagos</a></td>
                    </tr>
                    <?php 
                    $contador++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</main>