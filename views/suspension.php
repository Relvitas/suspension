<main>
    <div class="contenedor_form">
        <span class="title_form">Establecer suspension</span>
        <form action="?c=suspension&a=asignar_suspension&id=<?= $busqueda_proyecto->id_proyecto?>" method="post">
            <div>
                <label>Proyecto</label>
                <input class="input_form" type="text" value="<?= $busqueda_proyecto->nombre?>" readonly disable>
            </div>
            <div>
                <label for="fecha_inicio_suspension">Fecha Inicion Suspension</label>
                <input class="input_form" type="date" id="fecha_inicio_suspension" name="fecha_inicio_suspension">
            </div>
            <div>
                <label for="fecha_fin_suspension">Fecha Fin Suspension</label>
                <input class="input_form" type="date" id="fecha_fin_suspension" name="fecha_fin_suspension">                
            </div>
            <div class="container_button_form">
                <input class="button_form" type="submit" value="Asignar">
            </div>
        </form>
        <div class="container_button_back">
            <a href="?">Cancelar</a>
        </div>
    </div>
</main>