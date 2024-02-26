<?php
class SuspensionModelo {
    private ?PDO $connection = null;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /**
     * Metodo encargado de realizar la inserción de una suspensión
     * con fecha de inicio y fin a un proyecto.
     * 
     * @param int $id_proyecto Identificador del proyecto al que se le asignará la suspensión.
     * @param string $fecha_inicio Fecha de inicio de la suspensión en formato 'YYYY-MM-DD'.
     * @param string $fecha_fin Fecha de finalización de la suspensión en formato 'YYYY-MM-DD'.
     * 
     * @return bool Devuelve true si la operación fue exitosa, false en caso de fallo.
     */
    private function suspension ($id_proyecto, $fecha_inicio, $fecha_fin) {
        $sql = 'insert into suspension (id_proyecto, fecha_inicio_suspension, fecha_fin_suspension) values (?, ?, ?)';
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id_proyecto, $fecha_inicio, $fecha_fin]);
            
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit('Error: ' . $e->getMessage());
        }
    }

    private function fehca_suspension($id_proyecto) {
        $sql = 'select fecha_inicio_suspension, fecha_fin_suspension from suspension where id_proyecto = ?';
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id_proyecto]);
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            if ($resultado) {
                return $resultado;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit('Error: ' . $e->getMessage());
        }
    }

    // Metodo encargado de obtener las fechas de suspension (get)
    public function obtener_fecha_suspension($id_proyecto) {
        return $this->fehca_suspension($id_proyecto);
    }

    // Metodo encargado de asignar la suspension (set)
    public function asignar_suspension($id_poryecto, $fecha_inicio, $fecha_fin) {
        return $this->suspension($id_poryecto, $fecha_inicio, $fecha_fin);
    }
}
?>