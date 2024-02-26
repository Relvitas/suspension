<?php
class ProyectoModelo {
    private ?PDO $connection = null;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /**
     * Función encargada de obtener todos 
     * los registros de la tabla proyectos.
     * 
     * @return array Retorna un arrayObject con 
     * los registros de la tabla proyectos.
     */
    private function proyectos () {
        $sql = 'select * from proyecto';
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([]);
            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

            if ($resultados > 0) {
                return $resultados;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit('Error: ' . $e->getMessage());
        }
    }

    private function buscar_proyceto($id_proyecto) {
        $sql = 'select * from proyecto where id_proyecto = ?';
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

    public function actualizar_fecha_final_proyecto($id_proyecto, $nueva_fecha_fin) {
        $sql = 'update proyecto set fecha_fin = ? where id_proyecto = ?';
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$nueva_fecha_fin, $id_proyecto]);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit('Error: ' . $e->getMessage());
        }
    }
    

    public function obtener_busqueda_proyecto($id_proyecto) {
        return $this->buscar_proyceto($id_proyecto);
    }

    // Acceso al metodo proyectos
    public function obtener_proyectos() {
        return $this->proyectos();
    }

}
?>