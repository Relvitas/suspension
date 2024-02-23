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

    // Acceso al metodo proyectos
    public function obtener_proyectos() {
        return $this->proyectos();
    }

}
?>