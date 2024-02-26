<?php
class PagosModelo {
    private ?PDO $connection = null;

    public function __connection(PDO $connection) {
        $this->connection = $connection;
    }
}
?>